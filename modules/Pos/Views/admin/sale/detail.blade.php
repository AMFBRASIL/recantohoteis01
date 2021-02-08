@extends('admin.layouts.app')
@section('title','Pos')
@section('content')
    <form
        action="{{route('pos.admin.sale.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}"
        method="post">
        @csrf
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div>
                    <h1 class="title-bar">{{$row->id ? __('Edit: ').$row->title : __('Nova Venda')}}</h1>
                </div>
                <button type="button" class="btn btn-info btn-sm btn-add-item listSales"><i class="fa fa-list"></i>
                    LISTAR TODAS VENDAS
                </button>
            </div>
            @include('admin.message')
            <div class="lang-content-box">
                <div class="row">
                    <div class="col-md-9">
                        @include('Pos::admin.sale.content')
                    </div>
                    <div class="col-md-3">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('Publicada')}}</strong></div>
                            <div class="panel-body">
                                @if(is_default_lang())
                                    <div>
                                        <label><input checked type="radio"
                                                      name="status" value="publish"> {{__("Publicada")}}
                                        </label></div>
                                    <div>
                                        <label><input type="radio"
                                                      name="status" value="draft"> {{__("Rascunho")}}
                                        </label></div>
                                @endif
                                <div class="text-right">
                                    <button id="save" class="btn btn-primary" type="submit"><i
                                            class="fa fa-save"></i> {{__('Save Changes')}}</button>
                                </div>
                            </div>
                        </div>
                        @if(is_default_lang())
                            <div class="panel">
                                <div class="panel-title"><strong>{{__("Administrador")}}</strong></div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <?php
                                        $user = !empty($row->create_user) ? App\User::find($row->create_user) : false;
                                        \App\Helpers\AdminForm::select2('create_user', [
                                            'configs' => [
                                                'ajax' => [
                                                    'url' => url('/admin/module/user/getForSelect2'),
                                                    'dataType' => 'json'
                                                ],
                                                'allowClear' => true,
                                                'placeholder' => __('-- Select User --'),
                                            ]
                                        ], !empty($user->id) ? [
                                            $user->id,
                                            $user->getDisplayName() . ' (#' . $user->id . ')'
                                        ] : false)
                                        ?>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="panel" id="sumValues" style="display:none;">
                            <div class="panel-title"><strong>{{__("Total Venda")}}</strong></div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <h6 class="account">{{__("Valor Total com Desconto")}}</h6><span
                                        class="balance">  <div
                                            id="totalSum" name="totalSum">R$ 0,00 </div> </span>
                                </div>
                            </div>
                        </div>

                        <div class="panel" id="contentValues" style="display:none;">
                            <div class="panel-title"><strong>{{__("Consumo do Cartão Digitado")}}</strong></div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <h6 class="account">{{__("Valor Total Consumido")}}</h6>
                                    <span class="restante"> <i class="fa fa-minus"></i>
                                        <div>R$ <span id="valueRemaining" class="moeda-real">0,00</span></div>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <h6 class="account">{{__("Valor Total Disponível")}}</h6>
                                    <span class="balance"> <i class="fa fa-plus"></i>
                                         <div>R$ <span id="totalValue" class="moeda-real">0,00</span></div>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-title"><strong>{{__("Controles")}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="is_simples" @if($row->is_simples) checked
                                                   @endif value="1"> {{__("Controlar Estoque")}}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="is_rural" @if($row->is_rural) checked
                                                   @endif value="1"> {{__("Enviar E-mail detalhes ao Cliente")}}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="is_shipping" @if($row->is_shipping) checked
                                                   @endif value="1"> {{__("Emissao Nota Fiscal")}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="form-control moeda-real" id="internalSum" name="total_value" value="0,00">
        <input type="hidden" class="form-control moeda-real" id="sumTotalCard" name="value_card" value="0,00">
        <input type="hidden" class="form-control moeda-real" id="sumTotalCardConsumer" name="value_consumed"
               value="0,00">
    </form>
    <div class="modal fade login" id="register" tabindex="-1" role="dialog" aria-hidden="true" style="display: none">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content relative">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Cadastre-ser')}}</h4>
                    <span class="c-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa">
                        <img src="{{url('images/ico_close.svg')}}" alt="close">
                    </i>
                </span>
                </div>
                <div class="modal-body">
                    @include('Pos::admin/sale/form-register/index')
                </div>
            </div>
        </div>
    </div>
@endsection
@section ('script.body')
    <script>
        sessionStorage.clear();
        var cash_payment;
        var total_value_available = 0.0;
        var total_consumed_value = 0.0;
        var qtd_Item = 0;

        $(".listSales").click(function () {
            window.location = "/admin/module/pos/sale/";
        });

        $('#numberCard').focus();

        $("#numberCard").blur(function () {
            if ($("#numberCard").val() != "") {
                $('#passwordAuthorization').modal('show');
            }
        });

        $(".authorizeValues").click(function () {
            let data = {
                password: $('#password').val(),
            };

            let url = "/admin/module/pos/authorizationPassword/check";

            $.ajax({
                url: url,
                type: 'GET',
                data: data,
                success: function (data) {
                    alert(data.message);
                    if (data.success) {
                        searchClient();
                    }
                }
            });
        })

        function searchClient() {
            let data = {
                card_number: $('#numberCard').val(),
            };

            let url = "/admin/module/pos/consumptionCard/findCard";

            $.ajax({
                url: url,
                type: 'GET',
                data: data,
                success: function (data) {
                    $('#passwordAuthorization').modal('toggle');
                    $('#enable_products').removeAttr("disabled");
                    if (data.success) {
                        /*console.log(data);*/

                        let select = $('#client_host').find('.dungdt-select2-field');
                        let name = data.cardData.user.first_name + ' ' + data.cardData.user.last_name

                        select.append(
                            new Option(name, data.cardData.user.id, null, true));

                        total_value_available = data.cardData.card.value_card;
                        total_value_available = parseFloat(total_value_available);

                        $('#totalValue').html(formatNumber(total_value_available));

                        if (data.cardData.card.value_consumed == null) {
                            $('#valueRemaining').html('0.00');
                        } else {
                            total_consumed_value = data.cardData.card.value_consumed;
                            total_consumed_value = parseFloat(total_consumed_value);

                            $('#valueRemaining').html(formatNumber(total_consumed_value));
                        }
                        cash_payment = data.cardData.cash_payment;

                        $('#contentValues').show();
                    } else {
                        alert(data.message);
                    }
                }
            });
        }

        $('#formPayment').on('change', function () {
            if (this.value == cash_payment) {
                $('#divCard').hide();
                $('#divMoneyReceived').show();
                $('#divChangeCustomer').show();
            } else {
                $('#divCard').show();
                $('#divMoneyReceived').hide();
                $('#divChangeCustomer').hide();
            }
        });

        $('#enable_products').change(function () {
            if ($(this).is(':checked')) {
                $('#sumValues').show();
                $('#totalSum').html("R$ 0,00 ");
            } else {
                $('#sumValues').hide();
            }
        });

        $(function ($) {
            $('.dungdt-select2-field').each(function () {
                $(this).trigger('select.select2');
            })

            $(document).on('select2:select', '.dungdt-select2-field-lazy', function (e) {
                let index = $(this).closest('.item').attr('data-number');
                let product_id = e.params.data.id;

                let product = sessionStorage.getItem('product-' + product_id);

                if (product == null || product.index == index) {
                    if (e.params.data.available_stock == 0) {

                        check(index);

                        alert('Produto sem estoque disponível!');
                        removeInvalidItem(index);
                    } else {
                        $(this).closest('.row').find('.stock_quantity').val(e.params.data.available_stock);
                        $(this).closest('.row').find('.item_name').val(e.params.data.text);
                        $(this).closest('.row').find('.sale_quantity').val("1");
                        $(this).closest('.row').find('.sale_quantity').attr({
                            "max": e.params.data.available_stock,
                        });
                        $(this).closest('.row').find('.price').val(e.params.data.price);

                        check(index);

                        sessionStorage.setItem('index-' + index, 'product-' + product_id);
                        sessionStorage.setItem('product-' + product_id, JSON.stringify({
                            index: index,
                            id: product_id,
                            price: e.params.data.price,
                            qtd: 1
                        }));

                        let product_value = e.params.data.price.replace('.', '').replace(',', '.');

                        sumItems(index, product_value, 1)
                        calculateReceivedValue();
                    }
                } else {
                    alert('Produto já inserido na lista!');
                    check(index);
                    removeInvalidItem(index);
                    --qtd_Item;
                }

                $(".btn-remove-item").click(function () {
                    let index = $(this).closest('.item').attr('data-number');

                    check(index);

                    if (qtd_Item == 0) {
                        let desconto = parseFloat(($('#priceDiscount').val()).replace('.', '').replace(',', '.'));
                        let valoresSomados = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.'));

                        if (desconto > 0) {
                            valoresSomados = desconto + valoresSomados;
                            total_value_available = total_value_available - desconto;
                            total_consumed_value = total_consumed_value + desconto;
                            sessionStorage.removeItem('desconto');
                            showValues(valoresSomados)
                        }

                        $('#priceDiscount').val(formatNumber(0));
                        $('#amountReceived').val(formatNumber(0));
                        $('#priceExchange').val(formatNumber(0));
                    }
                    calculateReceivedValue();
                });

                $(".sale_quantity").blur(function () {
                    let product_id = $(this).closest('.row').find("select option:selected").val();
                    let qtd_stock = parseInt($(this).closest('.row').find('.stock_quantity').val());
                    let qtd_quantity = parseInt($(this).closest('.row').find('.sale_quantity').val());
                    let price = $(this).closest('.row').find('.price').val();

                    price = parseFloat(price.replace('.', '').replace(',', '.'));

                    if (qtd_quantity > qtd_stock) {
                        qtd_quantity = qtd_stock;
                        $(this).closest('.row').find('.sale_quantity').val(qtd_quantity);
                    }

                    if (qtd_quantity < 1) {
                        qtd_quantity = 1;
                        $(this).closest('.row').find('.sale_quantity').val(qtd_quantity);
                    }

                    let product = JSON.parse(sessionStorage.getItem('product-' + product_id));

                    removeItems(price, parseInt(product.qtd));
                    sumItems(product.index, price, qtd_quantity);

                    product.qtd = qtd_quantity;
                    product.price = price;

                    calculateReceivedValue();
                    sessionStorage.setItem('product-' + product_id, JSON.stringify(product));
                });

                $(".price").blur(function () {
                    let product_id = $(this).closest('.row').find("select option:selected").val();
                    let qtd_quantity = parseInt($(this).closest('.row').find('.sale_quantity').val());
                    let price = $(this).closest('.row').find('.price').val();
                    let product = JSON.parse(sessionStorage.getItem('product-' + product_id));

                    price = parseFloat(price.replace('.', '').replace(',', '.'));

                    removeItems(product.price, qtd_quantity);
                    sumItems(product.index, price, qtd_quantity);

                    product.qtd = qtd_quantity;
                    product.price = price;

                    calculateReceivedValue();
                    sessionStorage.setItem('product-' + product_id, JSON.stringify(product));
                });

                $('#priceDiscount').blur(function () {
                    let discount = parseFloat(($(this).val()).replace('.', '').replace(',', '.'));
                    let old_discount = sessionStorage.getItem('desconto');
                    let valuesAdded = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.'));

                    if (discount <= 0 || isNaN(discount)) {
                        discount = 0;
                        $(this).val(discount);
                    } else {
                        if (old_discount == null) {
                            sessionStorage.setItem('desconto', discount);
                        } else {
                            old_discount = parseFloat(sessionStorage.getItem('desconto'));
                            valuesAdded += old_discount;
                            total_value_available -= old_discount;
                            total_consumed_value += old_discount;
                        }

                        if (discount > valuesAdded) {
                            discount = 0;
                            $(this).val(discount);
                        }

                        valuesAdded -= discount;

                        total_value_available += discount;
                        total_consumed_value -= discount;
                        sessionStorage.setItem('desconto', discount);

                        /*console.log({
                            desconto: desconto,
                            antigo_desconto: antigo_desconto,
                            valoresSomados: valoresSomados,
                            valor_total_consumido: valor_total_consumido,
                            valor_total_disponivel: valor_total_disponivel
                        });*/
                        showValues(valuesAdded)
                        calculateReceivedValue();
                    }
                })

                $('#amountReceived').blur(function () {
                    calculateReceivedValue();
                })

                $('.moeda-real').each(function () {
                    $(this).mask('#.##0,00', {reverse: true});
                });
            });
        });

        $(".btn-add-item").click(() => {
            qtd_Item += 1;
            /*console.log(qtd_Item);*/
        });

        function check(index) {
            check_index = sessionStorage.getItem('index-' + index);
            check_product = JSON.parse(sessionStorage.getItem(check_index));

            if (check_index != null
                && check_product != null
                && check_product.index == index) {
                removeItems(check_product.price, check_product.qtd);
                sessionStorage.removeItem(check_index);
                sessionStorage.removeItem('index-' + index);
                --qtd_Item;
            }
        }

        function calculateReceivedValue(){
            let amountReceived = parseFloat(($('#amountReceived').val()).replace('.', '').replace(',', '.'));
            let valuesAdded = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.'));

            if (!isNaN(amountReceived) && amountReceived > 0) {
                let totalSum = valuesAdded - amountReceived;

                $('#priceExchange').val(formatNumber(totalSum * (-1)));
            }
        }

        function sumItems(index, valueItem, qtdItem) {
            valueItem = parseFloat(valueItem).toFixed(2);
            qtdItem = parseInt(qtdItem);

            let valuesAdded = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.'));
            let valueCalculatedItem = valueItem * qtdItem;

            valuesAdded += valueCalculatedItem;

            if (valuesAdded >= total_value_available) {
                alert("Seu limite de orçamento esgostou. Favor adicionar mais creditos no cartao.");
                removeInvalidItem(index);
                /*console.log({
                    Itens: 'invalid',
                    valorItem: valorItem,
                    qtdItem: qtdItem,
                    valorCalculadoItem: valorCalculadoItem,
                    valoresSomados: valoresSomados,
                    valorTotalConsumido: valor_total_consumido,
                    valorTotalDisponivel: valor_total_disponivel
                })*/
                return false;
            }

            total_consumed_value += valueCalculatedItem;
            total_value_available -= valueCalculatedItem;

            showValues(valuesAdded);
           /*console.log({
                Itens: 'soma',
                valorItem: valueItem,
                qtdItem: qtdItem,
                valorCalculadoItem: valueCalculatedItem,
                valoresSomados: valuesAdded,
                valorTotalConsumido: total_consumed_value,
                valorTotalDisponivel: total_value_available
            })*/
        }

        function removeItems(valueItem, qtdItem) {
            valueItem = parseFloat(valueItem);
            qtdItem = parseInt(qtdItem);

            let valuesAdded = parseFloat(($('#internalSum').val()).replace('.', '').replace(',', '.'));
            let valueCalculatedItem = valueItem * qtdItem;

            valuesAdded -= valueCalculatedItem;
            total_consumed_value -= valueCalculatedItem;
            total_value_available += valueCalculatedItem;

            showValues(valuesAdded);
            /*console.log({
                Itens: 'subtracao',
                valorItem: valorItem,
                qtdItem: qtdItem,
                valorCalculadoItem: valorCalculadoItem,
                valoresSomados: valoresSomados,
                valorTotalConsumido: valor_total_consumido,
                valorTotalDisponivel: valor_total_disponivel
            })*/
        }

        function showValues(valoresSomados) {
            /* console.log({
                 text : 'gravando',
                 valoresSomados : valoresSomados,
                 valor_total_disponivel : valor_total_disponivel,
                 valor_total_consumido :  valor_total_consumido
             })*/

            //Input interno somatotal
            $('#internalSum').val(formatNumber(valoresSomados));

            //Valor Total com Desconto
            $('#totalSum').html("R$ " + formatNumber(valoresSomados));

            //Valor total Disponivel
            $('#totalValue').html(formatNumber(total_value_available));
            $('#sumTotalCard').val(formatNumber(total_value_available));

            //valor total consumido
            $('#valueRemaining').html(formatNumber(total_consumed_value));
            $('#sumTotalCardConsumer').val(formatNumber(total_consumed_value));
        }

        function removeInvalidItem(index) {
            $('.item')[index].remove();
        }

        function formatNumber(value) {
            if (value != null) {
                return value.toFixed(2).replace('.', ',')
                    .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            }
        }

        $(".account").css({
            "font-size": "16px",
            "color": "#1A237E"
        });

        $(".balance").css({
            "font-size": "43px",
            "color": "green",
            "display": "flex",
            "align-items": "center"
        });

        $(".restante").css({
            "font-size": "43px",
            "color": "red",
            "display": "flex",
            "align-items": "center"
        })
    </script>
@endsection
