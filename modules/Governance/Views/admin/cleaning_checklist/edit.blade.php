@extends('Base::admin.edit')
@section('admin-content')
    <div class="col-md-9">
        <div class="panel">
            <div class="panel-title"><strong>{{__("{$page_title}")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label document-label">{{__("CheckList Limpeza:")}}</label>
                    <input type="text" name="name" class="form-control document-value" value="{{$translation->name}}">
                </div>
                <div class="form-group">
                    <label class="control-label">{{__("Como fazer o CheckList")}}</label>
                    <div class="">
                        <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">{{$translation->content}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel">
            <div class="panel-title"><strong>{{__('Status')}}</strong></div>
            <div class="panel-body">
                @if(is_default_lang())
                    <div>
                        <label><input @if($row->status=='publish') checked @endif type="radio" name="status" value="publish"> {{__("AUTORIZADA")}}
                        </label></div>
                    <div>
                        <label><input @if($row->status=='draft') checked @endif type="radio" name="status" value="draft"> {{__("BLOQUEADA")}}
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
            <div class="panel-title"><strong>{{__("Configuração CheckList")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="governance" @if($row->governance) checked @endif value="1"> {{__("Mostrar para Governança")}}
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="main" @if($row->main) checked @endif value="1"> {{__("Principal")}}
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="required" @if($row->required) checked @endif value="1"> {{__("CheckList Obrigatória")}}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
