@extends('admin.layouts.app')
@section('title','Pos')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"> {{ __('Todas as Vendas')}}</h1>
            <div class="title-actions">
                @if(empty($recovery))
                    <a href="{{route('pos.admin.sale.create')}}" class="btn btn-primary">{{__("Add new Venda")}}</a>
                @endif
            </div>
        </div>
        @include('admin.message')

        <div class="filter-div d-flex justify-content-between">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{url('admin/module/pos/sale/bulkSituation')}}"
                          class="filter-form filter-form-left d-flex justify-content-start">
                        @csrf
                        <select name="action" class="form-control">
                            <option value="">Ação em Massa</option>
                            @foreach ($situationList as $option)
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endforeach
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}"
                                class="btn-info btn btn-icon dungdt-apply-form-btn"
                                type="button">{{__('Confirmar')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" action="{{url('/admin/module/pos/sale')}} "
                      class="filter-form filter-form-right d-flex justify-content-end  flex-column flex-sm-row"
                      role="search">
                    <input type="text" name="s" value="{{ Request()->s }}" class="form-control"
                           placeholder="Cliente">
                    <select class="form-control" required name="situation_id">
                        @foreach ($situationList as $option)
                            @if (Request()->situation_id == $option->id)
                                <option value="{{$option->id}}" selected>{{$option->name}}</option>
                            @else
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <button class="btn-info btn btn-icon btn_search" id="search-submit"
                            type="submit">{{__('Pesquisa')}}</button>
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
                                <th width="20px"><input type="checkbox" class="check-all"></th>
                                <th width="20px">ID</th>
                                <th width="170px">Cliente</th>
                                <th width="60px">UH</th>
                                <th width="60px">DAY USE</th>
                                <th width="60px">Cartao</th>
                                <th width="140px">Data Venda</th>
                                <th width="60px">PDV</th>
                                <th width="60px">Situação</th>
                                <th width="60px">Situação Itens</th>
                                <th width="50px">Form Pgto</th>
                                <th width="50px">NSU</th>
                                <th width="50px">Itens</th>
                                <th width="100px">Total</th>
                                <th width="100px">Observação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($rows) > 0)
                                @foreach($rows as $row)
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}">
                                        <td class="title">
                                            #{{$row->id}}
                                        </td>
                                        <td class="title client">
                                            @if ($row->user)
                                                <a href="#" class="review-count-approved"
                                                   data-value="{{$row->user_id}}">
                                                    {{$row->user->getNameAttribute()}}
                                                </a>
                                            @endif
                                        </td>
                                        <td class="title">
                                            @if ($row->room)
                                                <span class="badge badge-success">{{$row->room->number}}</span>
                                            @else
                                                <span class="badge badge-danger">NAO</span>
                                            @endif
                                        </td>
                                        <td class="title">
                                            @if ($row->day_user == 1)
                                                <span class="badge badge-success">SIM</span>
                                            @else
                                                <span class="badge badge-danger">NAO</span>
                                            @endif
                                        </td>
                                        <td class="title card-modal-open">
                                            <a href="#" class="review-count-approved"
                                               data-value="{{$row->card_number}}">
                                                {{$row->card_number}}
                                            </a>
                                        </td>
                                        <td class="title">
                                            <b>{{$row->sales_date->format('d/m/y H:m:s')}}</b>
                                        </td>
                                        <td class="title">
                                            @if ($row->pointSales)
                                                {{$row->pointSales->name}}
                                            @endif
                                        </td>
                                        <td class="title">
                                            @if ($row->situation)
                                                <span class="badge badge-{{$row->situation->label}}"
                                                      style="text-transform: uppercase">{{$row->situation->name}}</span>
                                            @endif
                                        </td>
                                        <td class="productSituation">
                                            <a href="#" class="review-count-approved" data-value="{{$row->id}}">
                                                VER SITUAÇÂO
                                            </a>
                                        </td>

                                        <td class="title">
                                            @if ($row->paymentMethod)
                                                <span class="badge badge-success"
                                                      style="text-transform: uppercase">{{$row->paymentMethod->name}}</span>
                                            @endif
                                        </td>

                                        <td class="title">
                                            @if (empty($row->card_transaction_number))
                                                <span class="badge  badge-primary">...</span>
                                            @else
                                                <span
                                                    class="badge  badge-primary">{{$row->card_transaction_number}}</span>
                                            @endif
                                        </td>

                                        <td class="title product">
                                            <a href="#" class="review-count-approved" data-value="{{$row->id}}">
                                                VER
                                            </a>
                                        </td>

                                        <td class="title product">
                                            <a href="#" class="review-count-pendente moeda-real"
                                               data-value="{{$row->id}}">
                                                R$ {{$row->total_value}}
                                            </a>
                                        </td>

                                        <td class="title">
                                            <a href="#" class="review-count-approved" data-toggle="modal"
                                               data-target="#observation" data-value="{{$row->internal_observations}}">
                                                Ver mais
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">{{__("No data")}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="observation" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("Observações do Cliente")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row" id="internal_observations">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Fechar')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div id="client" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <!-- Modal Empty content-->
            <div class="modal-content">
                <div class="modal-body"><!---MODAL Detalhes do Cliente --->
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Detalhes do Cliente Principal da Reserva</h4>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#booking-customer-119">
                                        <b><span class="badge badge-primary">Informação do Cliente</span></b>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="booking-customer-119" class="tab-pane active">
                                    <br>
                                    <div class="booking-review">
                                        <h4 class="booking-review-title">Informações pessoais</h4>
                                        <div class="booking-review-content">
                                            <div class="review-section">
                                                <div class="info-form user-information">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <span class="btn btn-secondary" data-dismiss="modal">Close</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="card" class="modal fade" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">

            <!-- Modal content-->
            <div class="modal-content">

                <!-- Modal Title-->
                <div class="modal-header">
                    <h4 class="modal-title card-title"></h4>
                </div>

                <!-- Modal body-->
                <div class="modal-body">
                    <style>
                        .heading1 {
                            font-size: 16px;
                            color: #1A237E
                        }

                        .days {
                            font-size: 15px;
                            color: #9FA8DA
                        }

                        th-card {
                            font-size: 14px;
                            color: #D50000
                        }

                        tr {
                            font-size: 13px
                        }

                        .solditems {
                            font-size: 13px;
                            color: #9FA8DA
                        }

                        .balance {
                            font-size: 45px;
                            color: green
                        }

                        .restante {
                            font-size: 45px;
                            color: red
                        }

                        .account {
                            margin-bottom: 36px !important;
                            font-size: 16px;
                            color: #1A237E
                        }
                    </style>

                    <!-- Modal body -->
                    <div class="modal-body card-modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="productSituation" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">

            <!-- Modal content-->
            <div class="modal-content">

                <!-- Modal Title-->
                <div class="modal-header">
                    <h4 class="modal-title">Detalhes da Situação dos Itens da Venda</h4>
                </div>

                <!-- Modal body-->
                <div class="modal-body">
                    <style>
                        .heading1 {
                            font-size: 16px;
                            color: #1a237e;
                        }

                        .days {
                            font-size: 15px;
                            color: #9fa8da;
                        }

                        .th-productStituation {
                            font-size: 14px;
                            color: #d50000;
                        }

                        tr {
                            font-size: 13px;
                        }

                        .solditems {
                            font-size: 13px;
                            color: #9fa8da;
                        }

                        .balance {
                            font-size: 45px;
                            color: green;
                        }

                        .restante {
                            font-size: 45px;
                            color: red;
                        }

                        .account {
                            margin-bottom: 36px !important;
                            font-size: 16px;
                            color: #1a237e;
                        }
                    </style>

                    <!-- Modal body -->
                    <div class="modal-body" id="printThis">
                        <div class="container mt-5 mb-5">
                            <div class="row g-0">
                                <div class="col-md-9 border-right">
                                    <div class="p-1 bg-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 id="title-sales-situation-modal" class="heading1"></h6>
                                            <div class="d-flex flex-row align-items-center text-muted"><span
                                                    class="days mr-2">Lista dos Itens</span> <i
                                                    class="fa fa-angle-down"></i></div>
                                        </div>
                                        <hr>
                                        <div class="table-responsive">
                                            <table id="table-items-sales-situation-modal"
                                                   class="table table-borderless">
                                                <thead>
                                                <tr>
                                                    <th class="th-productStituation">Item</th>
                                                    <th class="th-productStituation">Valor</th>
                                                    <th class="th-productStituation">Qtde</th>
                                                    <th class="th-productStituation">Situação</th>
                                                    <th class="th-productStituation">Data</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="bg-white border-top p-3"><span class="solditems"> ASSINADO POR : <b> ANDERSON MAUTONE </b> </span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 bg-white">
                                        <h6 class="account"><b>Valor Total Pedido</b></h6>
                                        <span id="value-sales-situation-modal" class="mt-5 restante"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-lg btn-primary" id="printDetalhesReserva">
                            <i class="fa fa-print"></i> Imprimir
                        </button>
                        <span class="btn btn-secondary" data-dismiss="modal">FECHAR</span>
                    </div>
                    <script src="{{asset('/libs/jquery-3.3.1.min.js')}}"></script>
                    <script>
                        $('#printDetalhesReserva').click(function () {
                            $("#printThis").printThis({
                                debug: false,
                                importCSS: true,
                                importStyle: true,
                                printContainer: true,
                                loadCSS: "pms.css",
                                pageTitle: "Recanto Hoteis S.A",
                                removeInline: false,
                                printDelay: 10,
                                header: "<h3>Recanto Hoteis S.A. </h3> <br> <h4> Resort e Casa de temporadas ",
                                formValues: true
                            });
                        });
                    </script>
                </div>
            </div>

        </div>
    </div>

    <div id="product" class="modal fade" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">

            <!-- Modal content-->
            <div class="modal-content">

                <!-- Modal Title-->
                <div class="modal-header">
                    <h4 id="modal-sales-title" class="modal-title"></h4>
                </div>

                <!-- Modal body-->
                <div class="modal-body">
                    <style>
                        .heading1 {
                            font-size: 16px;
                            color: #1A237E
                        }

                        .days {
                            font-size: 15px;
                            color: #9FA8DA
                        }

                        .th-product {
                            font-size: 14px;
                            color: #D50000
                        }

                        tr {
                            font-size: 13px
                        }

                        .solditems {
                            font-size: 13px;
                            color: #9FA8DA
                        }

                        .balance {
                            font-size: 45px;
                            color: green
                        }

                        .desconto {
                            font-size: 25px;
                            color: green
                        }

                        .restante01 {
                            font-size: 25px;
                            color: red
                        }

                        .restante {
                            font-size: 45px;
                            color: red
                        }

                        .account {
                            margin-bottom: 36px !important;
                            font-size: 16px;
                            color: #1A237E
                        }
                    </style>
                    <!-- Modal body -->
                    <div class="modal-body sale-information">
                        <div class="container mt-5 mb-5">
                            <div class="row g-0">
                                <div class="col-md-8 border-right">
                                    <div class="p-1 bg-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="heading1" id="sale-information">Itens Consumidos da Venda</h6>
                                            <div class="d-flex flex-row align-items-center text-muted">
                                                <span
                                                    class=" days mr-2">Ultimos 10 itens
                                                </span>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tab-sales" class="table table-borderless">
                                                <thead>
                                                <tr>
                                                    <th class="th-product"></th>
                                                    <th class="th-product">Item</th>
                                                    <th class="th-product">valor</th>
                                                    <th class="th-product">Qtde</th>
                                                    <th class="th-product">Data</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="bg-white border-top p-3">
                                        <span
                                            class="solditems"> Itens consumido
                                        </span>
                                    </div>
                                    <nav>
                                        <ul id="pagination-sales" class="pagination pagination-sm justify-content-end">
                                        </ul>
                                    </nav>
                                </div>

                                <div class="col-md-4">
                                    <div class="p-3 bg-white">
                                        <h6 class="account">Valor Total sem Desconto</h6>
                                        <span id="sale-total-no-discounts" class="mt-5 restante01">
                                        </span>
                                    </div>

                                    <div class="p-2 py-2 bg-white">
                                        <div class="p-2 bg-white">
                                            <h6 class="account">Desconto Aplicado</h6>
                                            <span id="sale-value-discounts" class="mt-5 desconto">
                                            </span>
                                        </div>
                                    </div>

                                    <div class="p-3 bg-white">
                                        <h6 class="account">Valor Total com Desconto</h6>
                                        <span id="sale-total-value" class="mt-5 restante">
                                        </span>
                                    </div>

                                    <div class="p-2 py-2 bg-white">
                                        <div class="p-2 bg-white">
                                            <h6 class="account">Valor Restante Cartão</h6>
                                            <span id="sale-value-card" class="mt-5 balance">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <span class="btn btn-secondary" data-dismiss="modal">FECHAR</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script.head')

@endsection
@section ('script.body')
    <script src="{{asset('module//pos/sales/js/index.js')}}"></script>
    <script src="{{asset('js/printthis.js')}}"></script>
@endsection


