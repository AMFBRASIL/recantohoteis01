@extends('admin.layouts.app')
@section('title','Pos')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"> {{ __('Histórico de Consumo')}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-title"> {{ __('Add Cartao de Consumo')}}</div>
                    <div class="panel-body">
                        <form action="{{route('pos.admin.consumption.card.store',['id'=>$parent->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('Número do Cartão')}}</label>
                                <div class="input-group">
                                    <input type="text" value="{{$parent->card_number}}" disabled="" placeholder=""
                                           name="card_number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Cliente')}}</label>
                                <div class="input-group">
                                    <input type="text" value="{{$parent->user->getNameAttribute()}}" disabled=""
                                           placeholder="cliente" name="client_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Valor Cartão em Uso')}}</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">R$</span>
                                    </div>
                                    <input id="priceRestante" type="text" name="value_card" disabled placeholder="99,99"
                                           class="form-control moeda-real"
                                           value="{{$parent->value_card}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Valor Cartão')}}</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">R$</span>
                                    </div>
                                    <input type="text" name="priceAdd" id="priceAdd" placeholder="99,99"
                                           class="form-control moeda-real" value="{{$parent->priceAdd}}">
                                </div>
                            </div>
                            <div class="panel" id="somaValores" name="somaValores" style="display:none;">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <h6 class="account">Valor a Creditar no Cartão</h6>
                                        <span class="mt-5 balance">
                                            <div id="somaTotal" name="somaTotal">0</div>
                                        </span>
                                        <h6 class="account">Valor a Cobrar do Cliente </h6>
                                        <span class="mt-5 restante">
                                            <div id="somaTotalCobrar" name="somaTotalCobrar">0</div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Situação do Cartão')}}</label>
                                <div class="input-group">
                                    <select class="form-control" required name="situation_id">
                                        @foreach ($situationList as $option)
                                            @if ($parent->situation_id == $option->id)
                                                <option value="{{$option->id}}" selected>{{$option->name}}</option>
                                            @else
                                                <option value="{{$option->id}}">{{$option->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Forma de Pagamento')}}</label>
                                <div class="input-group" data-select2-id="25">
                                    <select id="formPayment" class="form-control" required name="payment_method_id"  data-value="{{$creditCardPayment}}">
                                        @foreach ($paymentMethodList as $option)
                                            @if ($parent->payment_method_id == $option->id)
                                                <option value="{{$option->id}}" selected>{{$option->name}}</option>
                                            @else
                                                <option value="{{$option->id}}">{{$option->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="divNSU" class="form-group">
                                <label>{{ __('Número da Transação Cartão')}}</label>
                                <input id="nsuinput"  type="text" value="{{$parent->card_transaction_number}}"
                                       placeholder="AUHDEUY804837943" name="card_transaction_number"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="control-label"><b>{{ __('Observações Internas')}}</b></label>
                                <textarea name="internal_observations" class="d-none has-ckeditor" cols="30"
                                          rows="10"></textarea>
                            </div>

                            <div class="form-group">
                                <label> {{ __('Data Transação Adicionada')}} </label>
                                <input type="text" value="{{$parent->transaction_date->format('d/m/y H:m')}}"
                                       disabled="" name="transaction_date" class="form-control">
                            </div>

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
                                    <option value="">{{__(" Bulk Action ")}}</option>
                                    <option value="delete">{{__(" Delete ")}}</option>
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}"
                                        class="btn-info btn btn-icon dungdt-apply-form-btn"
                                        type="submit">{{__('Confirmar')}}</button>
                                <button class="btn-primary btn btn-icon novo-cartao-consumo" type="button">
                                    Novo Cartão
                                </button>
                            </form>
                        @endif
                    </div>

                    <div class="col-left">
                        <form method="get"
                              action="{{route('pos.admin.historical.consumer.card.index',['parent'=>$parent->id])}}"
                              class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            <input type="text" name="s" value="{{ Request()->s }}" class="form-control"
                                   placeholder="">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit"
                                    type="submit">{{__('Pesquisa de Situação')}}</button>
                        </form>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <table class="table table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th width="5%" style="color: #D50000"> {{ __('ID.')}}</th>
                                    <th width="15%" style="color: #D50000"> {{ __('CARTÃO')}}</th>
                                    <th width="15%" style="color: #D50000"> {{ __('CLIENTE')}}</th>
                                    <th width="15%" style="color: #D50000"> {{  __('VALORES')}}</th>
                                    <th width="10%" style="color: #D50000"> {{  __('SITUAÇÃO')}}</th>
                                    <th width="10%" style="color: #D50000"> {{  __('FORMA DE PGTO')}}</th>
                                    <th width="15%" style="color: #D50000"> {{  __('TRANSAÇÃO')}}</th>
                                    <th width="10%" style="color: #D50000"> {{  __('OBS.')}}</th>
                                    <th width="10%" style="color: #D50000"> {{  __('DATA')}}</th>
                                    <th width="5%" style="color: #D50000"> {{  __('AÇÕES')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($rows) > 0)
                                    @foreach($rows as $key => $row)
                                        <tr>
                                            <td class="title">
                                                <a>#{{$row->id}}</a>
                                            </td>

                                            <td class="title">
                                                <a href="#">#{{$row->card_number}}</a>
                                            </td>
                                            <td class="title">
                                                @if ($row->user)
                                                    <a href="#">{{$row->user->getNameAttribute()}}</a>
                                                @endif
                                            </td>
                                            <td class="title">
                                                <span class="badge badge-draft">
                                                    R$ <span>{{$row->value_card_formatted}}</span>
                                                </span>
                                            </td>
                                            <td class="title">
                                                @if ($row->situation)
                                                    <span class="badge badge-{{$row->situation->label}}"
                                                          style="text-transform: uppercase">{{$row->situation->name}}</span>
                                                @endif
                                            </td>
                                            <td class="title">
                                                @if ($row->paymentMethod)
                                                    <span class="badge badge-success"
                                                          style="text-transform: uppercase">{{$row->paymentMethod->name}}</span>
                                                @endif
                                            </td>
                                            <td class="title">
                                                <a href="#">{{$row->card_transaction_number}}</a>
                                            </td>
                                            <td class="title">
                                                <a href="#" class="review-count-approved"
                                                   data-value="{{$row->internal_observations}}" data-toggle="modal"
                                                   data-target="#observacao">
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
                                                        <a class="dropdown-item"
                                                           href="{{route('pos.admin.historical.consumer.card.closed.index',['parent'=>$row->consumption_card_id])}}">
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
@endsection
@section('script.head')
    <link rel="stylesheet" href="{{asset('module//pos/historicalConsumerCard/css/index.css')}}">
@endsection
@section ('script.body')
    <script src="{{asset('module//pos/historicalConsumerCard/js/index.js')}}"></script>
@endsection
