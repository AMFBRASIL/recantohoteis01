@extends('Base::admin.edit')
@section('admin-content')
<div class="col-md-9">
    <div class="panel">
        <div class="panel-title"><strong>{{__("Dados Empresa")}}</strong></div>
        <div class="panel-body">
            <div class="form-group">
                <label>{{__("Razao Social")}}</label>
                <input type="text" value="{{$translation->title}}" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>{{__("Contato")}}</label>
                <input type="text" value="{{$row->contact}}" name="contact" class="form-control" required>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Tipo Empresa:")}}</label>
                        <select name="person_type" data-placeholder=" " class="form-control person_type" required>
                            <option value="" selected="selected"></option>
                            <option label="Pessoa Juridica" @if($row->person_type==1) selected @endif value="1">Pessoa Juridica</option>
                            <option label="Pessoa Fisica" @if($row->person_type==2) selected @endif value="2">Pessoa Fisica</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label document-label">{{__("CNPJ:")}}</label>
                        <input type="text" name="document" class="form-control document-value" value="{{$row->document}}" required>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-title"><strong>{{__('Inscrições / Aniversário')}}</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">{{__("Escrição Estadual:")}}</label>
                                <input type="text" name="state_registration" class="form-control" value="{{$row->state_registration}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">{{__("Escrição Municipal:")}}</label>
                                <input type="text" name="city_registration" class="form-control" value="{{$row->city_registration}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">{{__("Contribuinte:")}}</label>
                                <select name="taxpayer" data-placeholder=" " class="form-control" required>
                                    <option value="" selected="selected"></option>
                                    <option label="Sim" @if($row->taxpayer==1) selected @endif value="1">{{__('Sim')}}</option>
                                    <option label="Não" @if($row->taxpayer==2) selected @endif value="2">{{__('Não')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">{{__("Aniversário:")}}</label>
                                <input type="date" name="birthdate" class="form-control" value="{{$row->birthdate}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-title"><strong>{{__('Endereço')}}</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="control-label">{{__("CEP:")}}</label>
                                <input type="text" name="zipcode" class="form-control cep" value="{{$row->zipcode}}">
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label class="control-label">{{__("Endereço:")}}</label>
                                <input type="text" name="street_name" class="form-control street_name" value="{{$row->street_name}}">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="control-label">{{__("Número:")}}</label>
                                <input type="text" name="street_number" class="form-control" value="{{$row->street_number}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label">{{__("Bairro:")}}</label>
                                <input type="text" name="neighborhood" class="form-control neighborhood" value="{{$row->neighborhood}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label">{{__("Complemento:")}}</label>
                                <input type="text" name="complement" class="form-control complement" value="{{$row->complement}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">{{__("Cidade:")}}</label>
                                <input type="text" name="city" class="form-control city" value="{{$row->city}}">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="control-label">{{__("Estado:")}}</label>
                                <input type="text" name="state" class="form-control state" value="{{$row->state}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-title"><strong>{{__('Dados Comerciais')}}</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">{{__("T: Comercial:")}}</label>
                                <input type="text" name="phone_number" class="form-control phone" value="{{$row->phone_number}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">{{__("T: Whatsapp:")}}</label>
                                <input type="text" name="whatsapp" class="form-control phone" value="{{$row->whatsapp}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">{{__("T: Residencial:")}}</label>
                                <input type="text" name="home_number" class="form-control phone" value="{{$row->home_number}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">{{__("Website")}}</label>
                                <input type="text" name="website" class="form-control" value="{{$row->website}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label">{{__("Email:")}}</label>
                                <input type="text" name="email" class="form-control" value="{{$row->email}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label">{{__("Nome Contato:")}}</label>
                                <input type="text" name="contact_name" class="form-control" value="{{$row->contact_name}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label">{{__("Complemento:")}}</label>
                                <input type="text" name="contact_complement" class="form-control" value="{{$row->contact_complement}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">{{__("Observações Fornecedor")}}</label>
                <div class="">
                    <textarea name="comments" class="d-none has-ckeditor" cols="30" rows="10">{{$row->comments}}</textarea>
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
        <div class="panel-title"><strong>{{__("Configuração Empresa")}}</strong></div>
        <div class="panel-body">
            <div class="form-group">
                <div class="form-group">
                    <label>
                        <input type="hidden" name="is_simples" value="">
                        <input type="checkbox" name="is_simples" @if($row->is_simples) checked @endif value="1"> {{__("Optante Simples Nacional")}}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>
                        <input type="hidden" name="issues_nfe" value="">
                        <input type="checkbox" name="issues_nfe" @if($row->issues_nfe) checked @endif value="1"> {{__("Emissao de NFe")}}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>
                        <input type="hidden" name="issues_nfce" value="">
                        <input type="checkbox" name="issues_nfce" @if($row->issues_nfce) checked @endif value="1"> {{__("Emissao de NFCe")}}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>
                        <input type="hidden" name="issues_sat" value="">
                        <input type="checkbox" name="issues_sat" @if($row->issues_sat) checked @endif value="1"> {{__("Emissao de SAT")}}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>
                        <input type="hidden" name="has_digital_certificate" value="">
                        <input type="checkbox" name="has_digital_certificate" @if($row->has_digital_certificate) checked @endif value="1"> {{__("Certificado Digital")}}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>
                        <input type="hidden" name="has_digital_counter" value="">
                        <input type="checkbox" name="has_digital_counter" @if($row->has_digital_counter) checked @endif value="1"> {{__("Contador Digital")}}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>
                        <input type="hidden" name="issues_sped" value="">
                        <input type="checkbox" name="issues_sped" @if($row->issues_sped) checked @endif value="1"> {{__("Emissao de SPED")}}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>
                        <input type="hidden" name="is_main" value="">
                        <input type="checkbox" name="is_main" @if($row->is_main) checked @endif value="1"> {{__("Principal")}}
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-title"><strong>{{__('Imagem do Logo Empresa')}}</strong></div>
        <div class="panel-body">
            <div class="form-group">
                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id) !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section ('script.body')
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
        });
    </script>
@endsection
