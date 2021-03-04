@extends('admin.layouts.app')
@section('title','Situation')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"> {{ __('Situações do Sistema')}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-4 mb40">
                <div class="panel">
                    <div class="panel-title"> {{ __('Add Situações do Sistema')}}</div>
                    <div class="panel-body">
                        <form action="{{route('situation.admin.store',['id'=>-1])}}" method="post">
                            @csrf
                            @include('Situation::admin/situation/form')
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        @if(!empty($rows))
                            <form method="post" action="{{route('situation.admin.bulkEdit')}}"
                                  class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}
                                <select name="action" class="form-control">
                                    <option value="">{{__(" Ação em Massa ")}}</option>
                                    <option value="delete">{{__(" Delete ")}}</option>
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Confirmar')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-left">
                        <form method="get" action="{{route('situation.admin.index')}} " class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            <?php
                            $section = !empty(Request()->section_id) ? Modules\Situation\Models\Section::find(Request()->section_id) : false;
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
                            <input type="text" name="s" value="{{ Request()->s }}" class="form-control" placeholder="{{__('Buscar por Situação')}}">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit" type="submit">{{__('Buscar')}}</button>
                        </form>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <table class="table table-hover">
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
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
@endsection

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
