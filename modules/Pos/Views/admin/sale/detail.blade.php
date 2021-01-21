@extends('admin.layouts.app')
@section('title','Pos')
@section('content')
    <form
        action="{{route('supplier.admin.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}"
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
                                    <button class="btn btn-primary" type="submit"><i
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
                                        <div id="valorRestante">R$ 0,00 </div>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <h6 class="account">{{__("Valor Total Disponível")}}</h6>
                                    <span class="mt-5 balance"> <i class="fa fa-plus"></i>
                                         <div id="valorTotal">R$ 0,00 </div>
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
@endsection
@section ('script.body')
    <script>
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

                    if (data.success) {
                        console.log(data);
                        $('#valorTotal').html('R$ ' + data.cardData.card.value_card);

                        if (data.cardData.card.value_consumed == null) {

                            $('#valorRestante').html('R$ 00.0');
                        } else {
                            $('#valorRestante').html('R$ ' + data.cardData.card.value_consumed);
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
            $('.dungdt-select2-field').each(function() {
                $(this).trigger('select.select2');
            })

            $(document).on('select2:select', '.dungdt-select2-field-lazy, .dungdt-select2-field', function (e) {
                $(this).parents('.row').find('.stock_quantity').val(e.params.data.available_stock);
                $(this).parents('.row').find('.sale_quantity').val("1");
                $(this).parents('.row').find('.price').val(e.params.data.price);

                somarItens(1, e.params.data.price)
            })

            $(".form-group-item .btn-add-item").click(function () {
                var p = $(this).closest(".form-group-item").find(".g-items");
                p.find('.moeda-real').each(function () {
                    $(this).mask('#.##0,00', {reverse: true});
                });
            });
        });


        $('#valorRecebido').on('keyup', function () {

            let getValorRecebido = $('#ValorRecebido').val().replace(/[.]/g, '').replace(',', '.');
            let getdesconto = $('#priceDesconto').val().replace(/[.]/g, '').replace(',', '.');

            let valorRecebido = parseFloat(getValorRecebido != '' ? getValorRecebido : 0);
            let desconto = parseFloat(getdesconto != '' ? getdesconto : 0);

            let gastos = parseFloat("120.10");

            let somaTotal = parseFloat(valorRecebido - gastos - desconto).toFixed(2);

            $('#priceTroco').val(somaTotal);
            $('#somaTotal').html(somaTotal);

        })


        // Aqui pode usar para soma dos itens
        $(".btn-remove-item").click(function () {

            alert("dede");

            var ValoresSomados = parseFloat(jQuery('#somaInterna').val());

            if (jQuery('#somaInterna').val() >= 508) {
                alert("Seu limite de orçamento esgostou. Favor adicionar mais creditos no cartao.");
                return false;
            }

            //Pegar isso na hora...
            var ValorItem = parseFloat("100.50");
            var QuantidadeItem = 2;

            var ValorCalculadoItem = ValoresSomados - (ValorItem * QuantidadeItem);

            jQuery('#somaInterna').val(ValorCalculadoItem.toFixed(2));

            jQuery('#somaTotal').html("R$ " + ValorCalculadoItem.toFixed(2));

        });

        // Aqui pode usar para soma dos itens
        function somarItens(valorItem, qtdItem) {

            let valoresSomados = parseFloat($('#somaInterna').val());
            let valorTotalDisponivel = parseFloat($('#valorTotal').val());

            if (valoresSomados >= valorTotalDisponivel) {
                alert("Seu limite de orçamento esgostou. Favor adicionar mais creditos no cartao.");
                console.log(valorTotalDisponivel)
                return false;
            }

            let valorCalculadoItem = valoresSomados + (valorItem * parseInt(qtdItem));

            $('#somaInterna').val(valorCalculadoItem.toFixed(2));

            $('#somaTotal').html("R$ " + valorCalculadoItem.toFixed(2));

        };

        $(function () {
            $('input[name="datetimes"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                timePicker: true,
                minYear: 2020,
                locale: {
                    format: 'DD/MM/YYYY hh:mm A'
                },
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
            });
        });

        jQuery(function ($) {
            $(".modal").on("show.bs.modal", function (e) {
                $(".response-message").attr("class", "response-message").text("");
                $(this).find(":input").val("");
            });
            $(".modalSubmit").click(function (e) {
                $.ajax({
                    url: $(this).parents(".modal-form").attr("action"),
                    method: "post",
                    data: $(this).parents(".modal-form").serialize(),
                    beforeSend: function () {
                        $(".response-message").attr("class", "response-message alert-info").text("Enviando...");
                    },
                    success: function (result, e) {
                        var classMessage = "success";
                        $(".response-message")
                            .attr("class", "response-message alert-" + classMessage)
                            .text(result.message);
                    },
                });
            });

            $('.moeda-real').mask('#.##0,00', {reverse: true});
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
