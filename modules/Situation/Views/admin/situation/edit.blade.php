@extends('Base::admin.edit')
@section('admin-content')
    <div class="col-md-9">
        <div class="panel">
            <div class="panel-title"><strong>{{__("{$page_title}")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label document-label">{{__("Nome:")}}</label>
                    <input type="text" name="name" class="form-control document-value" value="{{$row->name}}">
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label>{{__("Setor")}}</label>
                        <div class="input-group">
                            <?php
                            $section = !empty($row->section_id) ? Modules\Situation\Models\Section::find($row->section_id) : false;
                            \App\Helpers\AdminForm::select2('section_id', [
                                'configs' => [
                                    'ajax' => [
                                        'url' => route('section.admin.ajax_get'),
                                        'dataType' => 'json'
                                    ],
                                    'allowClear'  => true,
                                    'placeholder' => __('-- Selecione o Setor --')
                                ]
                            ], !empty($section->id) ? [$section->id, $section->getDisplayName()] : false)
                            ?>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-info btn-sm btn-add-item" data-toggle="modal" data-target="#sectionAdd"><i class="ion-md-add-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Label")}}</label>
                    <select class="form-control" name="label">
                        <option value="primary" @if($row->label=='primary') selected @endif> Primary </option>
                        <option value="secondary" @if($row->label=='secondary') selected @endif> Secondary  </option>
                        <option value="success" @if($row->label=='success') selected @endif> Success </option>
                        <option value="danger" @if($row->label=='danger') selected @endif> Danger </option>
                        <option value="warning" @if($row->label=='warning') selected @endif> Warning </option>
                        <option value="info" @if($row->label=='info') selected @endif> Info </option>
                        <option value="light" @if($row->label=='light') selected @endif> Light </option>
                        <option value="dark" @if($row->label=='dark') selected @endif> Dark </option>
                    </select>
                </div>
                <hr/>
                <label> Labels  </label>
                <span class="badge badge-primary">Primary</span>
                <span class="badge badge-secondary">Secondary</span>
                <span class="badge badge-success">Success</span>
                <span class="badge badge-danger">Danger</span>
                <span class="badge badge-warning">Warning</span>
                <span class="badge badge-info">Info</span>
                <span class="badge badge-light">Light</span>
                <span class="badge badge-dark">Dark</span>
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
    </div>
@endsection
