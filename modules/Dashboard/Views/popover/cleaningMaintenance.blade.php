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
                <h4 class="welcome-title text-uppercase"><i class="fa fa-arrow-circle-right"></i> PROPRIEDADES EM MANUTENCAO / EM LIMPEZA </h4>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="250px">Propriedade</th>
                    <th width="160px">Bloco / Andar/ Quarto</th>
                    <th width="180px">Qtde Hospedes</th>
                    <th width="120px">Status</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($data['maintenance']) > 0)
                    @foreach($data['maintenance'] as $item)
                        <tr>
                            <td>
                                <a href="#" target="_blank">{{$item['room_name']}}</a>
                            </td>
                            <td>{{$item['room_information']}}</td>
                            <td>{{$item['room_guest']}}</td>
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

            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="250px">Propriedade</th>
                    <th width="160px">Bloco / Andar / Quarto</th>
                    <th width="160px">Responsavel</th>
                    <th width="160px">Iniciou </th>
                    <th width="160px">Finaliza </th>
                    <th width="140px">Atraso </th>
                    <th width="130px">Status</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($data['cleaning']) > 0)
                    @foreach($data['cleaning'] as $item)
                        <tr>
                            <td>
                                <a href="#" target="_blank">{{$item['room_name']}}</a>
                            </td>
                            <td>{{$item['room_information']}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
