@extends('Base::admin.edit')
@section('admin-content')
    <div class="col-md-9">
        <div class="panel">
            <div class="panel-title"><strong>{{__("{$page_title}")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label document-label">{{__("Garagem:")}}</label>
                    <input type="text" name="name" class="form-control document-value" value="{{$row->name}}">
                </div>
                <div class="form-group">
                    <select
                        class="form-control building dungdt-select2-field"
                        data-options='{"ajax":{"url":"/admin/module/hotel/building/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Digite para pesquisar --"}'
                        name="building_id"
                    >
                        <option value="{{$row->building_id}}" selected>{{$row->building->getDisplayName()}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <select
                        class="form-control building_floor dungdt-select2-field"
                        data-options='{"ajax":{"url":"/admin/module/hotel/building/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Digite para pesquisar --"}'
                        name="building_floor_id">
                        <option value="{{$row->building_floor_id}}" selected>{{$row->buildingFloor->getDisplayName()}}</option>
                    </select>
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
    </div>
@endsection

@section ('script.body')
    <script>
        jQuery(function ($) {
            $('.building').on('change', function() {
                $('.building_floor').val("");
                $('.building_floor').select2({
                    ajax: {
                        url: '/admin/module/hotel/building/'+$(this).val()+'/floor/get-select',
                        dataType: 'json'
                    }
                });
            })
        });
    </script>
@endsection
