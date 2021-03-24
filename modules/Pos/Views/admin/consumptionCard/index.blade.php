@extends('admin.layouts.app')
@section('title','Pos')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"> {{ __('+ Cartão de Consumo')}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-title"> {{ __('Add Cartao de Consumo')}}</div>
                    <div class="panel-body">
                        <form action="{{route('pos.admin.consumption.card.store',['id'=>-1])}}" method="post">
                            @csrf
                            @include('Pos::admin/consumptionCard/form',['parents'=>$rows])
                            <div class="">
                                <button class="btn btn-primary" type="submit"> {{ __('Add New')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="filter-div d-flex justify-content-between">
                    <div class="col-left">
                        @if(!empty($rows))
                            <form method="post" action="{{url('admin/module/pos/consumptionCard/bulkEdit')}}"
                                  class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}
                                <select name="action" class="form-control">
                                    <option value="">{{__(" Ação em Massa ")}}</option>
                                    <option value="delete">{{__(" Delete ")}}</option>
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}"
                                        class="btn-info btn btn-icon dungdt-apply-form-btn"
                                        type="button">{{__('Confirmar')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-left">
                        <form method="get" action="{{url('/admin/module/pos/consumptionCard')}} "
                              class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            <input type="text" name="s" value="{{ Request()->s }}" class="form-control"
                                   placeholder="">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit"
                                    type="submit">{{__('Pesquisa por Nome')}}</button>
                        </form>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="10%" style="color: #D50000"> {{ __('CARTÃO')}} </th>
                                    <th width="15%" style="color: #D50000"> {{ __('CLIENTE')}} </th>
                                    <th width="10%" style="color: #D50000"> {{ __('HOSPEDE')}} </th>
                                    <th width="10%" style="color: #D50000"> {{ __('DAY USE')}} </th>
                                    <th width="10%" style="color: #D50000"> {{  __('VALOR DISPONÍVEL')}} </th>
                                    <th width="10%" style="color: #D50000"> {{  __('EM USO')}} </th>
                                    <th width="5%" style="color: #D50000"> {{  __('SITUAÇÃO')}} </th>
                                    <th width="5%" style="color: #D50000"> {{  __('OBS.')}} </th>
                                    <th width="10%" style="color: #D50000"> {{  __('DATA')}} </th>
                                    <th width="5%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($rows) > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td class="title">
                                                <a href="#">#{{$row->card_number}}</a>
                                            </td>
                                            <td class="title">
                                                @if ($row->user)
                                                    <a href="#">{{$row->user->getNameAttribute()}}</a>
                                                @endif
                                            </td>
                                            <td class="title">
                                                @if ($row->room)
                                                    <span class="badge badge-primary">SIM - {{$row->room->number}}</span>
                                                @else
                                                    <span class="badge badge-danger">NAO</span>
                                                @endif
                                            </td>
                                            <td class="title">
                                                @if ($row->day_user)
                                                    <span class="badge badge-primary">SIM</span>
                                                @else
                                                    <span class="badge badge-danger">NAO</span>
                                                @endif
                                            </td>
                                            <td class="title">
                                                <span class="badge badge-primary">
                                                    R$ <span>
                                                        {{$row->value_card_formatted}}
                                                    </span>
                                                 </span>
                                            </td>
                                            <td class="title">
                                                <a href="#" class="review-count-approved  detalhesConsumo"
                                                   data-toggle="modal" data-target="#product" data-value="{{$row->id}}">
                                                    R$ <span>
                                                        {{$row->value_consumed_formatted}}
                                                    </span>
                                                </a>
                                            </td>
                                            <td class="title">
                                                @if ($row->situation)
                                                    <span class="badge badge-{{$row->situation->label}}"
                                                          style="text-transform: uppercase">{{$row->situation->name}}</span>
                                                @endif
                                            </td>
                                            <td class="title">
                                                <a href="#" class="review-count-approved" data-toggle="modal"
                                                   data-target="#observacao"
                                                   data-value="{{$row->internal_observations}}">
                                                    Ver mais
                                                </a>
                                            </td>
                                            <td class="title">
                                                <a href="#">{{$row->transaction_date->format('d/m/y H:m')}}</a>
                                            </td>
                                            <td>
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        Ação
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item detalhesReserva" href="#">
                                                            Edit Cartão
                                                        </a>
                                                        <a class="dropdown-item"
                                                           href="{{route('pos.admin.historical.consumer.card.index',['parent'=>$row->id])}}">
                                                            Add Mais Credito
                                                        </a>
                                                        <a class="dropdown-item"
                                                           href="{{route('pos.admin.historical.consumer.card.index',['parent'=>$row->id])}}">
                                                            Histórico de Cartões
                                                        </a>
                                                        <a class="dropdown-item"
                                                           href="{{route('pos.admin.historical.consumer.card.closed.index',['parent'=>$row->id])}}">
                                                            Fechar Cartão
                                                        </a>
                                                    </div>
                                                </div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="observacao" class="modal fade">
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

    @include('User::admin/form-register/index')

    <div id="product" class="modal fade" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">

            <!-- Modal content-->
            <div class="modal-content">

                <!-- Modal Title-->
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-card-title"></h4>
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

                        th {
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

                        .transaction {
                            font-size: 13px
                        }

                        .progress {
                            height: 3px !important
                        }

                        .money {
                            color: #9FA8DA
                        }

                        .goal {
                            font-size: 17px;
                            color: #D50000;
                            font-weight: 400
                        }

                        .revenue {
                            font-size: 14px;
                            color: #311B92;
                            font-weight: 500
                        }

                        .orders {
                            font-size: 14px;
                            color: #311B92;
                            font-weight: 500
                        }

                        .customer {
                            font-size: 14px;
                            color: #311B92;
                            font-weight: 500
                        }

                    </style>
                    <!-- Modal body -->
                    <div class="modal-body sale-information">
                        <div class="container mt-5 mb-5">
                            <div class="row g-0">
                                <div class="col-md-8 border-right">
                                    <div class="p-1 bg-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="heading1" id="card"></h6>
                                            <div class="d-flex flex-row align-items-center text-muted">
                                                <span
                                                    class=" days mr-2">Ultimas Vendas
                                                </span>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tab-sales" class="table table-borderless">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Venda</th>
                                                    <th>Item</th>
                                                    <th>valor</th>
                                                    <th>Qtde</th>
                                                    <th>Data</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="bg-white border-top p-3">
                                        <span
                                            class="solditems "> Itens consumido
                                        </span>
                                    </div>
                                    <nav>
                                        <ul id="pagination-sales" class="pagination pagination-sm justify-content-end">
                                        </ul>
                                    </nav>
                                </div>

                                <div class="col-md-4">
                                    <div class="p-3 bg-white">
                                        <h6 class="account">Valor Total Consumido</h6>
                                        <span id="value-consumed-modal-em-uso" class="mt-5 restante">
                                        </span>
                                    </div>
                                    <div class="p-2 py-2 bg-white">
                                        <div class="p-2 bg-white">
                                            <h6 class="account">Valor Total Disponível</h6>
                                            <span id="value-card-modal-em-uso" class="mt-5 balance">
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
    <link rel="stylesheet" href="{{asset('module//pos/consumptionCard/css/index.css')}}">
@endsection
@section ('script.body')
    <script src="{{asset('module//pos/consumptionCard/js/index.js')}}"></script>
@endsection

