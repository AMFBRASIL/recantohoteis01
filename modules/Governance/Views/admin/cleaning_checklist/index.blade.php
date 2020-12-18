@extends('Base::admin.index')
@section('admin-content')
<thead>
<tr>
    <th width="60px"><input type="checkbox" class="check-all"></th>
    <th> {{ __('Nome')}}</th>
    <th> {{ __('Como fazer')}}</th>
    <th> {{ __('Sequencia')}}</th>
    <th> {{ __('Tipo Checklist')}}</th>
    <th> {{ __('Governança')}}</th>
    <th> {{ __('Principal')}}</th>
    <th> {{ __('Obrigatório')}}</th>
    <th> {{ __('Status')}}</th>
    <th> {{ __('Date')}}</th>
    <th></th>
</tr>
</thead>
<tbody>
@if($rows->total() > 0)
    @foreach($rows as $row)
        <tr class="{{$row->status}}">
            <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
            <td class="title"> <a href="{{route($route_list['edit'],['id'=>$row->id])}}">{{$row->name}}</a></td>
            <td><a href="#" class="review-count-approved" data-toggle="modal" class="modal" data-target="#checklistModal" data-value="{{$row->content}}">{{ __("+ detalhes")  }}</a></td>
            <td><span class="badge badge-pill badge-danger">{{ $row->sequence }}</span></td>
            <td><span class="badge badge-píll badge-primary">{{ $row->checklistType->name }}</span></td>
            <td><span class="badge badge-{{ $row->governance ? 'publish' : 'draft'}}">{{\Modules\Base\Models\Model::getConditionalFormattedAttribute($row->governance)}}</span></td>
            <td><span class="badge badge-{{ $row->main ? 'publish' : 'draft'}}">{{\Modules\Base\Models\Model::getConditionalFormattedAttribute($row->main)}}</span></td>
            <td><span class="badge badge-{{ $row->required ? 'publish' : 'draft'}}">{{\Modules\Base\Models\Model::getConditionalFormattedAttribute($row->required)}}</span></td>
            <td><span class="badge badge-{{ $row->status }}">{{ $row->status_formatted }}</span></td>
            <td>{{ display_date($row->updated_at)}}</td>
            <td>
                <a href="{{route($route_list['edit'],['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Editar')}}
                </a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="9">{{__("Nenhum registro encontrado.")}}</td>
    </tr>
@endif
</tbody>
@endsection
<div class="modal fade" id="checklistModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Observações CheckList</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="tab-content">
                    <div id="booking-detail-93" class="tab-pane active">
                        <div class="booking-review">
                            <div class="booking-review-content">
                                <div class="form-group">
                                    <div class="checklist-content"></div>
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
                $('.checklist-content').html(e.relatedTarget.getAttribute('data-value'));
            });
        });
    </script>
@endsection
