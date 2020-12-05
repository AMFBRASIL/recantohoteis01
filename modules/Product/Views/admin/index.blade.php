@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{!empty($recovery) ? __('Recovery') : __("Produtos")}}</h1>
            <div class="title-actions">
                @if(empty($recovery))
                <a href="{{route('product.admin.create')}}" class="btn btn-primary">{{__("Adicionar Produto")}}</a>
                @endif
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{route('product.admin.bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Bulk Actions ")}}</option>
                            <option value="publish">{{__(" Publish ")}}</option>
                            <option value="draft">{{__(" Move to Draft ")}}</option>
                            <option value="pending">{{__("Move to Pending")}}</option>
                            <option value="clone">{{__(" Clone ")}}</option>
                            @if(!empty($recovery))
                                <option value="recovery">{{__(" Recovery ")}}</option>
                            @else
                                <option value="delete">{{__(" Delete ")}}</option>
                            @endif
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" action="{{ !empty($recovery) ? route('product.admin.recovery') : route('product.admin.index')}}" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    @if(!empty($rows) and $event_manage_others)
                        <?php
                        $user = !empty(Request()->vendor_id) ? App\User::find(Request()->vendor_id) : false;
                        \App\Helpers\AdminForm::select2('vendor_id', [
                            'configs' => [
                                'ajax'        => [
                                    'url'      => url('/admin/module/user/getForSelect2'),
                                    'dataType' => 'json',
                                    'data' => array("user_type"=>"vendor")
                                ],
                                'allowClear'  => true,
                                'placeholder' => __('-- Vendor --')
                            ]
                        ], !empty($user->id) ? [
                            $user->id,
                            $user->name_or_email . ' (#' . $user->id . ')'
                        ] : false)
                        ?>
                    @endif
                    <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Buscar por nome')}}" class="form-control">
                    <button class="btn-info btn btn-icon btn_search" type="submit">{{__('Buscar')}}</button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="60px"><input type="checkbox" class="check-all"></th>
                            <th width="100px"> {{ __('Nome')}}</th>
                            <th width="130px"> {{ __('Fornecedor')}}</th>
                            <th width="130px"> {{ __('Vlr. Venda')}}</th>
                            <th width="130px"> {{ __('Estoque Atual')}}</th>
                            <th width="130px"> {{ __('Estoque Min')}}</th>
                            <th width="130px"> {{ __('Serviço')}}</th>
                            <th width="130px"> {{ __('Cardápio')}}</th>
                            <th width="130px"> {{ __('POS')}}</th>
                            <th width="130px"> {{ __('Controle Estoque')}}</th>
                            <th width="130px"> {{ __('Facilities')}}</th>
                            <th width="100px"> {{ __('Status')}}</th>
                            <th width="100px"> {{ __('Composição')}}</th>
                            <th width="100px"> {{ __('Date')}}</th>
                            <th width="100px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($rows->total() > 0)
                            @foreach($rows as $row)
                                <tr class="{{$row->status}}">
                                    <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
                                    <td class="title"> <a href="{{route('product.admin.edit',['id'=>$row->id])}}">{{$row->title}}</a></td>
                                    <td>{{$row->supplier ? $row->supplier->title : ''}}</td>
                                    <td>{{$row->sale_price_formatted}}</td>
                                    <td><span class="badge badge-publish">{{$row->available_stock}}</span></td>
                                    <td><span class="badge badge-publish">{{$row->min_stock}}</span></td>
                                    <td><span class="badge badge-{{ $row->is_service ? 'publish' : 'draft'}}">{{\Modules\Product\Models\Product::getConditionalFormattedAttribute($row->is_service)}}</span></td>
                                    <td><span class="badge badge-{{ $row->show_in_menu ? 'publish' : 'draft'}}">{{\Modules\Product\Models\Product::getConditionalFormattedAttribute($row->show_in_menu)}}</span></td>
                                    <td><span class="badge badge-{{ $row->enable_pos ? 'publish' : 'draft'}}">{{\Modules\Product\Models\Product::getConditionalFormattedAttribute($row->enable_pos)}}</span></td>
                                    <td><span class="badge badge-{{ $row->control_stock ? 'publish' : 'draft'}}">{{\Modules\Product\Models\Product::getConditionalFormattedAttribute($row->control_stock)}}</span></td>
                                    <td><span class="badge badge-{{ $row->facilities ? 'publish' : 'draft'}}">{{\Modules\Product\Models\Product::getConditionalFormattedAttribute($row->facilities)}}</span></td>
                                    <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
                                    <td><a href="#" class="review-count-approved" data-toggle="modal" class="modal" data-target="#compositionModal" data-value="{{$row->id}}">{{$row->product_composition ? _('Sim') : 'Não'}}</a></td>
                                    <td>{{ display_date($row->updated_at)}}</td>
                                    <td>
                                        <a href="{{route('product.admin.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Editar')}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">{{__("Nenhum produto encontrado.")}}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    </div>
                </form>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="compositionModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Composição do Produto</h4>
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
@endsection
@section ('script.body')
    <script>
        jQuery(function ($) {
            $(".modal").on("show.bs.modal", function(e) {
                var product_id = e.relatedTarget.getAttribute('data-value');
                var url = "/admin/module/product/get-product-composition/" + product_id;
                var modalBody = $('.return-composition');
                modalBody.html('<span>Carregando.</span>')
                $.get(url, function(data) {
                    if (data.length == 0) {
                        modalBody.html('<span>Nenhum produto encontrado.</span>')
                        return;
                    }

                    var html = "<table class='table table-hover'><thead><tr><td>Produto</td><td>Quantidade</td></tr></thead>";

                    for (row in data) {
                        html += "<tr><td>"+data[row].name+"</td><td>"+data[row].quantity+"</td></tr>";
                    }


                    html += "</table>";
                    modalBody.html(html);
                })
            });

            $('.moeda-real').mask('#.##0,00', {reverse: true});
        });
    </script>
@endsection
