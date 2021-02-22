@extends('admin.layouts.app')

@section ('content')
    <div class="container-fluid">
        <div class="dashboard-page">
            <h4 class="welcome-title text-uppercase">Mapa de Disponibilidade</h4>
        </div>
        <br>
        <div class="panel">
            <div class="panel-body">

                <div class="filter-div d-flex justify-content-between">

                    <div class="filter-div d-flex justify-content-between">
                        <div class="input-group mb-2 mr-sm-2">
                            <button type="button" class="btn btn-lg btn-primary NewReserva" data-toggle="tooltip"
                                    data-html="true" title="" data-original-title="<h4> Fazer Nova Reserva </h4>">Nova
                                Reserva
                            </button>
                        </div>
                    </div>
                    <form class="form-inline">
                        <a id="map-legends" href="#" data-placement="bottom" data-toggle="tooltip" data-html="true"
                           data-original-title="<h4> Legendas </h4>"><i class="fa fa-lightbulb-o fa-2x"></i> </a>
                        &nbsp;&nbsp;
                        <select id="situation-select" name="situactin_id" class="form-control"
                                style="background: #fff; cursor: pointer; padding: 10px 20px; border: 2px solid #ccc;">
                            <option value="">-- SELECIONAR SITUACAO --</option>
                            @foreach ($situationList as $option)
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endforeach
                        </select>
                        &nbsp;&nbsp;
                        <select id="building-select" name="building_id" class="form-control"
                                style="background: #fff; cursor: pointer; padding: 10px 20px; border: 2px solid #ccc;">
                            <option value="">-- SELECIONAR BLOCO --</option>
                            @foreach ($buildingList as $option)
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endforeach
                        </select>
                        &nbsp;&nbsp;
                        <select id="floor-select" name="floor_id" class="form-control"
                                style="background: #fff; cursor: pointer; padding: 10px 20px; border: 2px solid #ccc;">
                            <option value="">-- SELECIONAR ANDAR --</option>
                        </select>
                        &nbsp;&nbsp;
                        <select id="classification-select" name="classification_id" class="form-control"
                                style="background: #fff; cursor: pointer; padding: 10px 20px; border: 2px solid #ccc;">
                            <option value="">-- TIPO APTO --</option>
                            @foreach ($classificationList as $option)
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endforeach
                        </select>
                        &nbsp;&nbsp;
                        <select id="characteristc-select" name="characteristic_id" class="form-control"
                                style="background: #fff; cursor: pointer; padding: 10px 20px; border: 2px solid #ccc;">
                            <option value="">-- CARACTERISTICA APTO --</option>
                            @foreach ($characteristicList as $option)
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endforeach
                        </select> &nbsp;
                        &nbsp;
                        <button id="search" type="button" class="btn btn-lg btn-info">Pesquisar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-right">
            <p><i id="total-items"></i></p>
        </div>

        <div id="card">

        </div>

        <style>
            .link-container:hover {
                border: 1px solid #000000;
            }

            .popover {
                margin-right: 0;
                max-width: 100%;
                position: absolute;
            }
        </style>
    </div>
@endsection


