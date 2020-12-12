@extends('Base::admin.index')
@section('admin-content')
    <thead>
    <tr>
        <th width="60px"><input type="checkbox" class="check-all"></th>
        <th> {{ __('ID')}}</th>
        <th> {{ __('Titulo')}}</th>
        <th> {{ __('Codigo')}}</th>
        <th> {{ __('Assunto')}}</th>
        <th> {{ __('Sistema')}}</th>
        <th> {{ __('Email')}}</th>
        <th> {{ __('Whatsapp')}}</th>
        <th> {{ __('SMS')}}</th>
        <th> {{ __('Conteudo')}}</th>
        <th width="100px"></th>
    </tr>
    </thead>
    <tbody>
    @if($rows->total() > 0)
        @foreach($rows as $row)
            <tr class="{{$row->status}}">
                <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
                <td>{{ $row->id }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->code }}</td>
                <td>{{ $row->subject }}</td>
                <td><span class="badge badge-pill badge-{{ $row->use_system ? 'success' : 'danger'}}">{{\Modules\Template\Models\ContentTemplate::getConditionalFormattedAttribute($row->use_system)}}</span></td>
                <td><span class="badge badge-pill badge-{{ $row->use_email ? 'success' : 'danger'}}">{{\Modules\Template\Models\ContentTemplate::getConditionalFormattedAttribute($row->use_email)}}</span></td>
                <td><span class="badge badge-pill badge-{{ $row->use_whatsapp ? 'success' : 'danger'}}">{{\Modules\Template\Models\ContentTemplate::getConditionalFormattedAttribute($row->use_whatsapp)}}</span></td>
                <td><span class="badge badge-pill badge-{{ $row->use_sms ? 'success' : 'danger'}}">{{\Modules\Template\Models\ContentTemplate::getConditionalFormattedAttribute($row->use_sms)}}</span></td>
                <td><a href="#" class="review-count-approved" data-toggle="modal" class="modal" data-target="#checklistModal" data-value="{{$row->content}}">{{ __("Ver Conteudo")  }}</a></td>
                <td><a href="{{route('content_template.admin.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Editar')}}</a></td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7">{{__("Nenhum registro encontrado.")}}</td>
        </tr>
    @endif
    </tbody>
@endsection
<div class="modal fade" id="checklistModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Conteudo do Template') }}</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="tab-content">
                    <div id="booking-detail-93" class="tab-pane active">
                        <div class="booking-review">
                            <div class="booking-review-content">
                                <div class="form-group">
                                    <div class="template-content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section ('script.body')
    <script>
        jQuery(function ($) {
            $(".modal").on("show.bs.modal", function(e) {
                $('.template-content').html(e.relatedTarget.getAttribute('data-value'));
            });
        });
    </script>
@endsection
