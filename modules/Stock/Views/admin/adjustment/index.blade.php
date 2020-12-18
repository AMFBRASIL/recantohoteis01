@extends('Base::admin.index')
@section('admin-content')
<thead>
<tr>
    <th width="60px"><input type="checkbox" class="check-all"></th>
    <th> {{ __('Tipo Movimento')}}</th>
    <th> {{ __('Vlr. Frete')}}</th>
    <th> {{ __('Composição')}}</th>
    <th> {{ __('Enviar Email Setores')}}</th>
    <th> {{ __('Enviar Email Estoque')}}</th>
    <th width="100px"> {{ __('Status')}}</th>
    <th width="100px"> {{ __('Date')}}</th>
    <th width="100px"></th>
</tr>
</thead>
<tbody>
@if($rows->total() > 0)
    @foreach($rows as $row)
        <tr class="{{$row->status}}">
            <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
            <td class="title"> <a href="{{route('stock_adjustment.admin.edit',['id'=>$row->id])}}">{{$row->movement_type_formatted}}</a></td>
            <td>{{$row->shipping_price_formatted ?? ''}}</td>
            <td><a href="#" class="review-count-approved" data-toggle="modal" class="modal" data-target="#compositionModal" data-value="{{$row->id}}">{{$row->product_composition ? _('Sim') : 'Não'}}</a></td>
            <td><span class="badge badge-{{ $row->send_section_mail ? 'publish' : 'draft'}}">{{\Modules\Stock\Models\StockAdjustment::getConditionalFormattedAttribute($row->send_section_mail)}}</span></td>
            <td><span class="badge badge-{{ $row->send_supplier_mail ? 'publish' : 'draft'}}">{{\Modules\Stock\Models\StockAdjustment::getConditionalFormattedAttribute($row->send_supplier_mail)}}</span></td>
            <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
            <td>{{ display_date($row->updated_at)}}</td>
            <td>
                <a href="{{route('stock_adjustment.admin.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Editar')}}
                </a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="7">{{__("Nenhum ajuste encontrado.")}}</td>
    </tr>
@endif
</tbody>
@endsection
<div class="modal fade" id="compositionModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Produtos</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="tab-content">
                    <div id="booking-detail-93" class="tab-pane active">
                        <span class="response-message"></span>
                        <br />
                        <div class="booking-review">
                            <div class="booking-review-content">
                                <div class="review-section return-composition">
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
                var product_id = e.relatedTarget.getAttribute('data-value');
                var url = "/admin/module/stock/adjustment/get-product-composition/" + product_id;
                var modalBody = $('.return-composition');
                modalBody.html('<span>Carregando.</span>')
                $.get(url, function(data) {
                    if (data.length == 0) {
                        modalBody.html('<span>Nenhum produto encontrado.</span>')
                        return;
                    }

                    var html = "<table class='table table-hover'><thead><tr><td>Produto</td><td>Qtde</td><td>Valor</td></tr></thead>";

                    for (row in data) {
                        html += "<tr><td>"+data[row].product+"</td><td>"+data[row].quantity+"</td><td>"+data[row].price+"</td></tr>";
                    }

                    html += "</table>";
                    modalBody.html(html);
                })
            });
        });
    </script>
@endsection
