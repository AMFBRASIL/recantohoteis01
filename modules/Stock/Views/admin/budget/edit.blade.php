@extends('Base::admin.edit')
@section('admin-content')
    <div class="col-md-9">
        <div class="panel">
            <div class="panel-title"><strong>{{__("Data da Cotação e Recebimento")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>{{__("Data Inicial:")}}</label>
                    <input type="date" name="start_date" placeholder="" class="form-control"
                           value="{{$row->start_date}}">
                </div>
                <div class="form-group">
                    <label>{{__("Entregar até:")}}</label>
                    <input type="date" name="end_date" placeholder="" class="form-control" value="{{$row->end_date}}">
                </div>

            </div>
        </div>


        <div class="panel">
            <div class="panel-title"><strong>{{__("Fornecedor")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label><input type="checkbox" name="enable_composition"
                                  @if(!empty($row->product_composition)) checked
                                  @endif value="1"> {{__('Adicionar Fornecedores')}} </label>
                </div>
                <div class="form-group-item" data-condition="enable_composition:is(1)" style="">
                    <div class="g-items-header">
                        <div class="row">
                            <div class="col-md-12">{{__('Fornecedor')}}</div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="g-items">
                        @if(!empty($row->supplier_composition))
                            @php if(!is_array($row->supplier_composition)) $row->supplier_composition = json_decode($row->supplier_composition); @endphp
                            @foreach($row->supplier_composition as $key => $composition)
                                <div class="item" data-number="{{$key}}">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <?php
                                            $supplier = isset($composition['supplier_id']) ? Modules\Supplier\Models\Supplier::find($composition['supplier_id']) : false;
                                            \App\Helpers\AdminForm::select2("supplier_composition[" . $key . "][supplier_id]", [
                                                'configs' => [
                                                    'ajax' => [
                                                        'url' => '/admin/module/supplier/get-select',
                                                        'dataType' => 'json'
                                                    ],
                                                    'allowClear' => true,
                                                    'placeholder' => __('-- Digite para pesquisar --')
                                                ]
                                            ], !empty($supplier->id) ? [$supplier->id, $supplier->getDisplayName()] : false)
                                            ?>
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
                        <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> Adicionar</span>
                    </div>
                    <div class="g-more hide">
                        <div class="item" data-number="__number__">
                            <div class="row">
                                <div class="col-md-11">
                                    <select
                                        class="form-control dungdt-select2-field-lazy"
                                        data-options='{"ajax":{"url":"/admin/module/supplier/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Digite para pesquisar --"}'
                                        name="supplier_composition[__number__][supplier_id]"
                                    >
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <span class="btn btn-danger btn-sm btn-remove-item"><i
                                            class="fa fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>{{__("Produtos")}}</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 d-none">
                        <div class="form-group">
                            <label class="control-label">Preço de venda</label>
                            <input type="number" step="any" name="product_composition" class="form-control" value=""
                                   placeholder="Product Composition">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label><input id="enableProducts" type="checkbox" name="enable_product_composition"
                                  @if(!empty($row->product_composition)) checked
                                  @endif value="1"> {{__('Adicionar Produtos')}} </label>
                </div>
                <div class="form-group-item" data-condition="enable_product_composition:is(1)" style="">
                    <div class="g-items-header">
                        <div class="row">
                            <div class="col-md-5">{{__('Produto')}}</div>
                            <div class="col-md-2">{{__('Qtde')}}</div>
                            <div class="col-md-2">{{__('Unidade')}}</div>
                            <div class="col-md-2">{{__('Valor Estimado')}}</div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="g-items product-composition">
                        @if(!empty($row->product_composition))
                            @php if(!is_array($row->product_composition)) $row->product_composition = json_decode($row->product_composition); @endphp
                            @foreach($row->product_composition as $key => $composition)
                                <div class="item" data-number="{{$key}}">
                                    <div class="row">
                                        <div class="col-md-5 product-detail">
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
                                        <div class="col-md-2">
                                            <input type="number" min="0" name="product_composition[{{$key}}][quantity]"
                                                   class="form-control sale_quantity"
                                                   value="{{isset($composition['quantity']) ? $composition['quantity'] : ''}}">
                                        </div>
                                        <div class="col-md-2">
                                            <?php
                                            $unity = isset($composition['unity']) ? Modules\Product\Models\ProductUnity::find($composition['unity']) : false;
                                            \App\Helpers\AdminForm::select2("product_composition[" . $key . "][unity]", [
                                                'configs' => [
                                                    'ajax' => [
                                                        'url' => '/admin/module/product/product_unity/get-select',
                                                        'dataType' => 'json'
                                                    ],
                                                    'allowClear' => true,
                                                    'placeholder' => __('-- Digite para pesquisar --')
                                                ]
                                            ], !empty($unity->id) ? [$unity->id, $unity->getDisplayName()] : false)
                                            ?>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="product_composition[{{$key}}][price]"
                                                   class="form-control moeda-real price"
                                                   value="{{isset($composition['price']) ? $composition['price'] : ''}}">
                                        </div>
                                        <div class="col-md-1">
                                            <span class="btn btn-danger btn-sm btn-remove-item btn-remove-item-product"><i
                                                    class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="text-right">
                        <span class="btn btn-info btn-sm btn-add-item btn-add-item-product"><i
                                class="icon ion-ios-add-circle-outline"></i> Adicionar</span>
                    </div>
                    <div class="g-more hide">
                        <div class="item" data-number="__number__">
                            <div class="row">
                                <div class="col-md-5 product-detail">
                                    <select
                                        class="form-control dungdt-select2-field-lazy"
                                        data-options='{"ajax":{"url":"/admin/module/product/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Digite para pesquisar --"}'
                                        name="product_composition[__number__][product_id]"
                                    >
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" min="0" __name__="product_composition[__number__][quantity]"
                                           class="form-control stock_quantity sale_quantity" value="">
                                </div>
                                <div class="col-md-2">
                                    <select
                                        class="form-control dungdt-select2-field-lazy"
                                        data-options='{"ajax":{"url":"/admin/module/product/product_unity/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Digite para pesquisar --"}'
                                        name="product_composition[__number__][unity]"
                                    >
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" __name__="product_composition[__number__][price]"
                                           class="form-control price moeda-real price" value="">
                                </div>
                                <div class="col-md-1">
                                    <span class="btn btn-danger btn-sm btn-remove-item btn-remove-item-product"><i
                                            class="fa fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>{{__("Observação Para Fornecedor")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">{{__("Esta observação será visível para o fornecedor.")}}</label>
                    <div class="">
                        <textarea name="supplier_content" class="d-none has-ckeditor" cols="30"
                                  rows="10">{{$row->supplier_content}}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>{{__("Observação Interna")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label
                        class="control-label">{{__("Esta observação é de uso interno, portanto não será visível para o fornecedor.")}}</label>
                    <div class="">
                        <textarea name="internal_content" class="d-none has-ckeditor" cols="30"
                                  rows="10">{{$row->internal_content}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel">
            <div class="panel-title"><strong>{{__('Publicada')}}</strong></div>
            <div class="panel-body">
                @if(is_default_lang())
                    <div>
                        <label><input @if($row->status=='publish') checked @endif type="radio" name="status"
                                      value="publish"> {{__("Publicada")}}
                        </label></div>
                    <div>
                        <label><input @if($row->status=='draft') checked @endif type="radio" name="status"
                                      value="draft"> {{__("Rascunho")}}
                        </label></div>
                @endif
                <div class="text-right">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}
                    </button>
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
                                'placeholder' => __('-- Select User --')
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

        <div class="panel">
            <div class="panel-title"><strong>{{__("Avisos e Controles")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <input type="checkbox" name="send_adm_mail" @if($row->send_adm_mail) checked
                           @endif value="1"> {{__("Enviar Email para ADM")}}
                </div>
                <div class="form-group">
                    <input type="checkbox" name="send_stock_mail" @if($row->send_stock_mail) checked
                           @endif value="1"> {{__("Enviar Email para Estoque")}}
                </div>
                <div class="form-group">
                    <input type="checkbox" name="send_suppliers_mail" @if($row->send_suppliers_mail) checked
                           @endif value="1"> {{__("Enviar E-mail para todos os Fornecedores")}}
                </div>
                <div class="form-group">
                    <input type="checkbox" name="send_manager_mail" @if($row->send_manager_mail) checked
                           @endif value="1"> {{__("Enviar E-mail Gerência")}}
                </div>
                <div class="form-group">
                    <input type="checkbox" name="is_purchase" @if($row->is_purchase) checked
                           @endif value="1"> {{__("Compra")}}
                </div>
            </div>
        </div>

        <div class="panel" id="divValues" style="display: none">
            <div class="panel-title"><strong>Valor total da cotação</strong></div>
            <div class="panel-body">
                <div class="col-md-12">
                    <h6 class="account">Soma Total</h6>
                    <span class="mt-5 balance">
                        <div>
                            <i class="fa fa-plus"></i>R$ <span id="sumPrice">0,00</span>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script.head')
    <link rel="stylesheet" href="{{asset('module/stock/budget/css/edit.css')}}">
@endsection
@section ('script.body')
    <script src="{{asset('module/stock/budget/js/edit.js')}}"></script>
@endsection
