<div class="panel">
    <div class="panel-title"><strong>{{__("Dados Produto")}}</strong></div>
    <div class="panel-body" data-select2-id="12">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label> {{__("Número do Cartão Consumo")}}</label>
                    <input type="number" value="{{$row->card_number}}" placeholder="" name="card_number"
                           class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label> {{__("Cliente / Hóspede")}}</label>
                    <div class="input-group">
                        <?php
                        $user = !empty($row->user_id) ? App\User::find($row->user_id) : false;
                        \App\Helpers\AdminForm::select2('user_id', [
                            'configs' => [
                                'ajax' => [
                                    'url' => route('user.admin.autocomplete'),
                                    'dataType' => 'json'
                                ],
                                'allowClear' => true,
                                'placeholder' => __('cliente')
                            ]
                        ], !empty($user->id) ? [$user->id, $user->getNameAttribute()] : false)
                        ?>
                        <div class="input-group-append">
                            <button type="button" data-toggle="modal" data-target="#register"
                                    class="btn btn-info btn-sm btn-add-item">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-lg-3">
                <div class="form-group">
                    <label> Apartamento do Hospede </label>
                    <div class="input-group">
                        <select data-placeholder=" " name="aptohospede" class="form-control">
                            <optgroup label="VENDAS">
                                <option value="101">101</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>--}}

        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label">{{__("Data da Venda")}}</label>
                    <input type="datetime-local" name="sales_date" class="form-control" value="{{$row->sales_date}}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>{{__("Ponto de Venda")}}</label>
                    <div class="input-group">
                        <select data-placeholder=" " name="point_sales_id" class="form-control">
                            @foreach ($pointSalesList as $option)
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label> Situacao</label>
                    <div class="input-group">
                        <select class="form-control" name="situation_id">
                            @foreach ($situationList as $option)
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label> {{__("Forma de pagamento")}}</label>
                    <div class="input-group">
                        <select class="form-control" required name="payment_method_id">
                            @foreach ($paymentMethodList as $option)
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" id="divCartao" name="divCartao" style="display:block;">
                <div class="form-group">
                    <label>{{ __('Número da Transação Cartão')}}</label>
                    <input type="text" value="{{$row->card_transaction_number}}"
                           placeholder="AUHDEUY804837943" name="card_transaction_number"
                           class="form-control">
                </div>
            </div>
        </div>
        <hr>

        <div class="panel" style="background-color: #ecf0f5;" data-select2-id="11">
            <div class="panel-title"><strong>{{__("Itens da Venda")}}</strong></div>
            <div class="panel-body" data-select2-id="10">
                <div class="row">
                    <div class="col-lg-6 d-none">
                        <div class="form-group">
                            <label class="control-label">Preço de venda</label>
                            <input type="number" step="any" name="product_composition" class="form-control " value=""
                                   placeholder="Product Composition">
                            <span><i>If the regular price is less than the discount , it will show the regular price</i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label><input type="checkbox" name="enable_produtos" value="1" id="enable_produtos"> Ativar Itens
                    </label>
                </div>
                <div class="form-group-item" data-condition="enable_produtos:is(1)" style="" data-select2-id="9">
                    <label class="control-label">{{__("ITENS")}}</label>
                    <div class="g-items-header">
                        <div class="row">
                            <div class="col-md-7">Produto</div>
                            <div class="col-md-1">Estoque Atual</div>
                            <div class="col-md-1">Qtde Venda</div>
                            <div class="col-md-2">Valor Item</div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>

                    <div class="g-items" data-select2-id="8">
                        @if(!empty($row->product_composition))
                            @php if(!is_array($row->product_composition)) $row->product_composition = json_decode($row->product_composition); @endphp
                            @foreach($row->product_composition as $key => $composition)
                                <div class="item" data-number="{{$key}}">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <?php
                                            $product = isset($composition['product_id']) ? Modules\Product\Models\Product::find($composition['product_id']) : false;
                                            \App\Helpers\AdminForm::select2("product_composition[" . $key . "][product_id]", [
                                                'configs' => [
                                                    'ajax' => [
                                                        'url' => '/admin/module/product/get-select',
                                                        'dataType' => 'json'
                                                    ],
                                                    'allowClear' => true,
                                                    'placeholder' => __('-- Digite para pesquisar --')
                                                ]
                                            ], !empty($product->id) ? [$product->id, $product->getDisplayName()] : false)
                                            ?>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="number" min="0" name="product_composition[{{$key}}][quantity]"
                                                   class="form-control"
                                                   value="{{isset($composition['quantity']) ? $composition['quantity'] : ''}}">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="number" min="0" name="product_composition[{{$key}}][stock]"
                                                   class="form-control"
                                                   value="{{isset($composition['stock']) ? $composition['stock'] : ''}}">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">R$</span>
                                                </div>
                                                <input type="text" name="product_composition[{{$key}}][price]"
                                                       class="form-control moeda-real"
                                                       value="{{isset($composition['price']) ? $composition['price'] : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                    class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="text-right">
                        <span class="btn btn-info btn-sm btn-add-item somarItem"><i
                                class="icon ion-ios-add-circle-outline"></i> Add item</span>
                    </div>

                    <div class="g-more hide">
                        <div class="item" data-number="__number__">
                            <div class="row">
                                <div class="col-md-7">
                                    <select class="form-control dungdt-select2-field-lazy"
                                            data-options="{&quot;ajax&quot;:{&quot;url&quot;:&quot;/admin/module/product/get-select&quot;,&quot;dataType&quot;:&quot;json&quot;},&quot;allowClear&quot;:true,&quot;placeholder&quot;:&quot;-- Selecione o Estoque --&quot;}"
                                            name="product_composition[__number__][product_id]">
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <input type="number" min="0" __name__="product_composition[__number__][quantity]"
                                           class="form-control" value="">
                                </div>
                                <div class="col-md-1">
                                    <input type="number" min="0" __name__="product_composition[__number__][estoque]"
                                           class="form-control" value="">
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">R$</span>
                                        </div>
                                        <input type="text" name="sale_price" placeholder="99,99"
                                               class="form-control moeda-real" value="">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <span class="btn btn-danger btn-sm btn-remove-item "><i
                                            class="fa fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>Valores e Descontos</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="control-label">Desconto:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">R$</span>
                                </div>
                                <input type="text" name="discounts_value" id="priceDesconto" placeholder="99,99"
                                       class="form-control moeda-real" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3" id="divDinheiroRecebido" name="divDinheiroRecebido" style="display:none;">
                        <div class="form-group">
                            <label class="control-label">Valor Recebido em Dinheiro:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">R$</span>
                                </div>
                                <input type="text" name="received_value" id="ValorRecebido" placeholder="99,99"
                                       class="form-control moeda-real" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3" id="divTrocoCliente" name="divTrocoCliente" style="display:none;">
                        <div class="form-group">
                            <label class="control-label">Troco do Cliente:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">R$</span>
                                </div>
                                <input type="text" name="returned_value" id="priceTroco" placeholder="99,99"
                                       class="form-control moeda-real" value="" disabled="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label">{{__("Observações Venda")}}</label>
            <textarea name="internal_observations" class="d-none has-ckeditor" cols="30"
                      rows="10">{{setting_item_with_lang('space_internal_regime',request()->query('lang')) }}</textarea>
        </div>

    </div>
</div>

<div class="modal fade login" id="register" tabindex="-1" role="dialog" aria-hidden="true">
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
