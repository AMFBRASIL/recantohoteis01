@extends ('admin.layouts.app')
@section ('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__('Todas Reservas')}}</h1>
            <div class="title-actions">
                <a href="#" class="btn btn-primary NewReserva">Add new Reserva</a>
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between">
            <div class="col-left">
                @if(!empty($booking_update))
                    <form method="post" action="{{url('admin/module/reservation/booking/bulkSituation')}}"
                          class="filter-form filter-form-left d-flex justify-content-start">
                        @csrf
                        <select name="action" class="form-control">
                            <option value="">{{__("-- Ação em Massa --")}}</option>
                            @if(!empty($situationList))
                                @foreach($situationList as $option)
                                    <option
                                        value="{{$option->id}}">{{$option->name}}</option>
                                @endforeach
                            @endif
                            <option value="delete">{{__("DELETE booking")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}"
                                class="btn-info btn btn-icon dungdt-apply-form-btn"
                                type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" action="" class="filter-form filter-form-right d-flex justify-content-end">
                    @csrf
                    <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search by name or ID')}}"
                           class="form-control">
                    <select class="form-control" name="situation_id">
                        <option value="" selected>{{__('-- TODOS --')}}</option>
                        @foreach ($situationList as $option)
                            @if (Request()->situation_id == $option->id)
                                <option value="{{$option->id}}" selected>{{$option->name}}</option>
                            @else
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <button class="btn-info btn btn-icon" type="submit">{{__('Pesquisar')}}</button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
        </div>
        <div class="panel booking-history-manager">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                        <table class="table table-hover bravo-list-item">
                            <thead>
                            <tr>
                                <th width="10px"><input type="checkbox" class="check-all"></th>
                                <th width="10px">{{__('ID')}}</th>
                                <th width="100px">{{__('Reserva')}}</th>
                                <th width="160px">Hóspede Principal</th>
                                <th width="70px">Hóspedes</th>
                                <th width="60px">CHECKIN</th>
                                <th width="60px">CHECKOUT</th>
                                <th width="150px">
                                    <span data-toggle="tooltip" data-placement="top" data-html="true" title=""
                                          data-original-title=" Contrato / Assinatura / Comissao ">C
                                        <i class="fa fa-arrows-h" aria-hidden="true"></i>A
                                        <i class="fa fa-arrows-h" aria-hidden="true"></i>C
                                    </span>
                                </th>
                                <th width="80px">Situação</th>
                                <th width="100px">Total</th>
                                <th width="100px">Pendente</th>
                                <th width="30px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $row)
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}"/>
                                    <td>#{{$row->id}}</td>
                                    <td class="modal-booking-summary">
                                        @if($service = $row->service)
                                            <a href="#" class="review-count-approved detalhesReserva"
                                               data-value="{{$row->id}}">
                                                @if($row->object_model == 'hotel' )
                                                    {{__('Hotel + Detalhes')}}
                                                @else
                                                    {{__('Chácara + Detalhes')}}
                                                @endif
                                            </a>
                                        @else
                                            {{__("[Deleted]")}}
                                        @endif
                                    </td>
                                    <td class="modal-client">
                                        <a href="#" class="review-count-approved" data-value="{{$row->id}}">
                                            {{$row->first_name}} {{$row->last_name}}
                                        </a>
                                    </td>
                                    <td class="modal-guest">
                                        <a href="#" class="review-count-approved" data-value="{{$row->id}}">
                                            {{($row->getMeta('adults') + $row->getMeta('children'))}}
                                        </a>
                                    </td>
                                    <td><b>{{(new DateTime($row->start_date))->format('d/m/y h:m:s')}}</b></td>
                                    <td><b>{{( new DateTime($row->end_date))->format('d/m/y h:m:s')}}</b></td>
                                    <td>
                                        @if($row->is_contract)
                                            <span class="badge badge-success" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" data-original-title=" <h6> Entregue </h6> ">S</span>
                                        @else
                                            <span class="badge badge-danger" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h6> Nao Entregue </h6> ">N</span>
                                        @endif

                                        @if($row->is_signature)
                                            <span class="badge badge-success" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" data-original-title=" <h6> Assinado </h6> ">S</span>
                                        @else
                                            <span class="badge badge-danger" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h6> Não Assinado </h6> ">N</span>
                                        @endif

                                        @if($row->is_commission)
                                            <span class="badge badge-success" data-toggle="tooltip" data-placement="top"
                                                  data-html="true"
                                                  data-original-title=" <h6> Comissao Paga </h6> ">S</span>
                                        @else
                                            <span class="badge badge-danger" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h6> NAO Pago  </h6> ">N</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($row->situation)
                                            <span
                                                class="badge badge-{{$row->situation->label}}">{{$row->situation->name}}</span>
                                        @endif
                                    </td>
                                    <td class="modal-value">
                                        <a href="#" class="review-count-approved" data-value="{{$row->id}}">
                                            R${{number_format($row->total,2)}}
                                        </a>
                                    </td>
                                    <td class="modal-value">
                                        <a href="#" class="review-count-pendente" data-value="{{$row->id}}">
                                            R${{number_format($row->paid,2)}}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Ação
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item action-detail" href="#" idreserva="100"
                                                   data-value="{{$row->id}}">
                                                    <i class="fa fa-info-circle"></i> Detalhes da Reserva
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa fa-list"></i> Acessar a conta
                                                </a>
                                                <a class="dropdown-item action-validation" href="#"
                                                   data-value="{{$row->id}}">
                                                    <i class="fa fa-check"></i> Validações
                                                </a>
                                                <a class="dropdown-item action-payment" href="#"
                                                   data-value="{{$row->id}}">
                                                    <i class="fa fa-dollar"></i> Receber Valor</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            {{$rows->links()}}
        </div>
    </div>

    {{-- Modais --}}
    <div id="booking_summary" class="modal fade" role="dialog" data-backdrop="static" style="display: none;"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- Modal Title-->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <!-- Modal Body-->
                <div class="modal-body"><!-- booking_summary -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="title-booking-modal" class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body" id="printThis">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <table id="information-booking-modal" class="table table-bordered">
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <table id="information-room-booking-modal" class="table table-bordered">
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <table id="table-services-booking-modal" class="table table-bordered">
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <table id="table-values-booking-modal" class="table table-bordered">
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-lg btn-primary" id="printDetailBooking">
                                <i class="fa fa-print"></i> Print Detalhes
                            </button>
                            <a data-fancybox="" data-type="iframe"
                               href="{{ route('print.detalhesreserva') }}"
                               class="btn btn-primary  btn-lg">
                                <i class="fa fa-print"></i> Reserva
                            </a>
                            <a data-fancybox="" data-type="iframe" href="{{ route('print.ficha')}}"
                               class="btn btn-primary  btn-lg">
                                <i class="fa fa-print"></i> FRN
                            </a>
                            <!--- Só aparecer os botoes para impressao quando for APENAS CHACARA
                            ===============================================================================--->
                            <a data-fancybox="" data-type="iframe" href=""
                               class="btn btn-success btn-lg is_hotel booking_summary_term">
                                <i class="fa fa-print"></i> Regras
                            </a>

                            <a data-fancybox="" data-type="iframe" href=""
                               class="btn btn-primary  btn-lg is_hotel booking_summary_contract">
                                <i class="fa fa-print"></i> Contrato
                            </a>

                            <a data-fancybox="" data-type="iframe" href=""
                               class="btn btn-info  btn-lg is_hotel booking_summary_regulation">
                                <i class="fa fa-print"></i> Regulamento
                            </a>
                            <!--- Só aparecer os botoes para impressao quando for APENAS CHACARA
                            ===============================================================================--->
                            <a href="#" class="btn btn-primary btn-lg active editBooking" role="button">Edit Booking</a>
                            <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>

                    <!-- Modal Dinamic From DataBase -->
                    <div class="modal fade" id="empModal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body"></div>
                            </div>
                        </div>
                    </div>
                    <script src="{{asset('/libs/jquery-3.3.1.min.js')}}"></script>
                    <script>
                        $(function () {
                            $('#printDetailBooking').click(function () {
                                $("#printThis").printThis({
                                    debug: false,
                                    importCSS: true,
                                    importStyle: true,
                                    printContainer: true,
                                    loadCSS: "{{asset('css/pms.css')}}",
                                    pageTitle: "Recanto Hoteis S.A",
                                    header: "<h3>Recanto Hoteis S.A. </h3> <br> <h4> Resort e Casa de temporadas ",
                                    removeInline: false,
                                    printDelay: 10,
                                    header: null,
                                    formValues: true
                                });
                            });

                            $("[data-fancybox]").fancybox({
                                iframe: {
                                    css: {
                                        width: '100%'
                                    }
                                }
                            });
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div id="client" class="modal fade" role="dialog" data-backdrop="static" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <!-- Modal Empty content-->
            <div class="modal-content">
                <div class="modal-body"><!---MODAL Detalhes do Cliente --->
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 id="user-title" class="modal-title"></h4>
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

    <div id="guest" class="modal fade" role="dialog" data-backdrop="static" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!-- Modal content-->
            <div class="modal-content">

                <!-- Modal Title-->
                <div class="modal-header">
                    <h4 class="modal-title">Detalhes dos Integrantes</h4>
                </div>

                <!-- Modal Body-->
                <div class="modal-body">
                    <div class="booking-review">
                        <div class="panel">
                            <div class="panel-body">
                                <form action="" class="bravo-form-item">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th width="200px">Nome</th>
                                                <th width="130px">Telefone</th>
                                                <th width="150px">Email</th>
                                                <th width="100px">Status</th>
                                                <th width="100px">Data Cadastro</th>
                                                <th width="100px"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="publish">
                                                <td class="title">
                                                    LUANA DOS SANTOS OLIVEIRA
                                                </td>
                                                <td>(011) 983303993</td>
                                                <td>emaildapessoa@email.com</td>
                                                <td><span class="badge badge-publish">ATIVO</span></td>
                                                <td> 10/10/2020 13:22:11</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-info dropdown-toggle"
                                                                type="button"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item editHospede" href="#"
                                                               data-toggle="modal">+ Editar</a>
                                                            <a class="dropdown-item removeHospede" href="#">Remover
                                                                Hospede do Quarto</a>
                                                            <a class="dropdown-item migrarHospede" href="#">Migrar
                                                                Hospede </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="publish">
                                                <td class="title">
                                                    LUANA DOS SANTOS OLIVEIRA
                                                </td>
                                                <td>(011) 983303993</td>
                                                <td>emaildapessoa@email.com</td>
                                                <td><span class="badge badge-publish">ATIVO</span></td>
                                                <td> 10/10/2020 13:22:11</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-info dropdown-toggle"
                                                                type="button"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item editHospede" href="#"
                                                               data-toggle="modal">+ Editar</a>
                                                            <a class="dropdown-item removeHospede" href="#">Remover
                                                                Hospede do Quarto</a>
                                                            <a class="dropdown-item migrarHospede" href="#">Migrar
                                                                Hospede </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="publish">
                                                <td class="title">
                                                    LUANA DOS SANTOS OLIVEIRA
                                                </td>
                                                <td>(011) 983303993</td>
                                                <td>emaildapessoa@email.com</td>
                                                <td><span class="badge badge-publish">ATIVO</span></td>
                                                <td> 10/10/2020 13:22:11</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-info dropdown-toggle"
                                                                type="button"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item editHospede" href="#"
                                                               data-toggle="modal">+ Editar</a>
                                                            <a class="dropdown-item removeHospede" href="#">Remover
                                                                Hospede do Quarto</a>
                                                            <a class="dropdown-item migrarHospede" href="#">Migrar
                                                                Hospede </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <span class="btn btn-secondary" data-dismiss="modal">FECHAR</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="value" class="modal fade" role="dialog" data-backdrop="static" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!-- Modal content-->
            <div class="modal-content">

                <!-- Modal Title-->
                <div class="modal-header">
                    <h4 class="modal-title">Valores pendentes Hospedagem</h4>
                </div>

                <!-- Modal Body-->
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

                        .th-custom {
                            font-size: 14px;
                            color: #d50000;
                        }

                        tr-custom {
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
                            margin-bottom: 16px !important;
                            font-size: 16px;
                            color: #1a237e;
                        }

                        .transaction {
                            font-size: 13px;
                        }

                        .progress {
                            height: 3px !important;
                        }

                        .money {
                            color: #9fa8da;
                        }

                        .goal {
                            font-size: 17px;
                            color: #d50000;
                            font-weight: 400;
                        }

                        .revenue {
                            font-size: 14px;
                            color: #311b92;
                            font-weight: 500;
                        }

                        .orders {
                            font-size: 14px;
                            color: #311b92;
                            font-weight: 500;
                        }

                        .customer {
                            font-size: 14px;
                            color: #311b92;
                            font-weight: 500;
                        }
                    </style>

                    <!-- Modal body -->
                    <div class="container mt-5 mb-5" id="printValueThis">
                        <div class="row g-0">
                            <div class="col-md-8 border-right">
                                <div class="p-1 bg-white">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="heading1">Itens Consumido Cartão</h6>
                                        <div class="d-flex flex-row align-items-center text-muted"><span
                                                class="days mr-2">Ultimos 10 itens</span> <i
                                                class="fa fa-angle-down"></i></div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-items-payment-modal">
                                            <thead>
                                            <tr>
                                                <th class="th-custom"></th>
                                                <th class="th-custom">Tipo Taxa</th>
                                                <th class="th-custom">valor</th>
                                                <th class="th-custom">Forma Pgto</th>
                                                <th class="th-custom">Data</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="bg-white border-top p-3"><span class="solditems"> Valores Hospede </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-2 py-2 bg-white">
                                    <div class="p-2 bg-white">
                                        <h6 class="account">Valor Total Contratado</h6>
                                        <span class="mt-5 balance value_booking"></span>
                                    </div>
                                </div>
                                <div class="p-2 py-2 bg-white">
                                    <div class="p-2 bg-white">
                                        <h6 class="account">Valor Total Pago</h6>
                                        <span class="mt-5 balance value_pay_s"></span>
                                    </div>
                                </div>
                                <div class="p-3 bg-white">
                                    <h6 class="account">Valor Total a Pagar</h6>
                                    <span class="mt-5 restante value_paid_s"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-lg btn-primary" id="printDetailValue">
                            <i class="fa fa-print"></i> Imprimir
                        </button>
                        <span class="btn btn-secondary" data-dismiss="modal">FECHAR</span>
                    </div>
                    <script>
                        $('#printDetailValue').click(function () {
                            $("#printValueThis").printThis({
                                debug: false,
                                importCSS: true,
                                importStyle: true,
                                printContainer: true,
                                loadCSS: "{{asset('css/pms.css')}}",
                                pageTitle: "Recanto Hoteis S.A",
                                header: "Recanto Hoteis S.A",
                                removeInline: false,
                                printDelay: 10,
                                formValues: true
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div id="validation" class="modal fade" role="dialog" data-backdrop="static" style="display: none;"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!-- Modal content-->
            <div class="modal-content">

                <!-- Modal Title-->
                <div class="modal-header">
                    <h4 class="modal-title">Validando Contratos e Comissoes</h4>
                </div>

                <!-- Modal Body-->
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 ">
                                <div class="dashboard-report-card card purple link-container">
                                    <div class="card-content" dataid="111222" idstatus="1" style="cursor:pointer">
                                        <span class="card-title">LIBERAÇÃO</span>
                                        <span class="card-amount">CONTRATO</span>
                                        <span class="card-desc">ENTREGUE AO CLIENTE?</span>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input id="checkEntregue" type="checkbox"
                                               data-toggle="toggle" data-on="S" data-off="N"
                                               data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 ">
                                <div class="dashboard-report-card card purple link-container">
                                    <div class="card-content" style="cursor:pointer">
                                        <span class="card-title">LIBERAÇÃO</span>
                                        <span class="card-amount">ASSINATURA</span>
                                        <span class="card-desc">ASSINADO PELO CLIENTE?</span>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input id="checkAssinado" type="checkbox"
                                               data-toggle="toggle" data-on="S" data-off="N"
                                               data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 ">
                                <div class="dashboard-report-card card purple link-container">
                                    <div class="card-content" style="cursor:pointer">
                                        <span class="card-title">LIBERAÇÃO</span>
                                        <span class="card-amount">COMISSÃO</span>
                                        <span class="card-desc">COMISSAO PAGA?</span>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input id="checkComissao" type="checkbox"
                                               data-toggle="toggle" data-on="S" data-off="N"
                                               data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="display:none;" id="paymentCampos">
                            <div class="col-sm-12 col-md-12 ">
                                <div class="panel" style="background-color: #ecf0f5;">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group-lg">
                                                    <label for="reserva_situacao">Data Pago</label><br>
                                                    <b><h3>{{(new DateTime())->format('d/m/Y H:m:s')}}</h3></b>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group-lg">
                                                    <label for="reserva_situacao">Valor Pago Comissao
                                                        Vendedor</label><br>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">R$</span>
                                                        </div>
                                                        <input type="text" name="vlrPagoCommission"
                                                               id="vlrPagoCommission" placeholder="99,99"
                                                               class="form-control moeda-real" value=""
                                                               style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="display:none;" id="assinadoContrato">
                            <div class="col-sm-12 col-md-12 ">
                                <div class="panel" style="background-color: #ecf0f5;">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group-lg">
                                                    <label for="reserva_situacao">Data Assinado</label><br>
                                                    <b><h3>{{(new DateTime())->format('d/m/Y H:m:s')}}</h3></b>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group-lg">
                                                    <label for="reserva_situacao">Assinado por</label><br>
                                                    <input type="text" name="assinadoPor" id="assinador" placeholder=""
                                                           class="form-control" value=""
                                                           style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="display:none;" id="contratoEntregue">
                            <div class="col-sm-12 col-md-12 ">
                                <div class="panel" style="background-color: #ecf0f5;">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group-lg">
                                                    <label for="reserva_situacao">Data Entregue</label><br>
                                                    <b><h3>{{(new DateTime())->format('d/m/Y H:m:s')}}</h3></b>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group-lg">
                                                    <label for="reserva_situacao">Entregue para</label><br>
                                                    <input type="text" id="entreguePara" placeholder=""
                                                           class="form-control" value=""
                                                           style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <span class="btn btn-success salveValidation">Salvar Dados</span>
                            <span class="btn btn-secondary" data-dismiss="modal">Close</span>
                        </div>
                    </div>
                    <script>
                        $(function () {
                            $('#checkComissao').change(function () {
                                if ($('#checkComissao').prop('checked')) {
                                    $("#paymentCampos").show();
                                } else {
                                    $("#paymentCampos").hide();
                                }
                            });

                            $('#checkAssinado').change(function () {
                                if ($('#checkAssinado').prop('checked')) {
                                    $("#assinadoContrato").show();
                                } else {
                                    $("#assinadoContrato").hide();
                                }
                            });

                            $('#checkEntregue').change(function () {
                                if ($('#checkEntregue').prop('checked')) {
                                    $("#contratoEntregue").show();
                                } else {
                                    $("#contratoEntregue").hide();
                                }
                            })
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div id="payment" class="modal fade" role="dialog" data-backdrop="static" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!-- Modal content-->
            <div class="modal-content">

                <!-- Modal Title-->
                <div class="modal-header">
                    <h4 class="modal-title">Adiantamento de Valores do Hospede</h4>
                </div>

                <!-- Modal Body-->
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

                        .th-custom-payment {
                            font-size: 14px;
                            color: #d50000;
                        }

                        .tr-custom-payment {
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
                            margin-bottom: 5px !important;
                            font-size: 16px;
                            color: #1a237e;
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
                            font-size: 25px;
                            color: red;
                        }

                        .faltando {
                            font-size: 45px;
                            color: red;
                        }
                    </style>
                    <!-- booking_summary -->
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="col-md-12" style="background-color: #ecf0f5;">
                                <div class="form-group" style="background-color: #ecf0f5;">
                                    <br>
                                    <div class="row ">
                                        <div class="col-lg-4">
                                            <div class="form-group-lg">
                                                <label for="reserva_situacao">Valor Pago</label><br>
                                                <div class="input-group mb-5">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">R$</span>
                                                    </div>
                                                    <input type="text" name="payment_value" id="payment_value"
                                                           placeholder="99,99"
                                                           class="form-control moeda-real" value=""
                                                           style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group-lg">
                                                <label> Forma de pagamento </label>
                                                <div class="input-group">
                                                    <select id="payment_method" class="select_bank form-control"
                                                            name="payment_method_id"
                                                            style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                                        @foreach ($paymentMethodList as $option)
                                                            <option value="{{$option->id}}">{{$option->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group-lg">
                                                <label> Tipo de Pagamentos/Taxas </label>
                                                <select id="payment_type_rate" class="select_bank form-control"
                                                        name="payment_type_rate"
                                                        style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                                    @foreach ($paymentTypeRateList as $option)
                                                        <option value="{{$option->id}}">{{$option->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="background-color: #ecf0f5;">
                                        <div class="col-lg-6">
                                            <div class="form-group-lg" id="divNSU" name="divNSU" style="display:none;">
                                                <label> Número da Transação Cartão </label>
                                                <input type="text" value="" placeholder="AUHDEUY804837943"
                                                       name="transaction_number" id="transaction_number"
                                                       class="form-control"
                                                       style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                </div>
                            </div>
                            <hr>
                            <div class="row g-0" id="printThisPayment">
                                <div class="col-md-8 border-right">
                                    <div class="p-1 bg-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="heading1">Valores Pagos pelo Hospede</h6>
                                            <div class="d-flex flex-row align-items-center text-muted"><span
                                                    class="days mr-2">Ultimos 10 </span> <i
                                                    class="fa fa-angle-down"></i></div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-items-payment-modal">
                                                <thead>
                                                <tr>
                                                    <th class="th-custom-payment"></th>
                                                    <th class="th-custom-payment">Tipo Taxa</th>
                                                    <th class="th-custom-payment">Valor</th>
                                                    <th class="th-custom-payment">Forma Pagamento</th>
                                                    <th class="th-custom-payment">Pago em</th>
                                                    <th class="th-custom-payment"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="bg-white border-top p-3"><span class="solditems"> Valores Pagos </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-2 py-2 bg-white">
                                        <div class="p-2 bg-white">
                                            <h6 class="account">Valor Total Reserva</h6>
                                            <span class="mt-5 faltando value_booking"></span>
                                        </div>
                                    </div>
                                    <div class="p-2 py-2 bg-white">
                                        <div class="p-2 bg-white">
                                            <h6 class="account">Valor Total Pago</h6>
                                            <span class="mt-5 balance value_pay_s_add"></span>
                                        </div>
                                    </div>
                                    <div class="p-3 bg-white">
                                        <h6 class="account">Valor Total Restante</h6>
                                        <div>
                                            <span class="mt-5 restante value_paid_s_add">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-lg btn-success salvePayment">
                                <i class="fa fa-plus"></i> ADD PAYMENT
                            </button>
                            <button type="button" class="btn btn-lg btn-primary" id="printPayment">
                                <i class="fa fa-print"></i> Imprimir
                            </button>
                            <span class="btn btn-lg btn-secondary" data-dismiss="modal">FECHAR</span>

                        </div>
                    </div>

                    <!-- Modal Dinamic From DataBase -->
                    <div class="modal fade" id="empModal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body"></div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#payment_method').on('change', function () {
                            let string = $('#payment_method option:selected').text();

                            if (string.toUpperCase().includes('CARTAO DE CREDITO')) {
                                $('#divNSU').show();
                                $('#nsuinput').focus();
                            } else {
                                $('#divNSU').hide();
                            }
                        });

                        $('#printPayment').click(function () {
                            $("#printThisPayment").printThis({
                                debug: false,
                                importCSS: true,
                                importStyle: true,
                                printContainer: true,
                                loadCSS: "{{asset('css/pms.css')}}",
                                pageTitle: "Recanto Hoteis S.A",
                                header: "Recanto Hoteis S.A",
                                removeInline: false,
                                printDelay: 10,
                                formValues: true
                            });
                        });

                        let valorRestanteO = null;
                        let valorPagoO = null;
                        $('#payment_value').on('keyup', function () {
                            if (valorRestanteO == null && valorPagoO == null) {
                                valorRestanteO = parseFloat($(".value_paid_add").text().replace(/[.]/g, '').replace(',', '.'));
                                valorPagoO = parseFloat($(".value_pay_add").text().replace(/[.]/g, '').replace(',', '.'));
                            }
                            let valorRestante = valorRestanteO
                            let valorPago = valorPagoO
                            let getPriceAdd = $('#payment_value').val().replace(/[.]/g, '').replace(',', '.');
                            let priceAdd = parseFloat(getPriceAdd != '' ? getPriceAdd : 0);

                            // Somando valores
                            let totalValores = (valorRestante - priceAdd);
                            let totalPagoAtualizado = (priceAdd + valorPago);

                            /*console.log({
                                valorRestanteO:valorRestanteO,
                                valorPagoO:valorPagoO,
                                valorRestante:valorRestante,
                                valorPago:valorPago,
                                getPriceAdd:getPriceAdd,
                                priceAdd:priceAdd,
                                totalPagoAtualizado : totalPagoAtualizado,
                                totalValores : totalValores
                            })*/

                            totalPagoAtualizado = formatNumber(totalPagoAtualizado);
                            totalValores = formatNumber(totalValores);


                            $('.value_pay_s_add').html(`<i class='fa fa-plus'></i> R$ <span class="mt-5 value_pay_add">${totalPagoAtualizado}</span>`);

                            if (totalValores < 0) {
                                $('.value_paid_s_add').html(`<i class='fa fa-minus'></i> R$ <span class="mt-5 value_paid_add">${totalValores}</span>`);
                            } else {
                                if (totalValores == 0) {
                                    $('.value_paid_s_add').html(`<i class='fa fa-minus'></i> R$ <span class="mt-5 value_paid_add">0,00</span>`);
                                } else {
                                    $('.value_paid_s_add').html(`<i class='fa fa-plus'></i> R$ <span class="mt-5 value_paid_add">${totalValores}</span>`);
                                }
                            }

                            if (valorRestante < priceAdd) {
                                alert("O Valor a pagar nao poderá ser maior que valor restante.");
                                $('#payment_value').val("");
                                $('.value_paid_s_add').html(`<i class='fa fa-minus'></i> R$ <span class="mt-5 value_paid_add">${valorRestanteO}</span>`);
                                $('.value_pay_s_add').html(`<i class='fa fa-plus'></i> R$ <span class="mt-5 value_pay_add">${valorPagoO}</span>`);
                            }
                        });

                        function formatNumber(value) {
                            if (value != null) {
                                return value.toFixed(2).replace('.', ',')
                                    .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script.head')
    <link rel="stylesheet" href="{{asset('libs/fancybox/css/jquery.fancybox.css')}}"/>
    <link rel="stylesheet" href="{{asset('libs/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.css')}}"/>
@endsection
@section('script.body')
    <script src="{{asset('js/printthis.js')}}"></script>
    <script src="{{asset('libs/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.js')}}"></script>
    <script src="{{asset('libs/fancybox/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('module/reservation/booking/js/reservation.js')}}"></script>
    <script src="{{asset('libs/daterange/moment.min.js')}}"></script>
    <script>
        $(function () {
            $('.moeda-real').mask('#.##0,00', {reverse: true});

            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
