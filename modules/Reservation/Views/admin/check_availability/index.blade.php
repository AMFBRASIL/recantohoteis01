@extends('admin.layouts.app')

@section ('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Verificar disponibilidades")}}</h1>
        </div>

        <div class="panel">
            <div class="panel-body">
                <div class="filter-div d-flex justify-content-between ">
                    <form class="form-inline">
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="input-checkout"><i class="ion-ios-calendar"></i>&nbsp;{{__("Check-in:")}}</span>
                            </div>
                            <input type="date" name="check_in" class="form-control" value="">
                        </div>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="input-checkout"><i class="ion-ios-calendar"></i>&nbsp;{{__("Check-out:")}}</span>
                            </div>
                            <input type="date" name="check_out" class="form-control" value="">
                        </div>
                        <div class="input-group mb-2 mr-sm-2">
                            <button type="button" class="btn btn-info">{{__("Pesquisar")}}</button>
                        </div>
                        <div class="input-group mb-2 mr-sm-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#new_reservation">{{__("Nova Reserva")}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

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
                            <div class="timeline-row" style="width: 1736px;">
                                @foreach($data['interval'] as $interval)
                                    @if($interval['date'] == $data['now'])
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
                                    <div class="timeline-row" style="width: 1736px;">
                                        @foreach($data['interval'] as $interval)
                                            @if($interval['date'] == $data['now'])
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
                                        <div class="timeline-row" style="width: 1736px;">
                                            @foreach($data['interval'] as $interval)
                                                @forelse($rooms_option['bookings'] as $booking)
                                                    @if($interval['date'] >= $booking->start_date && $interval['date'] <= $booking->end_date)
                                                        <div id="cel-{{$kh}}-1-{{$kr}}-{{$interval['date']->getTimestamp()}}"
                                                             class="timeline-cel timeline-default booked start-d confirmed">
                                                            <a data-html="true" data-container="body"
                                                               class="tips ajax-popup-link confirmed" href="#"
                                                               onclick="return false" data-toggle="modal"
                                                               data-target="#booking_summary" title=""
                                                               data-params="id={{$rooms_option['room']->id}}"
                                                               data-tippy-content="<b>ddkdj kekke</b><br>#{{ $booking->id }}<br>{{$booking->start_date}} → {{ $booking->end_date }}<br>Total: ${{$booking->price}}"></a>
                                                        </div>
                                                    @else
                                                        <div id="cel-{{$kh}}-1-{{$kr}}-{{$interval['date']->getTimestamp()}}"
                                                             class="timeline-cel timeline-default"></div>
                                                    @endif
                                                @empty
                                                    <div id="cel-{{$kh}}-1-{{$kr}}-{{$interval['date']->getTimestamp()}}"
                                                         class="timeline-cel timeline-default"></div>
                                                @endforelse
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
                    <div class="col-md-2">
                        <div class="timeline-legend in-house"></div>
                        <div class="legend-label mb5">In house</div>
                        <div class="timeline-legend confirmed"></div>
                        <div class="legend-label mb5">Confirmed</div>
                        <div class="timeline-legend pending"></div>
                        <div class="legend-label mb5">Pending</div>
                        <div class="timeline-legend booked-ext"></div>
                        <div class="legend-label mb5">External_booking</div>
                        <div class="timeline-legend checked-out"></div>
                        <div class="legend-label mb5">Checked out</div>
                        <div class="timeline-legend closed"></div>
                        <div class="legend-label mb5">Unavailable</div>
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
                            <hr class="mt0 mb0">
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
    <div id="booking_summary" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("Booking summary #2242")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <ul class="pull-right">
                                <li>
                                    <a href="#" onclick="js:window.print(); return false;">
                                        <span class="icon text-center text-primary"><i class="fa fa-print"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onclick="return false;">
                                        <span class="icon text-center text-primary"><i class="fa fa-edit"></i></span>
                                    </a>
                                </li>
                            </ul>
                            <table class="table table-responsive table-bordered">
                                <tbody>
                                <tr class="text-center">
                                    <th width="500px">Booking details</th>
                                    <th width="50%">Billing address</th>
                                </tr>
                                <tr>
                                    <td>
                                        Check-in <strong>2020-10-27</strong><br>
                                        Check-out <strong>2020-11-25</strong><br>
                                        <strong>29</strong> Nights<br>
                                        <strong>1</strong> Persons -
                                        Adults: <strong>1</strong> /
                                        Children: <strong></strong>
                                    </td>
                                    <td>
                                        z asdasd<br>Company : RollOfis Bilişim A.Ş<br>Göztepe Mh. 2366 Sk. No:18/2<br>
                                        asd Bağcılar<br>
                                        Phone : 05446869933<br>E-mail : info@Rollofis.com
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-responsive table-bordered">
                                <tbody>
                                <tr class="text-center">
                                    <th width="40%">Room</th>
                                    <th width="40%">Persons</th>
                                    <th width="200px">Total</th>
                                </tr>
                                <tr>
                                    <td>St James Hotel - Deluxe room</td>
                                    <td>
                                        1 person (1 adult )
                                    </td>
                                    <td class="text-right">$ 4,988</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-responsive table-bordered">
                                <tbody>
                                <tr class="text-center">
                                    <th width="40%">Services</th>
                                    <th width="40%">Quantity</th>
                                    <th width="200px">Total</th>
                                </tr>
                                <tr>
                                    <td>Heating</td>
                                    <td>29</td>
                                    <td class="text-right">$ 232</td>
                                </tr>
                                <tr>
                                    <td>Tourist tax</td>
                                    <td>29</td>
                                    <td class="text-right">$ 31.90</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-responsive table-bordered">
                                <tbody>
                                <tr class="text-center">
                                    <th class="text-right" width="80%">VAT</th>
                                    <td class="text-right" width="200px">$ 474.55</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Goods and Services Tax (5%)</th>
                                    <td class="text-right">$ 226.73</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Total (incl. tax)</th>
                                    <td class="text-right"><b>$ 5,478.63</b></td>
                                </tr>
                                </tbody>
                            </table>
                            <p><strong>Payment</strong></p>
                            <p></p>
                            <p>Payment method : arrival<br>Status: Pending<br><b>Balance : $ 5,478.63</b><br></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Fechar')}}</button>
                </div>
            </div>
        </div>
    </div>


    <div id="modal_nova_reserva" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("Novo Pagamento : #92")}}</h5>
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

    <div id="modal_edit_reserva" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("Novo Pagamento : #92")}}</h5>
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

    <div id="context-menu" style="display:none;"></div>
@endsection

@section('script.head')
    <!-- <link rel="stylesheet" href="{{asset('libs/jquery-ui/jquery-ui.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('libs/check_availability/css/shortcodes.css')}}"> -->
    <link rel="stylesheet" href="{{asset('libs/check_availability/css/layout.css')}}">
    <link rel="stylesheet" href="{{asset('libs/check_availability/css/pms.css')}}">
@endsection

@section('script.body')
    <!-- <script src="{{asset('libs/jquery-ui/jquery-ui.js')}}"></script> -->
    <script src="{{asset('libs/check_availability/js/custom.js')}}"></script>
    <!-- Tooltip -->
    <script src="{{asset('libs/tippy/popper.min.js')}}"></script>
    <script src="{{asset('libs/tippy/tippy-bundle.umd.min.js')}}"></script>
@endsection
