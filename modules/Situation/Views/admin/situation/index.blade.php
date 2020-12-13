@extends('Base::admin.index_create')
@section('admin-form-content')
    <div class="form-group">
        <label>{{__("Nome")}}</label>
        <input type="text" value="{{isset($row) ? $row->name : ''}}" placeholder="{{__("Nome")}}" name="name" class="form-control">
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
            <option value="primary"> Primary </option>
            <option value="secondary"> Secondary  </option>
            <option value="success"> Success </option>
            <option value="danger"> Danger </option>
            <option value="warning"> Warning </option>
            <option value="info"> Info </option>
            <option value="light"> Light </option>
            <option value="dark"> Dark </option>
        </select>
    </div>
    <div class="">
        <button class="btn btn-primary" type="submit">{{__("Adicionar")}}</button>
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
@endsection

@section('admin-search-content')
    <thead>
    <tr>
        <th width="60px"><input type="checkbox" class="check-all"></th>
        <th> {{ __('Nome')}}</th>
        <th> {{ __('Setor')}}</th>
        <th> {{ __('Label')}}</th>
        <th width="100px"></th>
    </tr>
    </thead>
    <tbody>
    @if($rows->total() > 0)
        @foreach($rows as $row)
            <tr class="{{$row->status}}">
                <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
                <td class="title"> <a href="{{route($route_list['edit'],['id'=>$row->id])}}">{{$row->name}}</a></td>
                <td class="title"> <a data-toggle="modal" data-target="#sectionEdit" href="#" data-id="{{$row->section->id}}" data-name="{{$row->section->name}}">{{$row->section->name}}</a></td>
                <td><span class="badge badge-{{ $row->label }}">{{$row->name}}</span></td>
                <td>{{ display_date($row->updated_at)}}</td>
                <td>
                    <a href="{{route($route_list['edit'],['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Editar')}}
                    </a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7">{{__("Nenhum registro encontrado.")}}</td>
        </tr>
    @endif
    </tbody>
@endsection

<div class="modal fade" id="sectionAdd">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="post" class="modal-form" action="{{ route('section.admin.ajax_store') }}">
            @csrf
            <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Cadastro Setor') }}</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="booking-detail-93" class="tab-pane active">
                            <span class="response-message"></span>
                            <br />
                            <div class="booking-review">
                                <div class="booking-review-content">
                                    <div class="review-section">
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <span type="btn" class="btn btn-primary modalSubmit">{{_('Salvar')}}</span>
                    <span class="btn btn-secondary" data-dismiss="modal">{{_('Fechar')}}</span>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="sectionEdit">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="post" class="modal-form" action="{{ route('section.admin.ajax_store') }}">
            @csrf
            <input type="hidden" class="section-id" name="section_id">
            <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Editar Setor') }}</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="booking-detail-93" class="tab-pane active">
                            <span class="response-message"></span>
                            <br />
                            <div class="booking-review">
                                <div class="booking-review-content">
                                    <div class="review-section">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="control-label">{{__("Nome:")}}</label>
                                                        <input type="text" name="name" class="section-name form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <span type="btn" class="btn btn-primary modalSubmit-edit">{{_('Salvar')}}</span>
                    <span class="btn btn-secondary" data-dismiss="modal">{{_('Fechar')}}</span>
                </div>
            </form>
        </div>
    </div>
</div>

@section ('script.body')
    <script>
        jQuery(function ($) {
            $(".modal").on("show.bs.modal", function(e) {
                var section_id = e.relatedTarget.getAttribute('data-id');
                var section_name = e.relatedTarget.getAttribute('data-name');

                console.log(section_id, section_name);
                if (section_id) {
                    $(this).find('.section-id').val(section_id);
                    $(this).find('.section-name').val(section_name);

                } else {
                    $(this).find(':input').val('');
                }

                $('.response-message').attr('class','response-message').text('');
            });

            $('.modalSubmit').click(function(e){
                sendAjax(this);
            });

            $('.modalSubmit-edit').click(function(e){
                sendAjax(this, true);
            });

            function sendAjax(modal, edit)
            {
                $.ajax({
                    url: $(modal).parents('.modal-form').attr('action'),
                    method: 'post',
                    data: $(modal).parents('.modal-form').serialize(),
                    beforeSend: function() {
                        $('.response-message').attr('class','response-message alert-info').text('Enviando...');
                    },
                    success: function(result, e){
                        var classMessage = 'success';
                        $('.response-message').attr('class','response-message alert-' + classMessage).text(result.message);

                        if (edit) {
                            location.reload();
                        }
                    }
                });
            }
        });
    </script>
@endsection
