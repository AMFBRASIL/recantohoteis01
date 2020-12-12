@extends('Base::admin.edit')
@section('admin-content')
    <div class="col-md-9">
        <div class="panel">
            <div class="panel-title"><strong>{{__("Templates de Envio")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label document-label">{{__("Titulo:")}}</label>
                    <input type="text" name="title" class="form-control" value="{{$row->title}}">
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label document-label">{{__("Assunto Padrão:")}}</label>
                            <input type="text" name="subject" class="form-control" value="{{$row->subject}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label document-label">{{__("Código:")}}</label>
                            <input type="text" name="code" class="form-control document-value" value="{{$row->code ?? $row->code_generated}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">{{__("Conteudo Html ou Texto")}}</label>
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
            <div class="panel-title"><strong>{{__("Autorizações")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <input type="hidden" name="use_system" value="">
                    <input type="checkbox" name="use_system" @if($row->use_system) checked @endif value="1"> {{__("Uso do Sistema")}}
                </div>
                <div class="form-group">
                    <input type="hidden" name="use_email" value="">
                    <input type="checkbox" name="use_email" @if($row->use_email) checked @endif value="1"> {{__("Uso para E-mail")}}
                </div>
                <div class="form-group">
                    <input type="hidden" name="use_whatsapp" value="">
                    <input type="checkbox" name="use_whatsapp" @if($row->use_whatsapp) checked @endif value="1"> {{__("Uso para WhatsApp")}}
                </div>
                <div class="form-group">
                    <input type="hidden" name="use_sms" value="">
                    <input type="checkbox" name="use_sms" @if($row->use_sms) checked @endif value="1"> {{__("Uso para SMS")}}
                </div>
            </div>
        </div>
    </div>
@endsection
