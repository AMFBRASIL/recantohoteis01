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
                <div class="form-group">
                    <label> Tarifa Diaria / Pessoa ( De 1 a 6 )  </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" name="daily_rate_40" placeholder="99,99" class="form-control moeda-real" value="{{$row->daily_rate_40}}">
                    </div>
                </div>
                <div class="form-group">
                    <label> Tarifa Diaria / Pessoa ( De 6 + )  </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" name="daily_rate_100" placeholder="99,99" class="form-control moeda-real" value="{{$row->daily_rate_100}}">
                    </div>
                </div>
                <div class="row form-group">
                <div class="col-12 col-md-6" id="dataLiberacao">
                        <div class="form-group">
                            <label class="control-label">Intervalo Inicial</label>
                            <input type="time" name="start_time" placeholder="00:00" class="form-control" value="{{$row->start_time}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6" id="dataLiberacao">
                        <div class="form-group">
                            <label class="control-label">Intervalo Final</label>
                            <input type="time" name="end_date" placeholder="00:0-" class="form-control" value="{{$row->end_date}}">
                        </div>
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
    </div>
@endsection
@section('script.body')
    <script>
        $(function (){
            $('.moeda-real').mask('#.##0,00', {reverse: true});;
        });
    </script>
@endsection
