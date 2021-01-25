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
                <button type="button" class="btn btn-info btn-sm btn-add-item listVendas"><i class="fa fa-list"></i>
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

                        <div class="panel" id="somaValores" style="display:none;">
                            <div class="panel-title"><strong>{{__("Total Venda")}}</strong></div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <h6 class="account">{{__("Valor Total com Desconto")}}</h6><span
                                        class="mt-5 balance">  <div
                                            id="somaTotal" name="somaTotal">R$ 0,00 </div> </span>
                                </div>
                            </div>
                        </div>

                        <div class="panel" id="contentValores" style="display:none;">
                            <div class="panel-title"><strong>{{__("Consumo do Cartão Digitado")}}</strong></div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <h6 class="account">{{__("Valor Total Consumido")}}</h6>
                                    <span class="mt-5 restante"> <i class="fa fa-minus"></i>
                                        <div>R$ <span id="valorRestante" class="moeda-real">0,00</span></div>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <h6 class="account">{{__("Valor Total Disponível")}}</h6>
                                    <span class="mt-5 balance"> <i class="fa fa-plus"></i>
                                         <div>R$<span id="valorTotal" class="moeda-real">0,00</span></div>
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
        <input type="hidden" class="form-control moeda-real" id="somaInterna" name="total_value" value="0,00">
        <input type="hidden" class="form-control moeda-real" id="somaTotalcard" name="value_card" value="0,00">
        <input type="hidden" class="form-control moeda-real" id="somaTotalCardConsumer" name="value_consumed"
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
        var valor_total_disponivel = 0.0;
        var valor_total_consumido = 0.0;
        var qtd_Item = 0;

        $(".listVendas").click(function () {
            window.location = "/admin/module/pos/sale/";
        });

        $('#numberCard').focus();

        $("#numberCard").blur(function () {
            if ($("#numberCard").val() != "") {
                $('#passwordAuthorization').modal('show');
            }
        });

        $(".autorizarValores").click(function () {
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
                        buscarCliente();
                    }
                }
            });
        })

        function buscarCliente() {
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
                    $('#enable_produtos').removeAttr("disabled");
                    if (data.success) {
                        /*console.log(data);*/

                        let select = $('#cliente_hospede').find('.dungdt-select2-field');
                        let name = data.cardData.user.first_name + ' ' + data.cardData.user.last_name

                        select.append(
                            new Option(name, data.cardData.user.id, null, true));

                        valor_total_disponivel = data.cardData.card.value_card;
                        valor_total_disponivel = parseFloat(valor_total_disponivel);

                        $('#valorTotal').html(formatNumber(valor_total_disponivel));

                        if (data.cardData.card.value_consumed == null) {
                            $('#valorRestante').html('0.00');
                        } else {
                            valor_total_consumido = data.cardData.card.value_consumed;
                            valor_total_consumido = parseFloat(valor_total_consumido);

                            $('#valorRestante').html(formatNumber(valor_total_consumido));
                        }
                        cash_payment = data.cardData.cash_payment;

                        $('#contentValores').show();
                    } else {
                        alert(data.message);
                    }
                }
            });
        }

        $('#formPayment').on('change', function () {
            if (this.value == cash_payment) {
                $('#divCartao').hide();
                $('#divDinheiroRecebido').show();
                $('#divTrocoCliente').show();
            } else {
                $('#divCartao').show();
                $('#divDinheiroRecebido').hide();
                $('#divTrocoCliente').hide();
            }
        });

        $('#enable_produtos').change(function () {
            if ($(this).is(':checked')) {
                $('#somaValores').show();
                $('#somaTotal').html("R$ 0,00 ");
            } else {
                $('#somaValores').hide();
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


                        somarItens(index, e.params.data.price, 1)
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
                        let desconto = parseFloat(($('#priceDesconto').val()).replace('.', '').replace(',', '.'));
                        let valoresSomados = parseFloat(($('#somaInterna').val()).replace('.', '').replace(',', '.'));

                        if (desconto > 0) {
                            valoresSomados = desconto + valoresSomados;
                            valor_total_disponivel = valor_total_disponivel - desconto;
                            valor_total_consumido = valor_total_consumido + desconto;
                            sessionStorage.removeItem('desconto');
                            exibirValores(valoresSomados)
                        }

                        $('#priceDesconto').val(formatNumber(0));
                        $('#valorRecebido').val(formatNumber(0));
                        $('#priceTroco').val(formatNumber(0));
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

                    removeItens(price, parseInt(product.qtd));
                    somarItens(product.index, price, qtd_quantity);

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

                    removeItens(product.price, qtd_quantity);
                    somarItens(product.index, price, qtd_quantity);

                    product.qtd = qtd_quantity;
                    product.price = price;

                    calculateReceivedValue();
                    sessionStorage.setItem('product-' + product_id, JSON.stringify(product));
                });

                $('#priceDesconto').blur(function () {
                    let desconto = parseFloat(($(this).val()).replace('.', '').replace(',', '.'));
                    let antigo_desconto = sessionStorage.getItem('desconto');
                    let valoresSomados = parseFloat(($('#somaInterna').val()).replace('.', '').replace(',', '.'));

                    if (desconto <= 0 || isNaN(desconto)) {
                        desconto = 0;
                        $(this).val(desconto);
                    } else {
                        if (antigo_desconto == null) {
                            sessionStorage.setItem('desconto', desconto);
                        } else {
                            antigo_desconto = parseFloat(sessionStorage.getItem('desconto'));
                            valoresSomados += antigo_desconto;
                            valor_total_disponivel -= antigo_desconto;
                            valor_total_consumido += antigo_desconto;
                        }

                        if (desconto > valoresSomados) {
                            desconto = 0;
                            $(this).val(desconto);
                        }

                        valoresSomados -= desconto;

                        valor_total_disponivel += desconto;
                        valor_total_consumido -= desconto;
                        sessionStorage.setItem('desconto', desconto);

                        /*console.log({
                            desconto: desconto,
                            antigo_desconto: antigo_desconto,
                            valoresSomados: valoresSomados,
                            valor_total_consumido: valor_total_consumido,
                            valor_total_disponivel: valor_total_disponivel
                        });*/
                        exibirValores(valoresSomados)
                        calculateReceivedValue();
                    }
                })

                $('#valorRecebido').blur(function () {
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
                removeItens(check_product.price, check_product.qtd);
                sessionStorage.removeItem(check_index);
                sessionStorage.removeItem('index-' + index);
                --qtd_Item;
            }
        }

        function calculateReceivedValue(){
            let valorRecebido = parseFloat(($('#valorRecebido').val()).replace('.', '').replace(',', '.'));
            let valoresSomados = parseFloat(($('#somaInterna').val()).replace('.', '').replace(',', '.'));

            if (!isNaN(valorRecebido) && valorRecebido > 0) {
                let somaTotal = valoresSomados - valorRecebido;

                $('#priceTroco').val(formatNumber(somaTotal * (-1)));
            }
        }

        function somarItens(index, valorItem, qtdItem) {
            valorItem = parseFloat(valorItem);
            qtdItem = parseInt(qtdItem);

            let valoresSomados = parseFloat(($('#somaInterna').val()).replace('.', '').replace(',', '.'));
            let valorCalculadoItem = valorItem * qtdItem;

            valoresSomados += valorCalculadoItem;

            if (valoresSomados >= valor_total_disponivel) {
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

            valor_total_consumido += valorCalculadoItem;
            valor_total_disponivel -= valorCalculadoItem;

            exibirValores(valoresSomados);
            /*console.log({
                Itens: 'soma',
                valorItem: valorItem,
                qtdItem: qtdItem,
                valorCalculadoItem: valorCalculadoItem,
                valoresSomados: valoresSomados,
                valorTotalConsumido: valorTotalConsumido,
                valorTotalDisponivel: valorTotalDisponivel
            })*/
        }

        function removeItens(valorItem, qtdItem) {
            valorItem = parseFloat(valorItem);
            qtdItem = parseInt(qtdItem);

            let valoresSomados = parseFloat(($('#somaInterna').val()).replace('.', '').replace(',', '.'));
            let valorCalculadoItem = valorItem * qtdItem;

            valoresSomados -= valorCalculadoItem;
            valor_total_consumido -= valorCalculadoItem;
            valor_total_disponivel += valorCalculadoItem;

            exibirValores(valoresSomados);
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

        function exibirValores(valoresSomados) {
            /* console.log({
                 text : 'gravando',
                 valoresSomados : valoresSomados,
                 valor_total_disponivel : valor_total_disponivel,
                 valor_total_consumido :  valor_total_consumido
             })*/

            //Input interno somatotal
            $('#somaInterna').val(formatNumber(valoresSomados));

            //Valor Total com Desconto
            $('#somaTotal').html("R$ " + formatNumber(valoresSomados));

            //Valor total Disponivel
            $('#valorTotal').html(formatNumber(valor_total_disponivel));
            $('#somaTotalcard').val(formatNumber(valor_total_disponivel));

            //valor total consumido
            $('#valorRestante').html(formatNumber(valor_total_consumido));
            $('#somaTotalCardConsumer').val(formatNumber(valor_total_consumido));
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
            "color": "green"
        });

        $(".restante").css({
            "font-size": "43px",
            "color": "red"
        })
    </script>
@endsection
