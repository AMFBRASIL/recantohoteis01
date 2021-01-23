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
                    <form method="post" action="{{url('admin/module/pos/sale/bulkEdit')}}"
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
                <form method="get" action="{{url('/admin/module/pos/sale')}} "
                      class="filter-form filter-form-right d-flex justify-content-end  flex-column flex-sm-row"
                      role="search">
                    <input type="text" name="s" value="{{ Request()->s }}" class="form-control"
                           placeholder="Cliente">
                    <select class="form-control" required name="situation_id">
                        @foreach ($situationList as $option)
                            <option value="{{$option->id}}">{{$option->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn-info btn btn-icon btn_search" id="search-submit"
                            type="submit">{{__('Pesquisa')}}</button>
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
                            <th width="20%"> {{ __('CLIENTE')}} </th>
                            <th width="15%"> {{ __('CARTÃO')}} </th>
                            <th width="15%"> {{  __('DATA VENDA')}} </th>
                            <th width="10%"> {{  __('PDV')}} </th>
                            <th width="10%"> {{  __('SITUAÇÃO')}} </th>
                            <th width="15%"> {{  __('FORM. PGTO.')}} </th>
                            <th width="10%"> {{  __('NSU')}} </th>
                            <th width="10%"> {{  __('ITENS')}} </th>
                            <th width="10%"> {{  __('TOTAL')}} </th>
                            <th width="10%"> {{  __('OBSERVAÇÂO')}} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($rows) > 0)
                            @foreach($rows as $row)
                                <tr>
                                    <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}">
                                    <td class="title">
                                        @if ($row->user)
                                            <a href="#" class="review-count-approved" data-toggle="modal"
                                               data-target="#client">
                                                {{$row->user->getNameAttribute()}}
                                            </a>
                                        @endif
                                    </td>
                                    <td class="title">
                                        <a href="#" class="review-count-approved" data-toggle="modal"
                                           data-target="#card">
                                            {{$row->card_number}}
                                        </a>
                                    </td>
                                    <td class="title">
                                        <a href="#">{{$row->sales_date->format('d/m/y H:m')}}</a>
                                    </td>
                                    <td class="title">
                                        <a>PDV</a>
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
                                        <a href="#">NSU</a>
                                    </td>

                                    <td class="title">
                                        <a href="#" class="review-count-approved" data-toggle="modal"
                                           data-target="#product">
                                            VER
                                        </a>
                                    </td>

                                    <td class="title">
                                        <span class="badge badge-danger">
                                            R$ <span class="moeda-real">
                                                {{$row->total_value}}
                                            </span>
                                         </span>
                                    </td>

                                    <td class="title">
                                        <a href="#" class="review-count-approved" data-toggle="modal"
                                           data-target="#observation">
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
                                                <div class="info-form">
                                                    <ul>
                                                        <li class="info-first-name">
                                                            <div class="label">Primeiro nome</div>
                                                            @if ($row->user)
                                                                <div class="val">{{$row->user->first_name}}</div>
                                                            @endif
                                                        </li>
                                                        <li class="info-last-name">
                                                            <div class="label">Sobrenome</div>
                                                            @if ($row->user)
                                                                <div class="val">{{$row->user->last_name}}</div>
                                                            @endif
                                                        </li>
                                                        <li class="info-email">
                                                            <div class="label">Email</div>
                                                            @if ($row->user)
                                                                <div class="val">{{$row->user->email}}</div>
                                                            @endif
                                                        </li>
                                                        <li class="info-phone">
                                                            <div class="label">Telefone</div>
                                                            @if ($row->user)
                                                                <div class="val">{{$row->user->phone}}</div>
                                                            @endif
                                                        </li>
                                                        <li class="info-address">
                                                            <div class="label">Endereço</div>
                                                            @if ($row->user)
                                                                <div class="val">{{$row->user->address}}</div>
                                                            @endif
                                                        </li>
                                                        <li class="info-address2">
                                                            <div class="label">Address line 2</div>
                                                            @if ($row->user)
                                                                <div class="val">{{$row->user->address2}}</div>
                                                            @endif
                                                        </li>
                                                        <li class="info-city">
                                                            <div class="label">Cidade</div>
                                                            @if ($row->user)
                                                                <div class="val">{{$row->user->city}}</div>
                                                            @endif
                                                        </li>
                                                        <li class="info-state">
                                                            <div class="label">Estado / Província / Região</div>
                                                            @if ($row->user)
                                                                <div class="val">{{$row->user->state}}</div>
                                                            @endif
                                                        </li>
                                                        <li class="info-zip-code">
                                                            <div class="label">Cep / Código postal</div>
                                                            @if ($row->user)
                                                                <div class="val">{{$row->user->zip_code}}</div>
                                                            @endif
                                                        </li>
                                                        <li class="info-country">
                                                            <div class="label">País</div>
                                                            @if ($row->user)
                                                                <div class="val">{{$row->user->country}}</div>
                                                            @endif
                                                        </li>
                                                        <li class="info-notes">
                                                            <div class="label">Solicitações extra da reserva</div>
                                                            @if ($row->user)
                                                                <div class="val"></div>
                                                            @endif
                                                        </li>
                                                    </ul>
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
                    <h4 class="modal-title">Detalhes do Uso do Cartao {{$row->card_number}}</h4>
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
                    <div class="modal-body">
                        <div class="container mt-5 mb-5">
                            <div class="row g-0">
                                <div class="col-md-8 border-right">
                                    <div class="p-1 bg-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="heading1"> Detalhes do Uso do Cartao {{$row->card_number}} </h6>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        Situação:
                                                        @if ($row->situation)
                                                            <strong> {{$row->consumerCard()->situation->name}}</strong>
                                                            <br>
                                                        @endif
                                                        Type Card: <strong> DAY USE </strong><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if ($row->user)
                                                            {{$row->user->getNameAttribute()}}<br>
                                                        @endif
                                                        @if(!empty($row->user->business_name))
                                                            {{'Company: ' . $row->user->business_name}}<br>
                                                        @endif
                                                        @if(!empty($row->address))
                                                            {{$row->address .', '. $row->address2}}<br>
                                                        @endif
                                                        @if(!empty($row->city) && !empty($row->state) && !empty($row->zip_code))
                                                            {{$row->city . ' - '. $row->state .' - CEP: '. $row->user->zip_code}}
                                                            <br>
                                                        @endif
                                                        @if ($row->user)
                                                            {{'Phone : '. $row->user->phone}}<br>
                                                            {{'E-mail : ' . $row->user->email}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($row->consumerCard())
                                        <div class="p-3 bg-white">
                                            <h6 class="account">Valor Total Consumido</h6> <span class="mt-5 restante"> <i
                                                    class="fa fa-minus"></i> R$ {{$row->consumerCard()->value_consumed}} </span>
                                        </div>

                                        <div class="p-2 py-2 bg-white">

                                            <div class="p-2 bg-white">
                                                <h6 class="account">Valor Total Disponível</h6> <span
                                                    class="mt-5 balance"> <i
                                                        class="fa fa-plus"></i> R$ {{$row->consumerCard()->value_card}} </span>
                                            </div>

                                        </div>
                                    @endif
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

    <div id="product" class="modal fade" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">

            <!-- Modal content-->
            <div class="modal-content">

                <!-- Modal Title-->
                <div class="modal-header">
                    <h4 class="modal-title">Detalhes dos Itens da Venda {{$row->id}}</h4>
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
                    <div class="modal-body">
                        <div class="container mt-5 mb-5">
                            <div class="row g-0">
                                <div class="col-md-8 border-right">
                                    <div class="p-1 bg-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="heading1">Itens Consumido da Venda ({{$row->id}}) </h6>
                                            <div class="d-flex flex-row align-items-center text-muted"><span
                                                    class=" days mr-2">Ultimos 10 itens</span> <i
                                                    class="fa fa-angle-down"></i></div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Item</th>
                                                    <th>valor</th>
                                                    <th>Qtde</th>
                                                    <th>Data</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($row->product_composition))
                                                    @foreach($row->product_composition as $item)
                                                        <tr>
                                                            <td><i class="fa fa-check-circle fa-2x"></i></td>
                                                            <td>{{$row->productName($item['product_id']) }}</td>
                                                            <td>R$ {{$item['price']}}</td>
                                                            <td>{{$item['quantity']}}</td>
                                                            <td>{{$row->created_at->format('d/m/y h:m:s')}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="bg-white border-top p-3"><span
                                            class="solditems "> Itens consumido </span></div>
                                </div>

                                <div class="col-md-4">
                                    <div class="p-3 bg-white">
                                        <h6 class="account">Valor Total sem Desconto</h6> <span class="mt-5 restante01"> <i
                                                class="fa fa-plus"></i> R$ {{$row->total_value+$row->discounts_value}} </span>
                                    </div>

                                    <div class="p-2 py-2 bg-white">
                                        <div class="p-2 bg-white">
                                            <h6 class="account">Desconto Aplicado</h6> <span class="mt-5 desconto"> <i
                                                    class="fa fa-minus"></i> R$ {{$row->discounts_value}} </span>
                                        </div>
                                    </div>

                                    <div class="p-3 bg-white">
                                        <h6 class="account">Valor Total com Desconto</h6> <span
                                            class="mt-5 balance"> <i
                                                class="fa fa-plus"></i> R$ {{$row->total_value}} </span>
                                    </div>


                                    <div class="p-2 py-2 bg-white">
                                        <div class="p-2 bg-white">
                                            <h6 class="account">Valor Restante Cartão</h6> <span
                                                @if($row->consumerCard())
                                                class="mt-5 restante"> <i class="fa fa-plus"></i> R$ {{$row->consumerCard()->value_card}}  </span>
                                            @endif
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
@section ('script.body')
    <script>

    </script>
@endsection


