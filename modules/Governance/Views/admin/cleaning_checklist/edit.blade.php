@extends('Base::admin.edit')
@section('admin-content')
    <div class="col-md-9">
        <div class="panel">
            <div class="panel-title"><strong>{{__("{$page_title}")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label document-label">{{__("CheckList:")}}</label>
                    <input type="text" name="name" class="form-control document-value" value="{{$translation->name}}">
                </div>
                <div class="form-group">
                    <label class="control-label document-label">{{__("Sequencia:")}}</label>
                    <input type="text" name="sequence" placeholder="Sequencia 01,02,03" class="form-control document-value" value="{{$row->sequence}}">
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>{{__("Configurações Tipo de CheckList")}}</strong></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-12">
                        <div class="input-group">
                            <?php
                            $type = !empty($row->checklist_type_id) ? Modules\Governance\Models\ChecklistType::find($row->checklist_type_id) : false;
                            \App\Helpers\AdminForm::select2('checklist_type_id', [
                                'configs' => [
                                    'ajax' => [
                                        'url' => route('checklist_type.admin.ajax_get'),
                                        'dataType' => 'json'
                                    ],
                                    'allowClear'  => true,
                                    'placeholder' => __('-- Selecione Tipo de Checklist --')
                                ]
                            ], !empty($type->id) ? [$type->id, $type->getDisplayName()] : false)
                            ?>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-info btn-sm btn-add-item" data-toggle="modal" data-target="#checklist-type"><i class="ion-md-add-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>{{__("Observação CheckList")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">{{__("Detalhes de como fazer o CheckList")}}</label>
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
@section('modal')
<div class="modal fade" id="checklist-type">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="post" class="modal-form" action="{{ route('checklist_type.admin.ajax_store') }}">
            @csrf
            <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Cadastro de Tipo Checklist</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="tab-content">
                        <span class="response-message"></span>
                        <br />
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">{{__("Nome:")}}</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span type="btn" class="btn btn-primary modalSubmit">{{_('Salvar')}}</span>
                    <span class="btn btn-secondary" data-dismiss="modal">{{_('Fechar')}}</span>
                </div>
            </form>
        </div>
    </div>
</div>
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