@section('script.body')
    <script>
        $(function () {
            $('body').tooltip({
                selector: '[data-toggle=tooltip]'
            });

            $('#map-legends').popover({content: legends()})
            $('#map-legends').on('click', function () {
                $('.popover').css({
                    "max-width": "100%",
                });
            })

            $('#card').popover({
                selector: '[data-toggle=popover]',
                trigger: 'hover',
                boundary: 'window',
                html: true,
                container: 'body',
                placement: 'auto'
            });

            $("#building-select").on('change', () => {
                getFloors();
            })

            $("#search").click(() => {
                findByFilter();
            })

            findByFilter();
        })

        function getFloors() {
            let data = {
                building_id: $('#building-select').val(),
            };

            let url = "/admin/module/reservation/mapAvailable/findFloorByBuildingID";

            $.ajax({
                url: url,
                type: 'GET',
                data: data,
                success: function (data) {
                    console.log(data);
                    let select = $('#floor-select');
                    select.empty();
                    select.append(
                        new Option("-- SELECIONAR ANDAR --", null, null, true));
                    $.each(data.results, function (index, item) {
                        select.append(
                            new Option(item.name, item.id, null, false));
                    });
                }
            });
        }

        function findByFilter() {
            let data = {
                situation_id: $('#situation-select').val(),
                building_id: $('#building-select').val(),
                floor_id: $('#floor-select').val(),
                classification_id: $('#classification-select').val(),
                characteristic_id: $('#characteristc-select').val(),
            };

            let url = "/admin/module/reservation/mapAvailable/findByFilter";

            $.ajax({
                url: url,
                type: 'GET',
                data: data,
                success: function (data) {
                    console.log(data);

                    $("#total-items").html(`Found ${data.totalItems} items`);

                    let html = '';
                    $.each(data.results, function (index, item) {
                        if (item.hotel_rooms.length > 0) {
                            html += `
                            <h4 id="building-${index}" class="welcome-title text-uppercase">${item.building_name}</h4>
                            <div class="row"> `;

                            if (item.hotel_rooms.length > 0) {
                                $.each(item.hotel_rooms, function (index2, item2) {
                                    html += `
                                <div class="col-sm-2 col-md-2 ">
                                    <div class="tooltip-card-room dashboard-report-card card bg-${item2.situation != null ? item2.situation.label : ' info '} link-container" data-html="true" data-trigger="hover"
                                         data-toggle="popover" data-content="${roomsInformation(item2)}"
                                         data-original-title="">


                                        <div class="card-content" dataid="${item2.id}" idstatus="${item2.situation != null ? item2.situation.id : ''}" dataquarto="${item2.room != null ? item2.room.number : ''}" style="cursor:pointer">
                                            <span class="card-title">${item2.situation != null ? item2.situation.name : ''}</span>
                                            <span class="card-amount">${item2.room != null ? item2.room.number : ''}</span>
                                            <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i
                                                    class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                                        </div>
                                    </div>
                                </div>`;
                                });
                            }

                            html += `
                            </div>
                            <hr>
                        `;
                        }
                    });
                    $("#card").html(html);
                }
            });
        }

        function roomsInformation(item) {
            let text = '';
            let situation = item.situation ? item.situation.name : '';

            switch (situation.toUpperCase()){
                case "LIBERADO":
                    text = `
                        <h4>O quarto ${item.room.number} está liberado para uso. </h4>
                        <br>
                        <b>Capacidade Hospedes:</b> 04 <br>
                        <b>Adultos: </b> ${item.adults} <br>
                        <b>Crianças: </b> ${item.children} <br>
                        <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                        <b>Valor Diário Comum :</b> R$ ${item.price} ( Verificar Datas para Diária )<br>
                        <b>Andar :</b> ${item.room.building_floor.name} <br>
                        <b>Tipo :</b> ${item.classification.name} <br>
                        <b>Caracteristica :</b>  ${item.characteristic.name}  <br>
                        <hr>
                        <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'>
                    `;
                    break;
                case "BLOQUEADO":
                    text = `
                        <h4> O Quarto ${item.room.number} está Bloqueado. </h4><hr>
                        <b> Motivos : </b> Em manutenção predial. <br>
                        <b>Andar :</b> ${item.room.building_floor.name} <br>
                        <b>Tipo :</b> ${item.classification.name} <br>
                        <b>Caracteristica :</b>  ${item.characteristic.name}  <br>
                        <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'>
                    `
                    break
                case "MANUTENÇÃO":
                    text = `
                        <h4> O Quarto ${item.room.number} está em Manutenção. </h4><hr>
                        <b>Detalhes da Manutenção: </b> Está trocando o ar condicionado por um novo , <br> trocando as torneceiras quebradas. <br>
                        <b> Responsavel Manutencao: </b> ANDERSON MAUTONE FERREIRA <br>
                        <b>Andar :</b> ${item.room.building_floor.name} <br>
                        <b>Tipo :</b> ${item.classification.name} <br>
                        <b>Caracteristica :</b>  ${item.characteristic.name}  <br>
                        <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'>
                    `;
                    break
                case "LIMPEZA/USO":
                    text = `
                        <h4> O Quarto ${item.room.number}  está em Limpeza porem Liberado. </h4><hr>
                        <b>Detalhes da Limpeza: </b> Limpando quarto completo. <br>
                        <b> Responsavel Limpeza: </b> ANDERSON MAUTONE FERREIRA <br>
                        <b>Andar :</b> ${item.room.building_floor.name} <br>
                        <b>Tipo :</b> ${item.classification.name} <br>
                        <b>Caracteristica :</b> ${item.characteristic.name} <br>
                        <hr>
                        <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'>
                    `
                    break
                case "OCUPADO":
                    text = `
                        <h4> O Quarto ${item.room.number} está em USO. </h4><hr>
                        <b>Hospede em Uso :  </b> ANDERSON MAUTONE FERREIRA<br>
                        <b>Qtde Hospedes :</b> 03 <br>
                        <b>Checkin :</b> 11/12/2020 as 12:00 AM <br>
                        <b>Checkout :</b> 14/12/2020 as 16:00 PM <br>
                        <b>Andar :</b> ${item.room.building_floor.name} <br>
                        <b>Tipo :</b> ${item.classification.name} <br>
                        <b>Caracteristica :</b> ${item.characteristic.name} <br>
                        <hr>
                        <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'>
                    `
                    break;
            }

            return text;
        }

        function legends() {
            let html = `
                <br>
                <div class="row">
                    <div class="col-sm-4 col-md-4 ">
                        <div class="dashboard-report-card card bg-success link-container">
                            <div class="card-content">
                                <span class="card-title">PRONTO PARA USO</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4">
                        <div class="dashboard-report-card card bg-warning link-container">
                            <div class="card-content">
                                <span class="card-title">EM USO</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 ">
                        <div class="dashboard-report-card card bg-danger link-container">
                            <div class="card-content">
                                <span class="card-title">EM MANUTENCAO</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 ">
                        <div class="dashboard-report-card card bg-primary link-container">
                            <div class="card-content">
                                <span class="card-title">LIBERADO</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 ">
                        <div class="dashboard-report-card card bg-info link-container">
                            <div class="card-content">
                                <span class="card-title">BLOQUEIO</span>
                            </div>
                        </div>
                    </div>
                </div>`;

            return html
        }
    </script>
@endsection
