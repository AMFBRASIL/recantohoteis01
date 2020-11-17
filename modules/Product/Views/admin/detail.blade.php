@extends('admin.layouts.app')

@section('content')
    <form action="{{route('product.admin.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? __('Edit: ').$row->title : __('Adicionar Produto')}}</h1>
                    @if($row->slug)
                        <p class="item-url-demo">{{__("Permalink")}}: {{ url('product' ) }}/<a href="#" class="open-edit-input" data-name="slug">{{$row->slug}}</a>
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
                        @include('Product::admin.product.content')
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
                            <div class="panel-title"><strong>{{__("Liberações Terminal / POS")}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <input type="checkbox" name="control_stock" @if($row->control_stock) checked @endif value="1"> {{__("Controla Estoque")}}
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="enable_pos" @if($row->enable_pos) checked @endif value="1"> {{__("Enable POS")}}
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="enable_nf" @if($row->enable_nf) checked @endif value="1"> {{__("Enable Nota Fiscal")}}
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="show_in_menu" @if($row->show_in_menu) checked @endif value="1"> {{__("Sai no Cardápio")}}
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="use_balance" @if($row->use_balance) checked @endif value="1"> {{__("Usa balança")}}
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="loan_object" @if($row->loan_object) checked @endif value="1"> {{__("Objeto para Emprestimo")}}
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="input_product" @if($row->input_product) checked @endif value="1"> {{__("Produto de Insumo")}}
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="is_service" @if($row->is_service) checked @endif value="1"> {{__("Serviço")}}
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-title"><strong>{{__('Feature Image')}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('Product::admin.product.modals.layout', [
        'modal' => 'stockAdd',
        'url' => route('stock.admin.ajax_store'),
        'title' => 'Cadastro de Estoque',
        'view' => 'Product::admin.product.modals.stock_add'
    ])
    @include('Product::admin.product.modals.layout', [
        'modal' => 'productUnity',
        'url' => route('product_unity.admin.ajax_store'),
        'title' => 'Cadastro de Unidade',
        'view' => 'Product::admin.product.modals.product_unity'
    ])
    @include('Product::admin.product.modals.layout', [
        'modal' => 'productCategory',
        'url' => route('product_category.admin.ajax_store'),
        'title' => 'Cadastro de Categoria',
        'view' => 'Product::admin.product.modals.product_category'
    ])
    @include('Product::admin.product.modals.layout', [
        'modal' => 'productSubCategory',
        'url' => route('product_subcategory.admin.ajax_store'),
        'title' => 'Cadastro de Sub Categoria',
        'view' => 'Product::admin.product.modals.product_subcategory'
    ])
    @include('Product::admin.product.modals.layout', [
       'modal' => 'productPIS',
       'url' => route('product_pis.admin.ajax_store'),
       'title' => 'Cadastro de CST/PIS',
       'view' => 'Product::admin.product.modals.product_pis'
   ])
    @include('Product::admin.product.modals.layout', [
       'modal' => 'productCOFINS',
       'url' => route('product_cofins.admin.ajax_store'),
       'title' => 'Cadastro de COFINS',
       'view' => 'Product::admin.product.modals.product_cofins'
   ])
    @include('Product::admin.product.modals.layout', [
      'modal' => 'productIPI',
      'url' => route('product_ipi.admin.ajax_store'),
      'title' => 'Cadastro de IPI',
      'view' => 'Product::admin.product.modals.product_ipi'
  ])
@endsection
@section ('script.body')
    <script>
        jQuery(function ($) {
            $(".modal").on("show.bs.modal", function(e) {
                $('.response-message').attr('class','response-message').text('');
                $(this).find(':input').val('');
            });
            $('.modalSubmit').click(function(e){
                $.ajax({
                    url: $(this).parents('.modal-form').attr('action'),
                    method: 'post',
                    data: $(this).parents('.modal-form').serialize(),
                    beforeSend: function() {
                        $('.response-message').attr('class','response-message alert-info').text('Enviando...');
                    },
                    success: function(result, e){
                        var classMessage = 'success';
                        $('.response-message').attr('class','response-message alert-' + classMessage).text(result.message);
                    }
                });
            });

            $('.moeda-real').mask('#.##0,00', {reverse: true});
        });
    </script>
@endsection
