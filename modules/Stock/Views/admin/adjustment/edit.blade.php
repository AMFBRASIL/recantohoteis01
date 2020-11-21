@extends('Base::admin.edit')
@section('admin-content')
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
                            <div class="col-md-7">{{__('Produto')}}</div>
                            <div class="col-md-2">{{__('Qtde')}}</div>
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
                                        <div class="col-md-7">
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
                                        <div class="col-md-2">
                                            <input type="number" min="0" name="product_composition[{{$key}}][quantity]" class="form-control" value="{{isset($composition['quantity']) ? $composition['quantity'] : ''}}">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="product_composition[{{$key}}][price]" class="form-control moeda-real" value="{{isset($composition['price']) ? $composition['price'] : ''}}">
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
                                <div class="col-md-7">
                                    <select
                                        id="teste"
                                        class="form-control teste dungdt-select2-field-lazy"
                                        data-options='{"ajax":{"url":"/admin/module/product/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Digite para pesquisar --"}'
                                        name="product_composition[__number__][product_id]"
                                    >
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" min="0" __name__="product_composition[__number__][quantity]" class="form-control stock_quantity" value="">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" __name__="product_composition[__number__][price]" class="form-control price moeda-real" value="">
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
@endsection
@section ('script.body')
    <script>
        jQuery(function ($) {
            $(document).on('select2:select', '.dungdt-select2-field-lazy', function (e) {
                $(this).parents('.row').find('.stock_quantity').val(e.params.data.available_stock);
                $(this).parents('.row').find('.price').val(e.params.data.price);
            })

            $(".form-group-item .btn-add-item").click(function () {
                var p = $(this).closest(".form-group-item").find(".g-items");
                p.find('.moeda-real').each(function () {
                    $(this).mask('#.##0,00', {reverse: true});
                });
            });

            $('.moeda-real').mask('#.##0,00', {reverse: true});
        });
    </script>
@endsection
