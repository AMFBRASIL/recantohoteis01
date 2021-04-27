@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="dashboard-page">
            <h4 class="welcome-title text-uppercase">{{__("DASHBOARD RECANTO HOTEIS S.A.")}}</h4>
            <br>
            <button type="button" class="btn btn-lg btn-success NewReserva"><i class="fa fa-plus"></i> Nova Reserva
            </button>
            <button type="button" class="btn btn-lg btn-primary mapaQuartosDisponivel "><i class="fa fa-bed"></i>
                Disponibilidade dos Quartos
            </button>
        </div>
        <hr>
        <div class="card full-height">

            <div class="card-body">

                <!--- Campo para DATA das informacoes --->
                <div class="filter-div d-flex justify-content-between">
                    <div class="col-left">
                        <div class="card-title">Detalhe das Situações - Selecione uma Data <i
                                class="fa fa-arrow-circle-right"></i></div>
                    </div>
                    <div class="col-left">
                        <div id="reportRangeSituation"
                             style="background: #fff; cursor: pointer; padding: 5px 10px; border: 2px solid #ccc;">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span>April 18, 2021 - April 19, 2021</span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                </div>

                <!---<div class="card-category">Daily information about statistics in system</div>--->
                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4 detail-situations"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            @if(!empty($top_cards))
                @foreach($top_cards as $card)
                    <div class="col-sm-{{$card['size']}} col-md-{{$card['size_md']}}">
                        <div class="dashboard-report-card card {{$card['class']}}">
                            <div class="card-content">
                                <span class="card-title">{{$card['title']}}</span>
                                <span class="card-amount">{{$card['amount']}}</span>
                                <span class="card-desc">{{$card['desc']}}</span>
                            </div>
                            <div class="card-media">
                                <i class="{{$card['icon']}}"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 mb-3">
                <div class="panel">
                    <div class="panel-title d-flex justify-content-between align-items-center">
                        <strong>{{__('Resumo Hoteis Resort')}}</strong>
                        <div id="reportrange"
                             style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <canvas id="earning_chart"></canvas>
                        <script>
                            var earning_chart_data = {!! json_encode($earning_chart_data) !!};
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 ">
                <div class="panel">
                    <div class="panel-title d-flex justify-content-between">
                        <strong>{{__('Reservas Recentes - Ultimas 8 reservas')}}</strong>
                        <a href="{{url('admin/module/reservation/booking')}}" class="btn-link">{{__("Mais")}}
                            <i class="fa fa-plus"></i></a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="40px">#</th>
                                    <th width="250px">Propriedade</th>
                                    <th width="80px">Total</th>
                                    <th width="80px">Pago</th>
                                    <th width="80px">Status</th>
                                    <th width="130px">Data</th>
                                    <th width="30px"> Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($recent_bookings) > 0)
                                    @foreach($recent_bookings as $booking)
                                        <tr>
                                            <td>#{{$booking->id}}</td>
                                            <td>
                                                @if(get_bookable_service_by_id($booking->object_model) and $service = $booking->service)
                                                    <a href="{{$service->getDetailUrl()}}"
                                                       target="_blank">{{$service->title}}</a>
                                                @else
                                                    {{__("[Deleted]")}}
                                                @endif
                                            </td>
                                            <td>R${{ number_format($booking->total, 2, ',', '.')}}</td>
                                            <td>R${{ number_format($booking->paid, 2, ',', '.')}}</td>
                                            <td>
                                                @if($booking->situation)
                                                    <span
                                                        class="badge badge-{{$booking->situation->label}}">{{strtoupper($booking->situation->name)}}</span>
                                                @else
                                                    <span
                                                        class="badge badge-{{$booking->status_class}}">{{strtoupper($booking->status_name)}}</span
                                                @endif

                                            </td>
                                            <td>{{display_datetime($booking->created_at)}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Ação
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenuButton" style="">
                                                        <a class="dropdown-item" href="#">Acessar Conta</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">{{__("No data")}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-title d-flex justify-content-between">
                        <strong>Pedidos Restaurante</strong>
                        <a href="{{url('admin/module/pos/sale')}}" class="btn-link"> Mais <i class="fa fa-plus"></i></a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="20px">#</th>
                                    <th width="150px">Produto/Serviço</th>
                                    <th width="180px">Pedido por</th>
                                    <th width="100px">UH/Blc</th>
                                    <th width="80px">Status</th>
                                    <th width="140px">Solitiado em</th>
                                    <th width="140px">Iniciado em</th>
                                    <th width="60px"> Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($restaurant_orders) > 0)
                                    @foreach($restaurant_orders as $order)
                                        <tr>
                                            <td>#{{$order['sale_id']}}</td>
                                            <td>
                                                <a href="#" target="_blank">{{$order['title']}}</a>
                                            </td>
                                            <td>{{$order['requester']}}</td>
                                            <td>{{$order['uh_bloc']}}</td>
                                            <td>
                                                <span
                                                    class="badge badge-{{$order['situation_label']}}">{{$order['situation_name']}}</span>
                                            </td>
                                            <td>{{$order['created_at']}}</td>
                                            <td>{{$order['initial_at']}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Ação
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item cancelamentoPedido" href="#">Cancelar
                                                            Pedido</a>
                                                        <a class="dropdown-item editPedido" href="#">Editar Pedido</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">{{__("No data")}}</td>
                                    </tr
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
        </div>
    </div>
@endsection
@section('script.head')
    <link rel="stylesheet" href="{{asset('libs/circles/css/circles.css')}}">
    <link rel="stylesheet" href="{{asset('libs/fullcalendar-4.2.0/core/main.css')}}">
    <link rel="stylesheet" href="{{asset('libs/fullcalendar-4.2.0/daygrid/main.css')}}">
    <link rel="stylesheet" href="{{asset('libs/daterange/daterangepicker.css')}}">
@endsection
@section('script.body')
    <script src="{{asset('libs/tippy/tippy-bundle.umd.min.js')}}"></script>
    <script src="{{url('libs/chart_js/Chart.min.js')}}"></script>
    <script src="{{url('libs/daterange/moment.min.js')}}"></script>
    <script src="{{url('libs/daterange/daterangepicker.min.js?_ver='.config('app.version'))}}"></script>
    <script>
        let ctx = document.getElementById('earning_chart').getContext('2d');
        window.myMixedChart = new Chart(ctx, {
            type: 'bar',
            data: earning_chart_data,
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '{{__("Timeline")}}'
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '{{__("Currency: :currency_main",['currency_main'=>setting_item('currency_main')])}}'
                        },
                        ticks: {
                            beginAtZero: true,
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            let label = data.datasets[tooltipItem.datasetIndex].label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += tooltipItem.yLabel + " ({{setting_item('currency_main')}})";
                            return label;
                        }
                    }
                }
            }
        });

        var start = moment().startOf('week');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            "alwaysShowCalendars": true,
            "opens": "left",
            "showDropdowns": true,
            ranges: {
                '{{__("Today")}}': [moment(), moment()],
                '{{__("Yesterday")}}': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '{{__("Last 7 Days")}}': [moment().subtract(6, 'days'), moment()],
                '{{__("Last 30 Days")}}': [moment().subtract(29, 'days'), moment()],
                '{{__("This Month")}}': [moment().startOf('month'), moment().endOf('month')],
                '{{__("Last Month")}}': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                '{{__("This Year")}}': [moment().startOf('year'), moment().endOf('year')],
                '{{__('This Week')}}': [moment().startOf('week'), end]
            }
        }, cb).on('apply.daterangepicker', function (ev, picker) {
            // Reload Earning JS
            $.ajax({
                url: '{{url('admin/module/dashboard/reloadChart')}}',
                data: {
                    from: picker.startDate.format('YYYY-MM-DD'),
                    to: picker.endDate.format('YYYY-MM-DD'),
                },
                dataType: 'json',
                type: 'post',
                success: function (res) {
                    if (res.status) {
                        window.myMixedChart.data = res.data;
                        window.myMixedChart.update();
                    }
                }
            })
        });
        cb(start, end);
    </script>
    <script>
        let start_situation = null;
        let end_situation = null;
        let free = null;
        let busy = null;
        let cleaning = null;
        let maintenance = null;
        let dayUser = null;
        let checkin = null;
        let checkout = null;

        $(function ($) {
            $(document).on('mouseenter mouseleave','.situation_free', function(){
                $('.situation_free').removeAttr('data-content')
                $('.situation_free').removeAttr('data-loaded')

                console.log(("render free"))
                $('.situation_free').popover({
                    html: true,
                    trigger: 'click',
                    content: function() {
                        return popoverRemoteContentsFree(this);
                    }
                });
            });

            $(document).on('mouseenter mouseleave','.situation_busy', function(){
                $('.situation_busy').removeAttr('data-content')
                $('.situation_busy').removeAttr('data-loaded')

                console.log(("render busy"))
                $('.situation_busy').popover({
                    html: true,
                    trigger: 'click',
                    content: function() {
                        return popoverRemoteContentsBusy(this);
                    }
                });
            });

            $(document).on('mouseenter mouseleave','.situation_maintenance_cleaning', function(){
                $('.situation_maintenance_cleaning').removeAttr('data-content')
                $('.situation_maintenance_cleaning').removeAttr('data-loaded')

                console.log(("render maintenance_cleaning"))
                $('.situation_maintenance_cleaning').popover({
                    html: true,
                    trigger: 'click',
                    content: function() {
                        return popoverRemoteContentsMaintenanceCleaning(this);
                    }
                });
            });

            $(document).on('mouseenter mouseleave','.situation_day_user', function(){
                $('.situation_day_user').removeAttr('data-content')
                $('.situation_day_user').removeAttr('data-loaded')

                console.log(("render day_user"))
                $('.situation_day_user').popover({
                    html: true,
                    trigger: 'click',
                    content: function() {
                        return popoverRemoteContentsDayUser(this);
                    }
                });
            });

            $(document).on('mouseenter mouseleave','.situation_checkin', function(){
                $('.situation_checkin').removeAttr('data-content')
                $('.situation_checkin').removeAttr('data-loaded')

                console.log(("render checkin"))
                $('.situation_checkin').popover({
                    html: true,
                    trigger: 'click',
                    content: function() {
                        return popoverRemoteContentsCheckin(this);
                    }
                });
            });

            $(document).on('mouseenter mouseleave','.situation_checkout', function(){
                $('.situation_checkout').removeAttr('data-content')
                $('.situation_checkout').removeAttr('data-loaded')

                console.log(("render checkout"))
                $('.situation_checkout').popover({
                    html: true,
                    trigger: 'click',
                    content: function() {
                        return popoverRemoteContentsCheckout(this);
                    }
                });
            });

            $(".mapaQuartosDisponivel").click(function () {
                window.location = "/admin/module/reservation/mapAvailable";
            });

            this.start_situation = moment();
            this.end_situation = moment().add(1, 'month').subtract(1, 'day');

            $("#reportRangeSituation").daterangepicker({
                startDate: this.start_situation,
                endDate: this.end_situation,
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

            setDateValue(this.start_situation, this.end_situation)
        });

        function setDateValue(start, end) {
            $("#reportRangeSituation span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
            setSituation(start, end)
        }

        function setSituation(start, end) {
            let data = {
                start: start.format("Y-M-D"),
                end: end.format("Y-M-D"),
            };

            let url = "admin/module/dashboard/situations";

            $.ajax({
                url: url,
                type: 'GET',
                data: data,
                success: function (data) {
                    implementsSituantion(data)
                }
            });
        }

        function implementsSituantion(data) {
            let html = '';
            $.each(data, function (index, item) {

                if (item['id'] == 'situation_free'){
                    free = item['release'];
                }

                if (item['id'] == 'situation_busy'){
                    busy = item['busy'];
                }

                if (item['id'] == 'situation_maintenance_cleaning'){
                    cleaning = item['cleaning'];
                    maintenance = item['maintenance'];
                }

                if (item['id'] == 'situation_day_user'){
                    dayUser = item['dayUser'];
                }

                if (item['id'] == 'situation_checkin'){
                    checkin = item['checkin'];
                }

                if (item['id'] == 'situation_checkout'){
                    checkout = item['checkout'];
                }

                html +=
                    `<div class="px-5 pb-5 pb-md-0 text-center">
                        <div class="c100 p${item['percentage']} ${item['label']} small">
                                    <span>
                                        <a class="${item['id']}" href="#" data-toggle="popover"
                                             data-placement="bottom" data-original-title=''>
                                            ${item['total']}
                                        </a>
                                    </span>
                            <div class="slice">
                                <div class="bar"></div>
                                <div class="fill"></div>
                            </div>
                        </div>
                        <h6 class="fw-bold mt-3 mb-0">${item['situation']['name']}</h6>
                    </div>`
            });
            $(".detail-situations").html(html);
        }

        function popoverRemoteContentsFree(element) {
            if ($(element).data('loaded') !== true) {
                let div_id = 'tmp-id-' + $.now();

                let data = {
                    free: free,
                };

                let url = "admin/module/dashboard/popoverSituationFree";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: data,
                    success: function(response) {
                        $('#' + div_id).html(response);
                        $(element).attr("data-loaded", true);
                        $(element).attr("data-content", response);
                        return $(element).popover('update');
                    }
                });

                return '<div id="' + div_id + '">Loading...</div>';

            } else {
                return $(element).data('content');
            }
        }

        function popoverRemoteContentsBusy(element) {
            if ($(element).data('loaded') !== true) {
                let div_id = 'tmp-id-' + $.now();

                let data = {
                    busy: busy,
                };

                let url = "admin/module/dashboard/popoverSituationBusy";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: data,
                    success: function(response) {
                        $('#' + div_id).html(response);
                        $(element).attr("data-loaded", true);
                        $(element).attr("data-content", response);
                        return $(element).popover('update');
                    }
                });

                return '<div id="' + div_id + '">Loading...</div>';

            } else {
                return $(element).data('content');
            }
        }

        function popoverRemoteContentsMaintenanceCleaning(element) {
            if ($(element).data('loaded') !== true) {
                let div_id = 'tmp-id-' + $.now();

                let data = {
                    maintenance: maintenance,
                    cleaning: cleaning,
                };

                let url = "admin/module/dashboard/popoverSituationCleaningMaintenance";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: data,
                    success: function(response) {
                        $('#' + div_id).html(response);
                        $(element).attr("data-loaded", true);
                        $(element).attr("data-content", response);
                        return $(element).popover('update');
                    }
                });

                return '<div id="' + div_id + '">Loading...</div>';

            } else {
                return $(element).data('content');
            }
        }

        function popoverRemoteContentsDayUser(element) {
            if ($(element).data('loaded') !== true) {
                let div_id = 'tmp-id-' + $.now();

                let data = {
                    dayUser: dayUser,
                };

                let url = "admin/module/dashboard/popoverSituationDayUser";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: data,
                    success: function(response) {
                        $('#' + div_id).html(response);
                        $(element).attr("data-loaded", true);
                        $(element).attr("data-content", response);
                        return $(element).popover('update');
                    }
                });

                return '<div id="' + div_id + '">Loading...</div>';

            } else {
                return $(element).data('content');
            }
        }

        function popoverRemoteContentsCheckin(element) {
            if ($(element).data('loaded') !== true) {
                let div_id = 'tmp-id-' + $.now();

                let data = {
                    checkin: checkin,
                };

                let url = "admin/module/dashboard/popoverSituationCheckin";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: data,
                    success: function(response) {
                        $('#' + div_id).html(response);
                        $(element).attr("data-loaded", true);
                        $(element).attr("data-content", response);
                        return $(element).popover('update');
                    }
                });

                return '<div id="' + div_id + '">Loading...</div>';

            } else {
                return $(element).data('content');
            }
        }

        function popoverRemoteContentsCheckout(element) {
            if ($(element).data('loaded') !== true) {
                let div_id = 'tmp-id-' + $.now();

                let data = {
                    checkout: checkout,
                };

                let url = "admin/module/dashboard/popoverSituationCheckout";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: data,
                    success: function(response) {
                        $('#' + div_id).html(response);
                        $(element).attr("data-loaded", true);
                        $(element).attr("data-content", response);
                        return $(element).popover('update');
                    }
                });

                return '<div id="' + div_id + '">Loading...</div>';

            } else {
                return $(element).data('content');
            }
        }

    </script>
@endsection


