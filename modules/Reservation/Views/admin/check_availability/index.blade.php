@extends('admin.layouts.app')

@section ('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Verificar disponibilidades")}}</h1>
        </div>

        <div class="panel">
            <div class="panel-body">
                <div class="filter-div d-flex justify-content-between">
                    <div class="filter-div d-flex justify-content-between">
                        <div class="input-group mb-2 mr-sm-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#new_reservation">{{__("Nova Reserva")}}</button>
                        </div>
                    </div>

                    <form class="form-inline" method="get" action="{{route('check_availability.admin.index')}}">
                        <select name="building_id" id="building" class="select_bank form-control"
                                style="background: #fff; cursor: pointer; padding: 10px 15px; border: 2px solid #ccc;">
                            <option value="">--Selecione os Blocos--</option>
                            @foreach ($data['building'] as $option)
                                @if (!empty(Request()->building_id) and Request()->building_id == $option->id)
                                    <option value="{{$option->id}}" selected>{{$option->name}}</option>
                                @else
                                    <option value="{{$option->id}}">{{$option->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        &nbsp;&nbsp;&nbsp;
                        <select name="floor_id" id="floor" class="select_bank form-control"
                                style="display:none;  background: #fff; cursor: pointer; padding: 10px 15px; border: 2px solid #ccc;">
                        </select>
                        &nbsp;&nbsp;
                        <div class="col-right">
                            <div id="reportrange"
                                 style="background: #fff; cursor: pointer; padding: 10px 20px; border: 2px solid #ccc;">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span>
                                <i class="fa fa-caret-down"></i></div>
                        </div>
                        <input type="hidden" class="form-control" id="startDate" name="checkin" value="">
                        <input type="hidden" class="form-control" id="endDate" name="checkout" value="">
                        &nbsp;&nbsp;
                        <div class="input-group-append">
                            <button id="search" type="submit" class="btn btn-success btn-lg "
                                    style="cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card full-height">
            <div class="card-body">
                <div class="card-title">Overall statistics</div>
                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                    @foreach ($data['statistics'] as $statistics_option)
                        <div class="px-5 pb-5 pb-md-0 text-center">
                            <div
                                class="c100 p{{$statistics_option['percentage']}} {{$statistics_option['label']}} small">
                                <span>{{$statistics_option['total']}}</span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h6 class="fw-bold mt-3 mb-0">{{$statistics_option['situation']['name']}}</h6>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        <div class="panel">
            <div class="panel-title"><strong>{{__('Disponibilidades')}}</strong></div>
            <div class="panel-body mb15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-4 rooms-title">
                            @foreach ($data['hotels'] as $hotel_option)
                                <div class="room-title bg-info text-info" id="room-title-1">
                                    {{ $hotel_option['hotel']->title }}
                                </div>
                                @foreach ($hotel_option['rooms'] as $rooms_option)
                                    <div class="room-label">
                                        <span id="room-num-1-0">{{ $rooms_option['room']->title }}</span>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-8 timeline-wrapper">
                            <div class="timeline-row">
                                @foreach($data['interval'] as $interval)
                                    @if($interval['date']->format('Y-m-d') == $data['now']->format('Y-m-d'))
                                        <div class="timeline-cel timeline-d today">
                                            <b>{{ $interval['day'] }}</b><br>{{ $interval['date']->format('d/m') }}<br>
                                            <div class="badge">0</div>
                                            <a href="#" onclick="return false;" class="ajax-popup-link"
                                               data-params="date=1606262400" data-toggle="modal"
                                               data-target="#check_in_check_out">
                                                <div class="badge badge-checkout">2</div>
                                            </a>
                                            <div class="">
                                                0%
                                            </div>
                                        </div>
                                    @elseif($interval['day'] == 'SAT' || $interval['day'] == 'SUN')
                                        <div class="timeline-cel timeline-d bg-warning">
                                            <b>{{ $interval['day'] }}</b><br>{{ $interval['date']->format('d/m')  }}<br>
                                            <a href="#" onclick="return false;" class="ajax-popup-link"
                                               data-params="date=1606521600" data-toggle="modal"
                                               data-target="#check_in_check_out">
                                                <div class="badge badge-checkin">2</div>
                                            </a>
                                            <div class="badge">0</div>
                                            <div class="">
                                                3.08%
                                            </div>
                                        </div>
                                    @else
                                        <div class="timeline-cel timeline-d">
                                            <b>{{ $interval['day'] }}</b><br>{{ $interval['date']->format('d/m')  }}<br>
                                            <div class="badge">0</div>
                                            <div class="badge">0</div>
                                            <div class="">
                                                3.08%
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach ($data['hotels'] as $kh => $hotel_option)
                                <div class="room-row">
                                    <div class="timeline-row">
                                        @foreach($data['interval'] as $interval)
                                            @if($interval['date']->format('Y-m-d') == $data['now']->format('Y-m-d'))
                                                <div class="timeline-cel timeline-price today">
                                                    <div>$ 129</div>
                                                    <div></div>
                                                    <span class="text-muted">10</span>
                                                </div>
                                            @elseif($interval['day'] == 'SAT' || $interval['day'] == 'SUN')
                                                <div class="timeline-cel timeline-price bg-warning">
                                                    <div>$ 129</div>
                                                    <div></div>
                                                    <span class="text-muted">8</span>
                                                </div>
                                            @else
                                                <div class="timeline-cel timeline-price">
                                                    <div>$ 129</div>
                                                    <div></div>
                                                    <span class="text-muted">10</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    @foreach ($hotel_option['rooms'] as $kr => $rooms_option)
                                        <div class="timeline-row">
                                            @foreach($data['interval'] as $interval)
                                                @php $hasBooking = false;  $period = '';@endphp
                                                @foreach($rooms_option['hotel_bookings'] as $hotel_booking)
                                                    @if($interval['date']->format('Y-m-d') > (new DateTime($hotel_booking->start_date))->format('Y-m-d')
                                                    and $interval['date']->format('Y-m-d') < (new DateTime($hotel_booking->end_date))->format('Y-m-d'))
                                                        @php $hasBooking = true;  $period = 'full';@endphp
                                                        @break
                                                    @elseif($interval['date']->format('Y-m-d') == (new DateTime($hotel_booking->start_date))->format('Y-m-d'))
                                                        @php $hasBooking = true;  $period = 'start-d';@endphp
                                                        @break
                                                    @elseif($interval['date']->format('Y-m-d') == (new DateTime($hotel_booking->end_date))->format('Y-m-d'))
                                                        @php $hasBooking = true;  $period = 'end-d';@endphp
                                                        @break
                                                    @endif
                                                @endforeach
                                                @if($hasBooking)
                                                    <div
                                                        id="cel-{{$kh}}-1-{{$kr}}-{{$interval['date']->getTimestamp()}}"
                                                        class="booking_summary timeline-cel timeline-default {{$period}}">
                                                        <a data-html="true" data-container="body"
                                                           class="tips ajax-popup-link {{$hotel_booking->booking->situation->label}}" href="#"
                                                           onclick="return false" data-toggle="modal"
                                                           data-value="{{$hotel_booking->booking_id}}"
                                                           title=""
                                                           data-params="id={{$rooms_option['room']->id}}"
                                                           data-tippy-content="<b>{{$hotel_booking->booking->first_name . ' ' . $hotel_booking->booking->last_name}}</b>
                                                               <br><b> Status : {{$hotel_booking->booking->situation ? $hotel_booking->booking->situation->name : ''}} </b>
                                                               <br>#{{ $hotel_booking->booking_id }}<br>{{date_format(new DateTime($hotel_booking->start_date), 'd/m/y')}} → {{date_format(new DateTime($hotel_booking->end_date),'d/m/y')}}
                                                               <br>Total: R{{format_money($hotel_booking->price)}}"></a>
                                                    </div>
                                                @else
                                                    <div
                                                        id="cel-{{$kh}}-1-{{$kr}}-{{$interval['date']->getTimestamp()}}"
                                                        class="timeline-cel timeline-default"></div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end panel -->

        <div class="panel">
            <div class="panel-title"><strong>{{__('Legenda')}}</strong></div>
            <div class="panel-body no-padding">
                <div class="row">
                    <div class="col-md-2" id="subtitles">
                    </div>
                    <div class="col-md-10">
                        <div class="timeline-cel timeline-d">
                            <b>MON</b><br>29/10<br>
                            <div class="badge badge-checkin">2</div>
                            <div class="badge badge-checkout">1</div>
                            <div>50%</div>
                        </div>
                        <div class="pull-left">
                            <div class="legend-label mt10 mb5">
                                <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false"
                                     data-prefix="fas" data-icon="caret-left" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                          d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
                                </svg>
                                <!-- <i class="fas fa-caret-left"></i> --> Day / Date
                            </div>
                            <div class="legend-label">
                                <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false"
                                     data-prefix="fas" data-icon="caret-left" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                          d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
                                </svg>
                                <!-- <i class="fas fa-caret-left"></i> --> Number of check-in
                            </div>
                            <div class="legend-label">
                                <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false"
                                     data-prefix="fas" data-icon="caret-left" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                          d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
                                </svg>
                                <!-- <i class="fas fa-caret-left"></i> --> Number of check-out
                            </div>
                            <div class="legend-label">
                                <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false"
                                     data-prefix="fas" data-icon="caret-left" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                          d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
                                </svg>
                                <!-- <i class="fas fa-caret-left"></i> --> Occupancy rate
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="timeline-cel timeline-price">
                            <div>$ 80</div>
                            <span class="text-muted">1</span>
                        </div>
                        <div class="pull-left">
                            <div class="legend-label">
                                <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false"
                                     data-prefix="fas" data-icon="caret-left" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                          d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
                                </svg>
                                <!-- <i class="fas fa-caret-left"></i> --> Price per night
                            </div>
                            <div class="legend-label">
                                <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false"
                                     data-prefix="fas" data-icon="caret-left" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                          d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
                                </svg>
                                <!-- <i class="fas fa-caret-left"></i> --> Number of free rooms
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end panel -->
    </div><!-- container-fluid -->

    <!-- Modals -->
    <!-- new_reservation -->
    <div id="new_reservation" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("Nova Reserva")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            Abrir modal para nova reserva...
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Fechar')}}</button>
                    <button type="button" class="btn btn-primary" @click="saveForm">{{__('Salvar alterações')}}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- edit_reservation -->
    <div id="modal_edit_reserva" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("Edit Reservation : #92")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            Abrir modal para nova reserva...
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Fechar')}}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- check_in_check_out -->
    <div id="check_in_check_out" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{__("Check-in / Check-out")}}<br><small><b>{{__("2020-11-28")}}</b></small>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="#" onclick="js:window.print(); return false;">
                                <span class="icon text-center text-primary pull-right"><i
                                        class="fa fa-print"></i></span>
                            </a>
                            <h3 class="text-center">Check-in</h3>
                            <div class="table-responsive">
                                <table class="table table-stiped">
                                    <tbody>
                                    <tr>
                                        <th>Rooms</th>
                                        <th>Customer</th>
                                        <th>Persons</th>
                                        <th>Total</th>
                                        <th>Balance</th>
                                        <th>Services</th>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Hotel Venezia - Standard double room |
                                            2 persons (2 adults )<br>Hotel Venezia - Standard double room |
                                            1 person (1 adult )<br>
                                        </td>
                                        <td class="text-left">ddkdj kekke</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">$ 8,844.30</td>
                                        <td class="text-center">$ 6,191.01</td>
                                        <td class="text-center">Heating (x93)<br>Tourist tax (x93)<br>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h3 class="text-center">Check-out</h3>
                            <div class="table-responsive">
                                <table class="table table-stiped">
                                    <tbody>
                                    <tr>
                                        <th>Rooms</th>
                                        <th>Customer</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Fechar')}}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- booking_summary -->
    <div class="modal fade" id="booking_summary" role="dialog" data-backdrop="static" style="display: none;" aria-hidden="true">
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
                                    <table  id="information-booking-modal" class="table table-bordered">
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
                            <button type="button" class="btn btn-lg btn-primary" id="printDetalhesReserva">
                                <i class="fa fa-print"></i> Print Detalhes
                            </button>
                            <a data-fancybox="" data-type="iframe" href="{{ route('checkAvailability.print.detalhesreserva') }}" class="btn btn-primary  btn-lg">
                                <i class="fa fa-print"></i> Reserva
                            </a>
                            <a data-fancybox="" data-type="iframe" href="{{ route('checkAvailability.print.ficha')}}" class="btn btn-primary  btn-lg">
                                <i class="fa fa-print"></i> FRN
                            </a>
                            <!--- Só aparecer os botoes para impressao quando for APENAS CHACARA
                            ===============================================================================--->
                            <a data-fancybox="" data-type="iframe" href="{{ route('checkAvailability.print.regras') }}" class="btn btn-success btn-lg">
                                <i class="fa fa-print"></i> Regras
                            </a>

                            <a data-fancybox="" data-type="iframe" href="{{ route('checkAvailability.print.contrato') }}" class="btn btn-primary  btn-lg">
                                <i class="fa fa-print"></i> Contrato
                            </a>

                            <a data-fancybox="" data-type="iframe" href="{{ route('checkAvailability.print.regulamento') }}" class="btn btn-info  btn-lg">
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
                    <script src="printthis.js"></script>
                    <script src="comummodal.js"></script>

                    <script>
                        $('#printDetalhesReserva').click(function(){
                            $("#printThis").printThis({
                                debug: false,
                                importCSS: true,
                                importStyle: true,
                                printContainer: true,
                                loadCSS: "../css/style.css",
                                pageTitle: "Recanto Hoteis S.A",
                                removeInline: false,
                                printDelay: 10,
                                header: null,
                                formValues: true
                            });
                        });

                        $("[data-fancybox]").fancybox({
                            iframe : {
                                css : {
                                    width : '100%'
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>


    <div id="context-menu" style="display:none;"></div>
@endsection

@section('script.head')
    <!-- <link rel="stylesheet" href="{{asset('libs/jquery-ui/jquery-ui.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('libs/check_availability/css/shortcodes.css')}}"> -->
    <link rel="stylesheet" href="{{asset('libs/check_availability/css/layout.css')}}">
    <link rel="stylesheet" href="{{asset('libs/check_availability/css/pms.css')}}">
    <link rel="stylesheet" href="{{asset('libs/check_availability/css/circles.css')}}">
    <link rel="stylesheet" href="{{asset('libs/fullcalendar-4.2.0/core/main.css')}}">
    <link rel="stylesheet" href="{{asset('libs/fullcalendar-4.2.0/daygrid/main.css')}}">
    <link rel="stylesheet" href="{{asset('libs/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css" />
@endsection

@section('script.body')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js"></script>
    <!-- <script src="{{asset('libs/jquery-ui/jquery-ui.js')}}"></script> -->
    <script src="{{asset('libs/check_availability/js/custom.js')}}"></script>
    <!-- Tooltip -->
    <script src="{{asset('libs/tippy/popper.min.js')}}"></script>
    <script src="{{asset('libs/tippy/tippy-bundle.umd.min.js')}}"></script>
    <script src="{{asset('libs/daterange/moment.min.js')}}"></script>
    <script src="{{asset('libs/daterange/daterangepicker.min.js?_ver='.config('app.version'))}}"></script>
    <script src="{{asset('libs/fullcalendar-4.2.0/core/main.js')}}"></script>
    <script src="{{asset('libs/fullcalendar-4.2.0/interaction/main.js')}}"></script>
    <script src="{{asset('libs/fullcalendar-4.2.0/daygrid/main.js')}}"></script>
    <script src="{{asset('libs/check_availability/js/reservation.js')}}"></script>
    <script>
        let start = null;
        let end = null;

        @if (empty(Request()->checkin) or empty(Request()->checkout))
            this.start = moment();
            this.end = moment().add(1, 'month').subtract(1, 'day');
        @else
            this.start = moment(new Date("{{Request()->checkin}}"));
            this.end = moment(new Date("{{Request()->checkout}}"));
        @endif

        function getFloors() {
            let data = {
                building_id: $('#building').val(),
            };

            let floor_id = {{!empty(Request()->floor_id) ? Request()->floor_id : "null"}};
            let url = "/admin/module/hotel/building/findFloorByBuildingID";
            let select = $('#floor');
            select.empty();

            if (data.building_id != '') {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: data,
                    success: function (data) {
                        select.append(
                            new Option("--Selecione os Andares--", null, null, false));
                        $.each(data.results, function (index, item) {
                            if (item.id == floor_id) {
                                select.append(
                                    new Option(item.name, item.id, null, true));
                            } else {
                                select.append(
                                    new Option(item.name, item.id, null, false));
                            }
                        });
                        $("#floor").show();
                    }
                });
            } else {
                $("#floor").hide();
            }
        }

        function setDateValue(start, end) {
            $("#reportrange span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
            $("#startDate").val(start)
            $("#endDate").val(end)
        }

        function getLegends(){
            let url = "/admin/module/booking/getAllSituationBooking/";

            $.ajax({
                url: url,
                type: 'GET',
                data: [],
                success: function (data) {
                    html = ``;
                    for (let i = 0; i < data.situationList.length; i++) {
                        let item = data.situationList[i];
                        html += `<div class="timeline-legend ${item.label}"></div>
                                 <div class="legend-label mb5">${item.name}</div>`;
                    }

                    $("#subtitles").html(html);
                }
            });
        }

        $("#reportrange").daterangepicker({
            startDate: this.start,
            endDate: this.end,
            showCustomRangeLabel: true,
            alwaysShowCalendars: true,
            opens: "left",
            ranges: {
                "Hoje": [moment(), moment()],
                "Ontem": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Últimos 7 dias": [moment().subtract(6, "days"), moment()],
                "Últimos 30 dias": [moment().subtract(29, "days"), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
                "This Year": [moment().startOf("year"), moment().endOf("year")],
                "This Week": [moment().startOf("week"), end],
            },
        }, function (start, end) {
            setDateValue(start, end);
        });

        $("#building").on('change', () => {
            getFloors();
        })

        setDateValue(this.start, this.end)
        getFloors();
        getLegends();
    </script>
@endsection
