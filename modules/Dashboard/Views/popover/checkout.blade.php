<html data-lt-installed="true">
<head>
    <style>
        th {
            font-size: 14px;
            color: #D50000
        }

        tr {
            font-size: 13px
        }

        .popover{
            max-width : none !important
        }

        .welcome-title{
            margin-left : 10px
        }
    </style>
</head>
<body>
<div style="display: none;"></div>
<br>
<div class="row">
    <div class="panel-body">
        <div class="table-responsive">


            <div class="dashboard-page">
                <h4 class="welcome-title text-uppercase"><i class="fa fa-arrow-circle-right"></i> Propriedades Prontas
                    para Uso </h4>
            </div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="250px">Propriedade</th>
                    <th width="160px">Bloco / Andar / Quarto</th>
                    <th width="190px">Hospede</th>
                    <th width="160px">CheckIn </th>
                    <th width="160px">CheckOut </th>
                    <th width="160px">Dia Solicitado</th>
                    <th width="160px">Dias Vencer</th>
                    <th width="130px">Status</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($data['free']) > 0)
                    @foreach($data['free'] as $item)
                        <tr>
                            <td>
                                <a href="#" target="_blank">{{$item['room_name']}}</a>
                            </td>
                            <td>{{$item['room_information']}}</td>
                            <td>{{$item['room_guest']}}</td>
                            <td>{{$item['room_checkin']}}</td>
                            <td>{{$item['room_checkout']}}</td>
                            <td>{{$item['room_created']}}</td>
                            <td>{{$item['room_expire']}}</td>
                            <td>
                                <span class="badge badge-{{$item['room_status_label']}}">{{$item['room_status']}}</span>
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
    </div>
</div>
</body>
</html>
