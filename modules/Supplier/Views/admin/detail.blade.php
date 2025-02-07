@extends('admin.layouts.app')

@section('content')
    <form action="{{route('supplier.admin.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? __('Edit: ').$row->title : __('Adicionar Fornecedor')}}</h1>
                    @if($row->slug)
                        <p class="item-url-demo">{{__("Permalink")}}: {{ url('supplier' ) }}/<a href="#" class="open-edit-input" data-name="slug">{{$row->slug}}</a>
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
                        @include('Supplier::admin.supplier.content')
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
                            <div class="panel-title"><strong>{{__("Configuração Fornecedor")}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="is_simples" @if($row->is_simples) checked @endif value="1"> {{__("Optante Simples Nacional")}}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="is_rural" @if($row->is_rural) checked @endif value="1"> {{__("Produtor Rural")}}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="is_shipping" @if($row->is_shipping) checked @endif value="1"> {{__("Transportadora")}}
                                        </label>
                                    </div>
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
@endsection

@section ('script.body')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            $(document).on('change', '.person_type', function (){
                var person = $(this).val();
                if (person == '1') {
                    $('.document-label').text('CNPJ:')
                    $('.document-value').removeClass('cpf').addClass('cnpj');
                    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
                } else if (person == '2') {
                    $('.document-label').text('CPF:')
                    $('.document-value').removeClass('cnpj').addClass('cpf')
                    $('.cpf').mask('000.000.000-00', {reverse: true});
                }
            });

            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
            $('.cep').mask('00000-000', {reverse: true});
            $('.phone').mask('(00) Z0000-0000', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});

            $(document).on('blur', '.cep', function() {
               var zipcode = $(this).val().replace(/\D/g, '');
                axios.get(`https://viacep.com.br/ws/${zipcode}/json/`)
                    .then(function(response ) {
                        if (!response.data.erro) {
                            console.log(response.data);
                            $('.street_name').val(response.data.logradouro);
                            $('.complement').val(response.data.complemento);
                            $('.neighborhood').val(response.data.bairro);
                            $('.city').val(response.data.localidade);
                            $('.state').val(response.data.uf);
                        }
                });
            });
        })
    </script>
@endsection
