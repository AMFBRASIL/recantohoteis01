@extends('admin.layouts.app')

@section('content')
    <form action="{{route('stock_adjustment.admin.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? __('Edit: ').$row->title : __('Adicionar Ajuste')}}</h1>
                    @if($row->slug)
                        <p class="item-url-demo">{{__("Permalink")}}: {{ url('ajustes' ) }}/<a href="#" class="open-edit-input" data-name="slug">{{$row->slug}}</a>
                        </p>
                    @endif
                </div>
            </div>
            @include('admin.message')
            @if($row->id)
                @include('Language::admin.navigation')
            @endif
            <div class="lang-content-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__("Ajuste de Estoque")}}</strong></div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{__("Tipo Movimento")}}</label>
                                            <select name="movement_type" class="form-control">
                                                <option @if($row->movement_type == 1) selected @endif value="1" >{{__('Saldo Real')}}</option>
                                                <option @if($row->movement_type == 2) selected @endif value="1" >{{__('Somar Qtde')}}</option>
                                                <option @if($row->movement_type == 3) selected @endif value="2" >{{__('Diminuir Qtde')}}</option>                                                <
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{__("Valor Frete")}}</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">R$</span>
                                                </div>
                                                <input type="text" name="shipping_price" placeholder="99,99" class="form-control moeda-real" value="{{$row->shipping_price}}">
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
                                                <input type="number" step="any" name="product_composition" class="form-control" value="" placeholder="Product Composition">
                                                <span><i>{{__('If the regular price is less than the discount , it will show the regular price')}}</i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><input type="checkbox" name="enable_composition" @if(!empty($row->product_composition)) checked @endif value="1"> {{__('Adicionar Produtos')}} </label>
                                    </div>
                                    <div class="form-group-item" data-condition="enable_composition:is(1)" style="">
                                        <label class="control-label">{{__('Composição')}}</label>
                                        <div class="g-items-header">
                                            <div class="row">
                                                <div class="col-md-2">{{__('Produto')}}</div>
                                                <div class="col-md-1">{{__('Qtde')}}</div>
                                                <div class="col-md-2">{{__('Unidade')}}</div>
                                                <div class="col-md-2">{{__('Categoria')}}</div>
                                                <div class="col-md-2">{{__('Sub Categoria')}}</div>
                                                <div class="col-md-2">{{__('Valor')}}</div>
                                                <div class="col-md-1"></div>
                                            </div>
                                        </div>
                                        <div class="g-items">
                                            @if(!empty($row->product_composition))
                                                @php if(!is_array($row->product_composition)) $row->product_composition = json_decode($row->product_composition); @endphp
                                                @foreach($row->product_composition as $key => $composition)
                                                    <div class="item" data-number="{{$key}}">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <?php
                                                                $product = isset($composition['product_id']) ? Modules\Product\Models\Product::find($composition['product_id']) : false ;
                                                                \App\Helpers\AdminForm::select2("product_composition[".$key."][product_id]", [
                                                                    'configs' => [
                                                                        'ajax' => [
                                                                            'url' => '/admin/module/product/get-select',
                                                                            'dataType' => 'json'
                                                                        ],
                                                                        'allowClear'  => true,
                                                                        'placeholder' => __('-- Digite para pesquisar --')
                                                                    ]
                                                                ], !empty($product->id) ? [$product->id, $product->getDisplayName()] : false)
                                                                ?>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input type="number" min="0" name="product_composition[{{$key}}][quantity]" class="form-control" value="{{isset($composition['quantity']) ? : ''}}">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <?php
                                                                $unity = isset($composition['unity_id']) ? Modules\Product\Models\ProductUnity::find($composition['unity_id']) : false ;
                                                                \App\Helpers\AdminForm::select2("product_composition[".$key."][unity_id]", [
                                                                    'configs' => [
                                                                        'ajax' => [
                                                                            'url' => '/admin/module/product/product_unity/get-select',
                                                                            'dataType' => 'json'
                                                                        ],
                                                                        'allowClear'  => true,
                                                                        'placeholder' => __('-- Digite para pesquisar --')
                                                                    ]
                                                                ], !empty($unity->id) ? [$unity->id, $unity->getDisplayName()] : false)
                                                                ?>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <?php
                                                                $category = isset($composition['category_id']) ? Modules\Product\Models\ProductCategory::find($composition['category_id']) : false ;
                                                                \App\Helpers\AdminForm::select2("product_composition[".$key."][category_id]", [
                                                                    'configs' => [
                                                                        'ajax' => [
                                                                            'url' => '/admin/module/product/product_category/get-select',
                                                                            'dataType' => 'json'
                                                                        ],
                                                                        'allowClear'  => true,
                                                                        'placeholder' => __('-- Digite para pesquisar --')
                                                                    ]
                                                                ], !empty($category->id) ? [$category->id, $category->getDisplayName()] : false)
                                                                ?>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <?php
                                                                $subcategory = isset($composition['product_id']) ? Modules\Product\Models\ProductSubCategory::find($composition['subcategory_id']) : false ;
                                                                \App\Helpers\AdminForm::select2("product_composition[".$key."][subcategory_id]", [
                                                                    'configs' => [
                                                                        'ajax' => [
                                                                            'url' => '/admin/module/product/product_subcategory/get-select',
                                                                            'dataType' => 'json'
                                                                        ],
                                                                        'allowClear'  => true,
                                                                        'placeholder' => __('-- Digite para pesquisar --')
                                                                    ]
                                                                ], !empty($subcategory->id) ? [$subcategory->id, $subcategory->getDisplayName()] : false)
                                                                ?>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input type="text" name="product_composition[{{$key}}][price]" class="form-control moeda-real" value="{{isset($composition['price']) ? : ''}}">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="text-right">
                                            <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> Add item</span>
                                        </div>
                                        <div class="g-more hide">
                                            <div class="item" data-number="__number__">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <select
                                                            class="form-control dungdt-select2-field-lazy"
                                                            data-options='{"ajax":{"url":"/admin/module/product/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Digite para pesquisar --"}'
                                                            name="product_composition[__number__][product_id]"
                                                        >
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="number" min="0" __name__="product_composition[__number__][quantity]" class="form-control" value="">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select
                                                            class="form-control dungdt-select2-field-lazy"
                                                            data-options='{"ajax":{"url":"/admin/module/product/product_unity/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Digite para pesquisar --"}'
                                                            name="product_composition[__number__][unity_id]"
                                                        >
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select
                                                            class="form-control dungdt-select2-field-lazy"
                                                            data-options='{"ajax":{"url":"/admin/module/product/product_category/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Digite para pesquisar --"}'
                                                            name="product_composition[__number__][category_id]"
                                                        >
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select
                                                            class="form-control dungdt-select2-field-lazy"
                                                            data-options='{"ajax":{"url":"/admin/module/product/product_subcategory/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Digite para pesquisar --"}'
                                                            name="product_composition[__number__][subcategory_id]"
                                                        >
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="text" __name__="product_composition[__number__][price]" class="form-control moeda-real" value="">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-title"><strong>{{__("Descrição do Ajuste de Estoque")}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label">{{__("Observações Produto")}}</label>
                                    <div class="">
                                        <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">{{$row->content}}</textarea>
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
                                        <label><input @if($row->status=='publish') checked @endif type="radio" name="status" value="publish"> {{__("Publicada")}}
                                        </label></div>
                                    <div>
                                        <label><input @if($row->status=='draft') checked @endif type="radio" name="status" value="draft"> {{__("Rascunho")}}
                                        </label></div>
                                @endif
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
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
                                            'ajax'        => [
                                                'url' => url('/admin/module/user/getForSelect2'),
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
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
                                    <input type="checkbox" name="send_section_mail" @if($row->send_section_mail) checked @endif value="1"> {{__("Enviar Email para Setores")}}
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="send_supplier_mail" @if($row->send_supplier_mail) checked @endif value="1"> {{__("Enviar Email para Estoque")}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </form>
@endsection
@section ('script.body')
    <script>
        jQuery(function ($) {
            $('.moeda-real').mask('#.##0,00', {reverse: true});
        });
    </script>
@endsection
