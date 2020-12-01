@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{!empty($recovery) ? __('Recovery') : __("{$page_title}")}}</h1>
            <div class="title-actions">
                @if(empty($recovery))
                    <a href="{{route($route_list['create'])}}" class="btn btn-primary">{{__("Adicionar")}}</a>
                @endif
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{route($route_list['bulk'])}}" class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Açao em Massa ")}}</option>
                            <option value="publish">{{__(" Publicada ")}}</option>
                            <option value="draft">{{__(" Mover Para Rascunho ")}}</option>
                            <option value="pending">{{__("Mover Para Pendente")}}</option>
                            <option value="in_progress">{{__("Mover Para Confirmada")}}</option>
                            <option value="aborted">{{__("Mover Para Abortada")}}</option>
                            <option value="autorized">{{__("Mover Para Autorizada para Compra")}}</option>
                            <option value="delete">{{__(" Deletar ")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" action="{{ !empty($recovery) ? route($route_list['recovery']) : route($route_list['index'])}}" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    @if(!empty($rows) and $permission_manage)
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
                                <th> {{ __('Cotação')}}</th>
                                <th> {{ __('Prazo de Entrega')}}</th>
                                <th> {{ __('Fornecedores')}}</th>
                                <th> {{ __('Valor Total Cotação')}}</th>
                                <th> {{ __('Situação')}}</th>
                                <th> {{ __('Itens da Cotação')}}</th>
                                <th width="100px"> {{ __('Date')}}</th>
                                <th width="100px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($rows->total() > 0)
                                @foreach($rows as $row)
                                    <tr class="{{$row->status}}">
                                        <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
                                        <td class="title"> <a href="{{route('stock_adjustment.admin.edit',['id'=>$row->id])}}">{{$row->name_formatted}}</a></td>
                                        <td>{{display_date($row->end_date)}}</td>
                                        <td><a href="#" class="review-count-approved" data-toggle="modal" class="modal" data-target="#compositionModal" data-type="supplier" data-value="{{$row->id}}">{{count($row->supplier_composition)}}</a></td>
                                        <td>{{$row->total_price}}</td>
                                        <td><span class="badge badge-{{ $row->budget_status != 'aborted' ? 'publish' : 'draft' }}">{{ strtoupper($row->budget_status_formatted) }}</span></td>
                                        <td><a href="#" class="review-count-approved" data-toggle="modal" class="modal" data-target="#compositionModal" data-type="product" data-value="{{$row->id}}">{{count($row->product_composition)}}</a></td>
                                        <td>
                                            <a href="{{route('budget.admin.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Editar')}}
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
                            <div class="modal fade" id="compositionModal">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title"></h4>
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
                        </table>
                    </div>
                </form>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
@endsection
@section ('script.body')
    <script>
        jQuery(function ($) {
            $(".modal").on("show.bs.modal", function(e) {
                var id = e.relatedTarget.getAttribute('data-value');
                var modalBody = $('.return-composition');
                modalBody.html('<span>Carregando.</span>')

                if (e.relatedTarget.getAttribute('data-type') == 'product')
                    writeProductHTML($, modalBody, id);
                else
                    writeSupplierHTML($, modalBody, id);
            });
        });

        function writeSupplierHTML($, modalBody, id) {
            $('.modal-title').html('Fornecedores')
            var url = "/admin/module/stock/budget/get-supplier-composition/" + id;
            $.get(url, function(data) {
                if (data.length == 0) {
                    modalBody.html('<span>Nenhum fornecedor encontrado.</span>')
                    return;
                }

                var html = "<table class='table table-hover'><thead><tr><td>Nome</td><td>E-mail</td></tr></thead>";

                for (row in data) {
                    html += "<tr><td>"+data[row].name+"</td><td>"+data[row].email+"</td></tr>";
                }

                html += "</table>";
                modalBody.html(html);
            })
        }

        function writeProductHTML($, modalBody, id) {
            $('.modal-title').html('Produtos')
            var url = "/admin/module/stock/budget/get-product-composition/" + id;
            $.get(url, function(data) {
                if (data.length == 0) {
                    modalBody.html('<span>Nenhum produto encontrado.</span>')
                    return;
                }

                var html = "<table class='table table-hover'><thead><tr><td>Produto</td><td>Qtde</td><td>Unidade</td><td>Valor</td></tr></thead>";

                for (row in data) {
                    html += "<tr><td>"+data[row].product+"</td><td>"+data[row].quantity+"</td><td>"+data[row].unity+"</td><td>"+data[row].price+"</td></tr>";
                }

                html += "</table>";
                modalBody.html(html);
            })
        }

        function writeProdutoHTML($, modalBody, url) {
            $('.modal-title').html('Produtos')

            $.get(url, function(data) {
                if (data.length == 0) {
                    modalBody.html('<span>Nenhum produto encontrado.</span>')
                    return;
                }

                var html = "<table class='table table-hover'><thead><tr><td>Produto</td><td>Qtde</td><td>Unidade</td><td>Valor</td></tr></thead>";

                for (row in data) {
                    html += "<tr><td>"+data[row].product+"</td><td>"+data[row].quantity+"</td><td>"+data[row].unity+"</td><td>"+data[row].price+"</td></tr>";
                }

                html += "</table>";
                modalBody.html(html);
            })
        }
    </script>
@endsection
