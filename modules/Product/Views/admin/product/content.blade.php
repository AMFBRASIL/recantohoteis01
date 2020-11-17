<div class="panel">
    <div class="panel-title"><strong>{{__("Dados produto")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label>{{__("Título")}}</label>
            <input type="text" value="{{$translation->title}}" name="title" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>{{__("Código do Produto")}}</label>
                    <input type="text" value="{{$row->product_code}}" name="product_code" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>{{__("Código de barras (EAN)")}}</label>
                    <input type="text" value="{{$row->product_barcode}}" name="product_barcode" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">{{__("Observações Produto")}}</label>
            <div class="">
                <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">{{$row->content}}</textarea>
            </div>
        </div>
        @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">{{__("Banner Image")}}</label>
                <div class="form-group-image">
                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('banner_image_id',$row->banner_image_id) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">{{__("Gallery")}}</label>
                {!! \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery',$row->gallery) !!}
            </div>
        @endif

        <div class="panel">
            <div class="panel-title"><strong>{{__('Composição Produto')}}</strong></div>
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
                    <label><input type="checkbox" name="enable_composition" @if(!empty($row->product_composition)) checked @endif value="1"> {{__('Ativar Composição Produto')}} </label>
                </div>
                <div class="form-group-item" data-condition="enable_composition:is(1)" style="">
                    <label class="control-label">{{__('Composição')}}</label>
                    <div class="g-items-header">
                        <div class="row">
                            <div class="col-md-6">{{__('Produto')}}</div>
                            <div class="col-md-5">{{__('Quantidade')}}</div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="g-items">
                        @if(!empty($row->product_composition))
                            @php if(!is_array($row->product_composition)) $row->product_composition = json_decode($row->product_composition); @endphp
                            @foreach($row->product_composition as $key => $composition)
                                <div class="item" data-number="{{$key}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            $product = isset($composition['name']) ? Modules\Product\Models\Product::find($composition['name']) : false ;
                                            \App\Helpers\AdminForm::select2("product_composition[".$key."][name]", [
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
                                        <div class="col-md-5">
                                            <input type="number" min="0" name="product_composition[{{$key}}][price]" class="form-control" value="{{isset($composition['price']) ? : ''}}">
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
                                <div class="col-md-6">
                                    <select
                                        class="form-control dungdt-select2-field-lazy"
                                        data-options='{"ajax":{"url":"/admin/module/product/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Selecione o Estoque --"}'
                                        name="product_composition[__number__][name]"
                                    >
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="number" min="0" __name__="product_composition[__number__][price]" class="form-control" value="">
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
            <div class="panel-title"><strong>{{__('Composição de Preço do Produto')}}</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">{{__("Custo Produto:")}}</label>
                            <input type="text" name="price" placeholder="R$" class="form-control" value="{{$row->price}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">{{__("Valor de Venda:")}}</label>
                            <input type="text" name="sale_price" placeholder="R$" class="form-control" value="{{$row->sale_price}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">{{__("Preço Varejista:")}}</label>
                            <input type="text" name="unit_price" placeholder="R$" class="form-control" value="{{$row->unit_price}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>{{__('Configurações de Peso')}}</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">{{__("Peso Liquido:")}}</label>
                            <input type="text" name="net_weight" placeholder="000" class="form-control" value="{{$row->net_weight}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">{{__("Peso Bruto:")}}</label>
                            <input type="text" name="gross_weight" placeholder="000" class="form-control" value="{{$row->gross_weight}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>{{__('Configurações de Estoque')}}</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">{{__("Estoque Disponível:")}}</label>
                            <input type="text" name="available_stock" class="form-control" value="{{$row->available_stock}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">{{__("Estoque Minimo:")}}</label>
                            <input type="text" name="min_stock" class="form-control" value="{{$row->min_stock}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">{{__("Estoque Minimo:")}}</label>
                            <input type="text" name="max_stock" class="form-control" value="{{$row->max_stock}}">
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-title"><strong>{{__('Centro de Estoque')}}</strong></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <?php
                                    $stock = !empty($row->stock_id) ? Modules\Stock\Models\Stock::find($row->stock_id) : false;
                                    \App\Helpers\AdminForm::select2('stock_id', [
                                        'configs' => [
                                            'ajax' => [
                                                'url' => route('stock.admin.ajax_get'),
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
                                            'placeholder' => __('-- Selecione o estoque --')
                                        ]
                                    ], !empty($stock->id) ? [$stock->id, $stock->getDisplayName()] : false)
                                    ?>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info btn-sm btn-add-item" data-toggle="modal" data-target="#stockAdd"><i class="ion-md-add-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>{{__('Configurações de Unidade / Categoria')}}</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('Unidade')}}</strong></div>
                            <div class="panel-body">
                                <div class="input-group">
                                    <?php
                                    $unity = !empty($row->product_unity_id) ? Modules\Product\Models\ProductUnity::find($row->product_unity_id) : false;
                                    \App\Helpers\AdminForm::select2('product_unity_id', [
                                        'configs' => [
                                            'ajax' => [
                                                'url' => '/admin/module/product/product_unity/get-select',
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
                                            'placeholder' => __('-- Selecione a unidade --')
                                        ]
                                    ], !empty($unity->id) ? [$unity->id, $unity->getDisplayName()] : false)
                                    ?>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info btn-sm btn-add-item" data-toggle="modal" data-target="#productUnity"><i class="ion-md-add-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('Categoria')}}</strong></div>
                            <div class="panel-body">
                                <div class="input-group">
                                    <?php
                                    $category = !empty($row->product_category_id) ? Modules\Product\Models\ProductCategory::find($row->product_category_id) : false;
                                    \App\Helpers\AdminForm::select2('product_category_id', [
                                        'configs' => [
                                            'ajax' => [
                                                'url' => '/admin/module/product/product_category/get-select',
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
                                            'placeholder' => __('-- Selecione a categoria --')
                                        ]
                                    ], !empty($category->id) ? [$category->id, $category->getDisplayName()] : false)
                                    ?>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info btn-sm btn-add-item" data-toggle="modal" data-target="#productCategory"><i class="ion-md-add-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('Sub Categoria')}}</strong></div>
                            <div class="panel-body">
                                <div class="input-group">
                                    <?php
                                    $subcategory = !empty($row->product_subcategory_id) ? Modules\Product\Models\ProductSubCategory::find($row->product_subcategory_id) : false;
                                    \App\Helpers\AdminForm::select2('product_subcategory_id', [
                                        'configs' => [
                                            'ajax' => [
                                                'url' => '/admin/module/product/product_subcategory/get-select',
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
                                            'placeholder' => __('-- Selecione a sub categoria --')
                                        ]
                                    ], !empty($subcategory->id) ? [$subcategory->id, $subcategory->getDisplayName()] : false)
                                    ?>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info btn-sm btn-add-item" data-toggle="modal" data-target="#productSubCategory"><i class="ion-md-add-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>{{__('Configurações de Fornecedor')}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <?php
                    $supplier = !empty($row->supplier_id) ? Modules\Product\Models\ProductSubCategory::find($row->supplier_id) : false;
                    \App\Helpers\AdminForm::select2('supplier_id', [
                        'configs' => [
                            'ajax' => [
                                'url' => '/admin/module/supplier/get-select',
                                'dataType' => 'json'
                            ],
                            'allowClear'  => true,
                            'placeholder' => __('-- Selecione o fornecedor --')
                        ]
                    ], !empty($supplier->id) ? [$supplier->id, $supplier->getDisplayName()] : false)
                    ?>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>{{__('Configuração NCM / CEST')}}</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">{{__("NCM:")}}</label>
                            <?php
                            $ncm = !empty($row->ncm_id) ? Modules\Product\Models\CFOP::find($row->ncm_id) : false;
                            \App\Helpers\AdminForm::select2('ncm_id', [
                                'configs' => [
                                    'ajax' => [
                                        'url' => '/admin/module/product/ncm/get-select',
                                        'dataType' => 'json'
                                    ],
                                    'allowClear'  => true,
                                    'placeholder' => __('-- Selecione --')
                                ]
                            ], !empty($ncm->id) ? [$ncm->id, $ncm->getDisplayName()] : false)
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">{{__("CEST - Situação Tributária:")}}</label>
                            <?php
                            $cest = !empty($row->cest_id) ? Modules\Product\Models\CFOP::find($row->cest_id) : false;
                            \App\Helpers\AdminForm::select2('cest_id', [
                                'configs' => [
                                    'ajax' => [
                                        'url' => '/admin/module/product/cest/get-select',
                                        'dataType' => 'json'
                                    ],
                                    'allowClear'  => true,
                                    'placeholder' => __('-- Selecione --')
                                ]
                            ], !empty($cest->id) ? [$cest->id, $cest->getDisplayName()] : false)
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>{{__('Configuração NCM / CEST')}}</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('CST/CSOSN')}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <select data-placeholder=" " name="csosn_code" class="form-control">
                                        <optgroup label="Código de Situação da Operação" disabled="disabled">
                                            <option @if($row->origin_code == "ICMS_00") selected @endif value="ICMS_00">{{_('00 - Tributada integralmente')}}</option>
                                            <option @if($row->origin_code == "ICMS_10") selected @endif value="ICMS_10">{{_('10 - Tributada e com cobrança do ICMS por substituição tributária')}}</option>
                                            <option @if($row->origin_code == "ICMS_20") selected @endif value="ICMS_20">{{_('20 - Com redução de base de cálculo')}}</option>
                                            <option @if($row->origin_code == "ICMS_30") selected @endif value="ICMS_30">{{_('30 - Isenta ou não tributada e com cobrança do ICMS por substituição tributária')}}</option>
                                            <option @if($row->origin_code == "ICMS_40") selected @endif value="ICMS_40">{{_('40 - Isenta')}}</option>
                                            <option @if($row->origin_code == "ICMS_41") selected @endif value="ICMS_41">{{_('41 - Não tributada')}}</option>
                                            <option @if($row->origin_code == "ICMS_50") selected @endif value="ICMS_50">{{_('50 - Suspensão')}}</option>
                                            <option @if($row->origin_code == "ICMS_51") selected @endif value="ICMS_51">{{_('51 - Diferimento')}}</option>
                                            <option @if($row->origin_code == "ICMS_60") selected @endif value="ICMS_60">{{_('60 - ICMS cobrado anteriormente por substituição tributária')}}</option>
                                            <option @if($row->origin_code == "ICMS_70") selected @endif value="ICMS_70">{{_('70 - Com redução de base de cálculo e cobrança do ICMS por substituição tributária')}}</option>
                                            <option @if($row->origin_code == "ICMS_90") selected @endif value="ICMS_90">{{_('90 - Outras')}}</option>
                                        </optgroup>
                                        <optgroup label="Código de Situação da Operação - Simples Nacional">
                                            <option @if($row->origin_code == "ICMS_101") selected @endif value="ICMS_101">{{_('101 - Tributada pelo Simples Nacional com permissão de crédito')}}</option>
                                            <option @if($row->origin_code == "ICMS_102") selected @endif value="ICMS_102">{{_('102 - Tributada pelo Simples Nacional sem permissão de crédito')}}</option>
                                            <option @if($row->origin_code == "ICMS_103") selected @endif value="ICMS_103">{{_('103 - Isenção do ICMS no Simples Nacional para faixa de receita bruta')}}</option>
                                            <option @if($row->origin_code == "ICMS_201") selected @endif value="ICMS_201">{{_('201 - Tributada pelo Simples Nacional com permissão de crédito e com cobrança do ICMS por substituição tributária')}}</option>
                                            <option @if($row->origin_code == "ICMS_202") selected @endif value="ICMS_202">{{_('202 - Tributada pelo Simples Nacional sem permissão de crédito e com cobrança do ICMS por substituição tributária')}}</option>
                                            <option @if($row->origin_code == "ICMS_203") selected @endif value="ICMS_203">{{_('203 - Isenção do ICMS no Simples Nacional para faixa de receita bruta e com cobrança do ICMS por substituição tributária')}}</option>
                                            <option @if($row->origin_code == "ICMS_300") selected @endif value="ICMS_300">{{_('300 - Imune')}}</option>
                                            <option @if($row->origin_code == "ICMS_400") selected @endif value="ICMS_400">{{_('400 - Não tributada pelo Simples Nacional')}}</option>
                                            <option @if($row->origin_code == "ICMS_500") selected @endif value="ICMS_500">{{_('500 - ICMS cobrado anteriormente por substituição tributária (substituído) ou por antecipação')}}</option>
                                            <option @if($row->origin_code == "ICMS_900") selected @endif value="ICMS_900">{{_('900 - Outros')}}</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label">{{__("%ICMS * :")}}</label>
                                    <input type="text" name="csosn_value" placeholder="18.00" class="form-control" value="{{$row->csosn_value}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('CST/PIS')}}</strong></div>
                            <div class="panel-body">
                                <div class="input-group">
                                    <?php
                                    $pis = !empty($row->cst_pis_id) ? Modules\Product\Models\ProductPIS::find($row->cst_pis_id) : false;
                                    \App\Helpers\AdminForm::select2('cst_pis_id', [
                                        'configs' => [
                                            'ajax' => [
                                                'url' => '/admin/module/product/product_pis/get-select',
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
                                            'placeholder' => __('-- Selecione --')
                                        ]
                                    ], !empty($pis->id) ? [$pis->id, $pis->getDisplayName()] : false)
                                    ?>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info btn-sm btn-add-item" data-toggle="modal" data-target="#productPIS"><i class="ion-md-add-circle"></i></button>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label">{{__("%PIS * :")}}</label>
                                    <input type="text" name="cst_pis_value" placeholder="18.00" class="form-control" value="{{$row->cst_pis_value}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('CST/COFINS')}}</strong></div>
                            <div class="panel-body">
                                <div class="input-group">
                                    <?php
                                    $cofins = !empty($row->cst_pis_id) ? Modules\Product\Models\ProductCOFINS::find($row->cst_cofins_id) : false;
                                    \App\Helpers\AdminForm::select2('cst_cofins_id', [
                                        'configs' => [
                                            'ajax' => [
                                                'url' => '/admin/module/product/product_cofins/get-select',
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
                                            'placeholder' => __('-- Selecione --')
                                        ]
                                    ], !empty($cofins->id) ? [$cofins->id, $cofins->getDisplayName()] : false)
                                    ?>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info btn-sm btn-add-item" data-toggle="modal" data-target="#productCOFINS"><i class="ion-md-add-circle"></i></button>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label">{{__("%COFINS * :")}}</label>
                                    <input type="cst_cofins_value" name="city_registration" placeholder="18.00" class="form-control" value="{{$row->cst_cofins_value}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('CST/IPI')}}</strong></div>
                            <div class="panel-body">
                                <div class="input-group">
                                    <?php
                                    $ipi = !empty($row->cst_pis_id) ? Modules\Product\Models\ProductIPI::find($row->cst_ipi_id) : false;
                                    \App\Helpers\AdminForm::select2('cst_ipi_id', [
                                        'configs' => [
                                            'ajax' => [
                                                'url' => '/admin/module/product/product_ipi/get-select',
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
                                            'placeholder' => __('-- Selecione --')
                                        ]
                                    ], !empty($ipi->id) ? [$ipi->id, $ipi->getDisplayName()] : false)
                                    ?>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info btn-sm btn-add-item" data-toggle="modal" data-target="#productIPI"><i class="ion-md-add-circle"></i></button>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label">{{__("%IPI * :")}}</label>
                                    <input type="text" name="cst_ipi_value" placeholder="18.00" class="form-control" value="{{$row->cst_ipi_value}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>{{__('Configuração CFOP')}}</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('CFOP INTERNO')}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <?php
                                    $cfop = !empty($row->cfop_internal_id) ? Modules\Product\Models\CFOP::find($row->cfop_internal_id) : false;
                                    \App\Helpers\AdminForm::select2('cfop_internal_id', [
                                        'configs' => [
                                            'ajax' => [
                                                'url' => '/admin/module/product/cfop/get-select',
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
                                            'placeholder' => __('-- Selecione --')
                                        ]
                                    ], !empty($cfop->id) ? [$cfop->id, $cfop->getDisplayName()] : false)
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('CFOP EXTERNO')}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <?php
                                    $cfop = !empty($row->cfop_external_id) ? Modules\Product\Models\CFOP::find($row->cfop_external_id) : false;
                                    \App\Helpers\AdminForm::select2('cfop_external_id', [
                                        'configs' => [
                                            'ajax' => [
                                                'url' => '/admin/module/product/cfop/get-select',
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
                                            'placeholder' => __('-- Selecione --')
                                        ]
                                    ], !empty($cfop->id) ? [$cfop->id, $cfop->getDisplayName()] : false)
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('ORIGEM')}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <select name="origin_code" class="form-control">
                                        <option @if($row->origin_code == 0) selected @endif value="0" >{{__('0 - Nacional')}}</option>
                                        <option @if($row->origin_code == 1) selected @endif value="1" >{{__('1 - Estrangeira - Importação Direta')}}</option>
                                        <option @if($row->origin_code == 2) selected @endif value="2" >{{__('2 - Estrangeira - Adquirida no mercado interno')}}</option>
                                        <option @if($row->origin_code == 3) selected @endif value="3" >{{__('3 - Nacional, mercadoria ou bem com Conteúdo de Importação superior a 40%')}}</option>
                                        <option @if($row->origin_code == 4) selected @endif value="4" >{{__('4 - Nacional, cuja produção tenha sido feita em conformidade com a MP 252(MP do BEM)')}}</option>
                                        <option @if($row->origin_code == 5) selected @endif value="5" >{{__('5 - Nacional, mercadoria ou bem com Conteúdo de Importação inferior ou igual a 40%')}}</option>
                                        <option @if($row->origin_code == 6) selected @endif value="6" >{{__('6 - Estrangeira - Importação direta, sem similar nacional, constante em lista de Resolução CAMEX')}}</option>
                                        <option @if($row->origin_code == 7) selected @endif value="7" >{{__('7 - Estrangeira - Adquirida no mercado interno, sem similar nacional, constante em lista de Resolução CAMEX')}}</option>
                                        <option @if($row->origin_code == 8) selected @endif value="8" >{{__('8 - Nacional, mercadoria ou bem com Conteúdo de Importação superior a 70%')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
