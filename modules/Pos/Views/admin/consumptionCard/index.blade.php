@extends('admin.layouts.app')
@section('title','Pos')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"> {{ __('Cartão de Consumo')}}</h1>
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
                                    <th width="15%" style="color: #D50000"> {{ __('CARTÃO')}} </th>
                                    <th width="30%" style="color: #D50000"> {{ __('CLIENTE')}} </th>
                                    <th width="10%" style="color: #D50000"> {{  __('ÚLTIMO VALOR')}} </th>
                                    <th width="10%" style="color: #D50000"> {{  __('EM USO')}} </th>
                                    <th width="10%" style="color: #D50000"> {{  __('SITUAÇÃO')}} </th>
                                    <th width="10%" style="color: #D50000"> {{  __('OBS.')}} </th>
                                    <th width="10%" style="color: #D50000"> {{  __('DATA')}} </th>
                                    <th width="5%" ></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($rows) > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td class="title">
                                                <a href="#">{{$row->card_number}}</a>
                                            </td>
                                            <td class="title">
                                                @if ($row->user)
                                                    <a href="#">{{$row->user->getNameAttribute()}}</a>
                                                @endif
                                            </td>
                                            <td class="title">
                                                <span class="badge badge-primary">
                                                    R$ <span class="moeda-real">
                                                        {{$row->lastValueCard()}}
                                                    </span>
                                                 </span>
                                            </td>
                                            <td class="title">
                                                <a href="#" class="review-count-approved  detalhesConsumo">R$</a>
                                            </td>
                                            <td class="title">
                                                @if ($row->situation)
                                                    <span class="badge badge-{{$row->situation->label}}"
                                                          style="text-transform: uppercase">{{$row->situation->name}}</span>
                                                @endif
                                            </td>
                                            <td class="title">
                                                <a href="#" class="review-count-approved" data-toggle="modal"
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
                        <div class="row">
                            {!! $row->internal_observations  !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Fechar')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade login" id="register" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content relative">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Cadastre-ser')}}</h4>
                    <span class="c-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa">
                        <img src="{{url('images/ico_close.svg')}}" alt="close">
                    </i>
                </span>
                </div>
                <div class="modal-body">
                    @include('Pos::admin/consumptionCard/form-register/index')
                </div>
            </div>
        </div>
    </div>
@endsection
@section ('script.body')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $('.moeda-real').mask('#.##0,00', {reverse: true});

        $(document).ready(function () {
            $(".client").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "{{route('user.admin.autocomplete')}}",
                        type: 'get',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('.client').val(ui.item.label); // display the selected text
                    return false;
                }
            });
        });
    </script>
@endsection

