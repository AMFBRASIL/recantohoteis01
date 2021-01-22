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
                                        <label><input @if($row->status=='publish') checked @endif type="radio"
                                                      name="status" value="publish"> {{__("Publicada")}}
                                        </label></div>
                                    <div>
                                        <label><input @if($row->status=='draft') checked @endif type="radio"
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
                                        <div>R$ <span id="valorRestante">0,00</span></div>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <h6 class="account">{{__("Valor Total Disponível")}}</h6>
                                    <span class="mt-5 balance"> <i class="fa fa-plus"></i>
                                         <div>R$<span id="valorTotal">0,00</span></div>
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
        <input type="hidden" id="somaInterna" name="somaInterna" value="0,00">
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
        var valor_total_disponivel = 0.0;
        var valor_total_consumido = 0.0;

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
                        console.log(data);

                        let select = $('#cliente_hospede').find('.dungdt-select2-field');
                        let name = data.cardData.user.first_name + ' ' + data.cardData.user.last_name

                        select.append(
                            new Option(name, data.cardData.user.id, null, true));


                        $('#valorTotal').html(data.cardData.card.value_card);
                        valor_total_disponivel = parseFloat(data.cardData.card.value_card);

                        if (data.cardData.card.value_consumed == null) {
                            $('#valorRestante').html('00.0');
                        } else {
                            $('#valorRestante').html(data.cardData.card.value_consumed);
                            valor_total_consumido = parseFloat(data.cardData.card.value_consumed);
                        }

                        $('#contentValores').show();
                    } else {
                        alert(data.message);
                    }
                }
            });
        }

        $('#formPayment').on('change', function () {
            if (this.value == 5) {
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
                $(this).parents('.row').find('.stock_quantity').val(e.params.data.available_stock);
                $(this).parents('.row').find('.sale_quantity').val("1");
                $(this).parents('.row').find('.sale_quantity').attr({
                    "max": e.params.data.available_stock,
                });
                $(this).parents('.row').find('.price').val(e.params.data.price);

                let index = $(this).closest('.item').attr('data-number');

                sessionStorage.setItem('qtd-' + index, 1);
                sessionStorage.setItem('price-' + index, e.params.data.price);
                somarItens(index, e.params.data.price, 1)

                $(".btn-remove-item").click(function () {
                    let index = $(this).closest('.item').attr('data-number');
                    let qtd_quantity = parseInt($(this).closest('.row').find('.sale_quantity').val());
                    let price = parseFloat($(this).closest('.row').find('.price').val());

                    removeItens(price, qtd_quantity);
                    sessionStorage.removeItem('qtd-' + index);
                    sessionStorage.removeItem('price-' + index);
                });

                $(".sale_quantity").blur(function () {
                    let index = $(this).closest('.item').attr('data-number');
                    let qtd_stock = parseInt($(this).closest('.row').find('.stock_quantity').val());
                    let qtd_quantity = parseInt($(this).closest('.row').find('.sale_quantity').val());
                    let price = parseFloat($(this).closest('.row').find('.price').val());

                    if (qtd_quantity > qtd_stock) {
                        qtd_quantity = qtd_stock;
                        $(this).closest('.row').find('.sale_quantity').val(qtd_quantity);
                    }

                    if (qtd_quantity < 1) {
                        qtd_quantity = 1;
                        $(this).closest('.row').find('.sale_quantity').val(qtd_quantity);
                    }

                    let old_qtd = sessionStorage.getItem('qtd-' + index);
                    console.log(old_qtd);
                    removeItens(price, old_qtd);
                    somarItens(index, price, qtd_quantity);
                    sessionStorage.setItem('qtd-' + index, qtd_quantity);
                    sessionStorage.setItem('price-' + index, price);
                });

                $(".price").blur(function () {
                    let index = $(this).closest('.item').attr('data-number');
                    let qtd_quantity = parseInt($(this).closest('.row').find('.sale_quantity').val());
                    let price = parseFloat($(this).closest('.row').find('.price').val());

                    let old_price = sessionStorage.getItem('price-' + index);
                    removeItens(old_price, qtd_quantity);
                    somarItens(index, price, qtd_quantity);
                    sessionStorage.setItem('qtd-' + index, qtd_quantity);
                    sessionStorage.setItem('price-' + index, price);
                });

                $('#priceDesconto').blur(function () {
                    let desconto = parseFloat($(this).val());
                    let antigo_desconto = sessionStorage.getItem('desconto');
                    let valoresSomados = parseFloat($('#somaInterna').val());
                    let valorTotalDisponivel = parseFloat($('#valorTotal').text());
                    let valorTotalConsumido = parseFloat($('#valorRestante').text());


                    if (desconto < 0) {
                        desconto = 0;
                        $(this).val(desconto);
                    } else {
                        if (antigo_desconto == null) {
                            sessionStorage.setItem('desconto', desconto);
                        } else {
                            antigo_desconto = parseFloat(sessionStorage.getItem('desconto'));

                            valoresSomados += antigo_desconto;
                            valorTotalDisponivel -= antigo_desconto;
                            valorTotalConsumido += antigo_desconto;
                        }

                        console.log(desconto > valoresSomados);

                        if (desconto > valoresSomados) {
                            desconto = 0;
                            $(this).val(desconto);
                        }

                        valoresSomados -= desconto;
                        valorTotalDisponivel += desconto;
                        valorTotalConsumido -= desconto;
                        sessionStorage.setItem('desconto', desconto);

                        //Input interno somatotal
                        $('#somaInterna').val(valoresSomados.toFixed(2));

                        //Valor Total com Desconto
                        $('#somaTotal').html("R$ " + valoresSomados.toFixed(2));

                        //Valor total Disponivel
                        $('#valorTotal').html(valorTotalDisponivel.toFixed(2));

                        //valor total consumido
                        $('#valorRestante').html(valorTotalConsumido.toFixed(2));
                    }
                })

                $('#valorRecebido').blur(function () {

                    let valorRecebido = parseFloat($('#valorRecebido').val());
                    let valoresSomados = parseFloat($('#somaInterna').val());

                    let somaTotal = valoresSomados - valorRecebido;

                    console.log({
                        valorRecebido : valorRecebido,
                        valoresSomados : valoresSomados,
                        somaTotal : somaTotal < 0 ? (somaTotal*(-1)) : somaTotal,
                    })

                    $('#priceTroco').val(somaTotal < 0 ? (somaTotal*(-1)) : somaTotal.toFixed(2));
                })

                $('.moeda-real').each(function () {
                    $(this).mask('#.##0,00', {reverse: true});
                });
            });
        });

        function somarItens(index, valorItem, qtdItem) {
            valorItem = parseFloat(valorItem);
            qtdItem = parseInt(qtdItem);
            let valoresSomados = parseFloat($('#somaInterna').val());
            let valorTotalDisponivel = parseFloat($('#valorTotal').text());
            let valorTotalConsumido = parseFloat($('#valorRestante').text());

            let valorCalculadoItem = valorItem * qtdItem;
            valoresSomados += valorCalculadoItem;

            if (valoresSomados >= valorTotalDisponivel) {
                alert("Seu limite de orçamento esgostou. Favor adicionar mais creditos no cartao.");
                removeInvalidItem(index);
                return false;
            }

            valorTotalConsumido += valorCalculadoItem;
            valorTotalDisponivel -= valorCalculadoItem;

            //Input interno somatotal
            $('#somaInterna').val(valoresSomados.toFixed(2));

            //Valor Total com Desconto
            $('#somaTotal').html("R$ " + valoresSomados.toFixed(2));

            //Valor total Disponivel
            $('#valorTotal').html(valorTotalDisponivel.toFixed(2));

            //valor total consumido
            $('#valorRestante').html(valorTotalConsumido.toFixed(2));

            console.log({
                Itens: 'soma',
                valorItem: valorItem,
                qtdItem: qtdItem,
                valorCalculadoItem: valorCalculadoItem,
                valoresSomados: valoresSomados,
                valorTotalConsumido: valorTotalConsumido,
                valorTotalDisponivel: valorTotalDisponivel
            })
        }

        function removeItens(valorItem, qtdItem) {
            valorItem = parseFloat(valorItem);
            qtdItem = parseInt(qtdItem);
            let valoresSomados = parseFloat($('#somaInterna').val());
            let valorTotalDisponivel = parseFloat($('#valorTotal').text());
            let valorTotalConsumido = parseFloat($('#valorRestante').text());
            let valorCalculadoItem = valorItem * qtdItem;

            valoresSomados -= valorCalculadoItem;
            valorTotalConsumido -= valorCalculadoItem;
            valorTotalDisponivel += valorCalculadoItem;

            //Input interno somatotal
            $('#somaInterna').val(valoresSomados.toFixed(2));

            //Valor Total com Desconto
            $('#somaTotal').html("R$ " + valoresSomados.toFixed(2));

            //Valor total Disponivel
            $('#valorTotal').html(valorTotalDisponivel.toFixed(2));

            //valor total consumido
            $('#valorRestante').html(valorTotalConsumido.toFixed(2));

            console.log({
                Itens: 'subtracao',
                valorItem: valorItem,
                qtdItem: qtdItem,
                valorCalculadoItem: valorCalculadoItem,
                valoresSomados: valoresSomados,
                valorTotalConsumido: valorTotalConsumido,
                valorTotalDisponivel: valorTotalDisponivel
            })
        }

        function removeInvalidItem(index) {
            $('.item')[index].remove();
        }

        $('#save').click(() => {
            sessionStorage.clear();
        });

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
