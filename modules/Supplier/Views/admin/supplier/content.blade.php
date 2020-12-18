<div class="panel">
    <div class="panel-title"><strong>{{__("Dados fornecedor")}}</strong></div>
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

        @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">{{__("Banner Image")}}</label>
                <div class="form-group-image">
                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('banner_image_id',$row->banner_image_id) !!}
                </div>
            </div>
        @endif
    </div>
</div>
