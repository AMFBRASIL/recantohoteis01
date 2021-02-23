<div class="form-group">
    <label>{{__("Nome Situação")}}</label>
    <input type="text" value="{{isset($row) ? $row->name : ''}}" placeholder="{{__("Nome")}}" name="name"
           class="form-control">
</div>
<div class="form-group">
    <label>{{__("Setor Situação")}}</label>
    <div class="input-group">
        <?php
        $section = !empty($row->section_id) ? Modules\Situation\Models\Section::find($row->section_id) : false;
        \App\Helpers\AdminForm::select2('section_id', [
            'configs' => [
                'ajax' => [
                    'url' => route('section.admin.ajax_get'),
                    'dataType' => 'json'
                ],
                'allowClear' => true,
                'placeholder' => __('-- Selecione o Setor --')
            ]
        ], !empty($section->id) ? [$section->id, $section->getDisplayName()] : false)
        ?>
        <div class="input-group-append">
            <button type="button" class="btn btn-info btn-sm btn-add-item" data-toggle="modal"
                    data-target="#sectionAdd"><i class="ion-md-add-circle"></i></button>
        </div>
    </div>
</div>
<div class="form-group">
    <label>{{__("Label")}}</label>
    <select class="form-control" name="label">
        <option value="primary"> Primary</option>
        <option value="secondary"> Secondary</option>
        <option value="success"> Success</option>
        <option value="danger"> Danger</option>
        <option value="warning"> Warning</option>
        <option value="info"> Info</option>
        <option value="light"> Light</option>
        <option value="dark"> Dark</option>
    </select>
</div>
<div class="">
    <button class="btn btn-primary" type="submit">{{__("Adicionar")}}</button>
</div>
<hr/>
<label> Labels </label>
<span class="badge badge-primary">Primary</span>
<span class="badge badge-secondary">Secondary</span>
<span class="badge badge-success">Success</span>
<span class="badge badge-danger">Danger</span>
<span class="badge badge-warning">Warning</span>
<span class="badge badge-info">Info</span>
<span class="badge badge-light">Light</span>
<span class="badge badge-dark">Dark</span>
