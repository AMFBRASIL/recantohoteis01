@extends('admin.layouts.app')

@section ('content')
    <div class="container-fluid">
        <div class="dashboard-page">
            <h4 class="welcome-title text-uppercase">Bem vindo ANDERSON!</h4>
        </div>
        <br>
        <div class="panel">
            <div class="panel-body">

                <div class="filter-div d-flex justify-content-between">

                    <div class="filter-div d-flex justify-content-between">
                        <div class="input-group mb-2 mr-sm-2">
                            <button type="button" class="btn btn-lg btn-primary NewReserva" data-toggle="tooltip" data-html="true" title="" data-original-title="<h4> Fazer Nova Reserva </h4>">Nova Reserva</button>
                        </div>
                    </div>
                    <form class="form-inline">
                        <a href="#" data-placement="bottom" data-toggle="tooltip" data-html="true" title="" data-popover-remote="legendas.php" data-original-title="<h4> Legendas </h4>"><i class="fa fa-lightbulb-o fa-2x"></i> </a>
                        &nbsp;&nbsp;
                        <select name="situactin_id" class="form-control" style="background: #fff; cursor: pointer; padding: 10px 20px; border: 2px solid #ccc;">
                            <option value="">-- SELECIONAR SITUACAO -- </option>
                            @foreach ($situationList as $option)
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endforeach
                        </select>
                        &nbsp;&nbsp;
                        <div class="col-right">
                            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 10px 20px; border: 2px solid #ccc;"><i class="fa fa-calendar"></i>&nbsp; <span>February 14, 2021 - February 16, 2021</span> <i class="fa fa-caret-down"></i></div>
                        </div>
                        &nbsp;
                        &nbsp;
                        <button type="button" class="btn btn-lg btn-info">Pesquisar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-right">
            <p><i>Found 17 items</i></p>
        </div>

        <style>
            .link-container:hover {
                border:1px solid #b217b4;
            }

            .dashboard-report-card.yellow {
                background-color: #ffa500;
                border-color: #ffa500;
            }

            .dashboard-report-card.vermelho {
                background-color: #ff0000;
                border-color: #ff0000;
            }

            .dashboard-report-card.cinza {
                background-color: #17a2b8;
                border-color: #17a2b8;
            }

            .dashboard-report-card.azul {
                background-color: #007bff;
                border-color: #007bff;
            }

            .modal .modal-dialog {
                width: 100%;
            }

        </style>

        <h4 class="welcome-title text-uppercase">Bloco 01</h4>
        <div class="row">
            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card success link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4>O quarto 101 está liberado para uso. </h4>
                            <br> <b>Capacidade Hospedes:</b> 04 <br> <b>Adultos: </b> 3 <br> <b>Crianças: </b> 1 <br> <b>Berço: </b> SIM <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <b>Valor Diário Comum :</b> R$ 1.900,00 ( Verificar Datas para Diária )   <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">


                    <div class="card-content" dataid="111222" idstatus="1" dataquarto="101" style="cursor:pointer">
                        <span class="card-title">LIBERADO</span>
                        <span class="card-amount">101</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card success link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4>O quarto 101 está liberado para uso. </h4>
                            <br> <b>Capacidade Hospedes:</b> 04 <br> <b>Adultos: </b> 3 <br> <b>Crianças: </b> 1 <br> <b>Berço: </b> SIM <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <b>Valor Diário Comum :</b> R$ 1.900,00 ( Verificar Datas para Diária )   <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="1" dataquarto="102" style="cursor:pointer">
                        <span class="card-title">LIBERADO</span>
                        <span class="card-amount">102</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card success link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4>O quarto 101 está liberado para uso. </h4>
                            <br> <b>Capacidade Hospedes:</b> 04 <br> <b>Adultos: </b> 3 <br> <b>Crianças: </b> 1 <br> <b>Berço: </b> SIM <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <b>Valor Diário Comum :</b> R$ 1.900,00 ( Verificar Datas para Diária )   <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="1" dataquarto="103" style="cursor:pointer">
                        <span class="card-title">LIBERADO</span>
                        <span class="card-amount">103</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card yellow link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4> O Quarto 104 está em USO. </h4><hr> <b>Hospede em Uso :  </b> ANDERSON MAUTONE FERREIRA
                            <br> <b>Qtde Hospedes :</b> 03 <br> <b>Checkin :</b> 11/12/2020 as 12:00 AM <br> <b>Checkout :</b> 14/12/2020 as 16:00 PM <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="2" dataquarto="104" style="cursor:pointer">
                        <span class="card-title">EM USO</span>
                        <span class="card-amount">104</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card yellow link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4> O Quarto 105 está em USO. </h4><hr> <b>Hospede em Uso :  </b> ANDERSON MAUTONE FERREIRA
                            <br> <b>Qtde Hospedes :</b> 03 <br> <b>Checkin :</b> 11/12/2020 as 12:00 AM <br> <b>Checkout :</b> 14/12/2020 as 16:00 PM <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="2" dataquarto="105" style="cursor:pointer">
                        <span class="card-title">EM USO</span>
                        <span class="card-amount">105</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>


            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card vermelho link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4> O Quarto 108 está em Manutenção. </h4><hr>
                            <b>Detalhes da Manutenção: </b> Está trocando o ar condicionado por um novo , <br> trocando as torneceiras quebradas. <br>
                            <b> Responsavel Manutencao: </b> ANDERSON MAUTONE FERREIRA <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">


                    <div class="card-content" dataid="111222" idstatus="3" dataquarto="108" style="cursor:pointer">
                        <span class="card-title">MANUTENCAO</span>
                        <span class="card-amount">108</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card vermelho link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4> O Quarto 109 está em Manutenção. </h4><hr>
                            <b>Detalhes da Manutenção: </b> Está trocando o ar condicionado por um novo , <br> trocando as torneceiras quebradas. <br>
                            <b> Responsavel Manutencao: </b> ANDERSON MAUTONE FERREIRA <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="3" dataquarto="109" style="cursor:pointer">
                        <span class="card-title">MANUTENCAO</span>
                        <span class="card-amount">109</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card azul link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4> O Quarto 110 está em Limpeza porem Liberado. </h4><hr>
                            <b>Detalhes da Limpeza: </b> Limpando quarto completo. <br>
                            <b> Responsavel Limpeza: </b> ANDERSON MAUTONE FERREIRA <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="4" dataquarto="110" style="cursor:pointer">
                        <span class="card-title">LIMPEZA/USO</span>
                        <span class="card-amount">110</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card azul link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4> O Quarto 111 está em Limpeza porem Liberado. </h4><hr>
                            <b>Detalhes da Limpeza: </b> Limpando quarto completo. <br>
                            <b> Responsavel Limpeza: </b> ANDERSON MAUTONE FERREIRA <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="4" dataquarto="111" style="cursor:pointer">
                        <span class="card-title">LIMPEZA/USO</span>
                        <span class="card-amount">111</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card cinza yellow link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4> O Quarto 106 está Bloqueado. </h4><hr>
                            <b> Motivos : </b> Em manutenção predial. <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="5" dataquarto="106" style="cursor:pointer">
                        <span class="card-title">BLOQUEADO</span>
                        <span class="card-amount">106</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card cinza yellow link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4> O Quarto 106 está Bloqueado. </h4><hr>
                            <b> Motivos : </b> Em manutenção predial. <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="5" dataquarto="107" style="cursor:pointer">
                        <span class="card-title">BLOQUEADO</span>
                        <span class="card-amount">107</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>



        </div>

        <hr>
        <h4 class="welcome-title text-uppercase">Bloco 02</h4>
        <div class="row">

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card success link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4>O quarto 201 está liberado para uso. </h4><br> <b>Capacidade Hospedes:</b> 04 <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <b>Valor Diário Comum :</b> R$ 1.900,00 ( Verificar Datas para Diária )   <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">


                    <div class="card-content" dataid="111222" idstatus="1" style="cursor:pointer">
                        <span class="card-title">LIBERADO</span>
                        <span class="card-amount">201</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>



            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card success link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4>O quarto 201 está liberado para uso. </h4><br> <b>Capacidade Hospedes:</b> 04 <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <b>Valor Diário Comum :</b> R$ 1.900,00 ( Verificar Datas para Diária )   <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">


                    <div class="card-content" dataid="111222" idstatus="1" style="cursor:pointer">
                        <span class="card-title">LIBERADO</span>
                        <span class="card-amount">201</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card cinza link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4> O Quarto 202 está Bloqueado. </h4><hr>
                            <b> Motivos : </b> Em manutenção predial. <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="5" style="cursor:pointer">
                        <span class="card-title">BLOQUEADO</span>
                        <span class="card-amount">202</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card azul link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4> O Quarto 203 está em Limpeza porem Liberado. </h4><hr>
                            <b>Detalhes da Limpeza: </b> Limpando quarto completo. <br>
                            <b> Responsavel Limpeza: </b> ANDERSON MAUTONE FERREIRA <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="4" style="cursor:pointer">
                        <span class="card-title">LIMPEZA/USO</span>
                        <span class="card-amount">203</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>


            <div class="col-sm-2 col-md-2 ">
                <div class="dashboard-report-card card vermelho link-container" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="bottom" title="" data-content="<h4> O Quarto 204 está em Manutenção. </h4><hr>
                            <b>Detalhes da Manutenção: </b> Está trocando o ar condicionado por um novo , trocando as torneceiras quebradas. <br>
                            <b> Responsavel Manutencao: </b> ANDERSON MAUTONE FERREIRA <br>
                            <b>Detalhes:</b> Quarto de luxo com janela , ofuro , banheiro com banheira e outros...  <br>
                            <hr>  <img src='https://dev.recantohoteis.com.br/quartoresort.jpg' width='550' height='300'> " data-original-title="">

                    <div class="card-content" dataid="111222" idstatus="5" style="cursor:pointer">
                        <span class="card-title">MANUTENCAO</span>
                        <span class="card-amount">204</span>
                        <span class="card-desc"><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i><i class="fa fa-user fa-2x"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="popover fade bs-popover-bottom" role="tooltip" id="popover569133" x-placement="bottom"
         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(388px, 201px, 0px);">
        <div class="arrow" style="left: 375px;"></div>
        <h3 class="popover-header"><h4> Legendas </h4></h3>
        <div class="popover-body">
            <div id="tmp-id-1613485029155">
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
                <br>
                <div class="row">

                    <div class="col-sm-4 col-md-4 ">
                        <div class="dashboard-report-card card success link-container" data-html="true"
                             data-trigger="hover" data-toggle="popover" data-placement="bottom" title="Quarto Liberado"
                             data-content="O quarto 101 está liberado para uso. <br> <hr> Algumm conteudo aqui .... ">
                            <div class="card-content" dataid="111222" idstatus="1" style="cursor:pointer">
                                <span class="card-title">PRONTO PARA USO</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4 col-md-4">
                        <div class="dashboard-report-card card yellow link-container" data-html="true"
                             data-trigger="hover" data-toggle="popover" data-placement="bottom" title="Quarto Em Uso"
                             data-content="O quarto 101 está liberado para uso. <br> <hr> Algumm conteudo aqui .... ">
                            <div class="card-content" dataid="111222" idstatus="1" style="cursor:pointer">
                                <span class="card-title">EM USO</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4 col-md-4 ">
                        <div class="dashboard-report-card card vermelho link-container" data-html="true"
                             data-trigger="hover" data-toggle="popover" data-placement="bottom"
                             title="Quarto Em manutencao"
                             data-content="O quarto 101 está liberado para uso. <br> <hr> Algumm conteudo aqui .... ">
                            <div class="card-content" dataid="111222" idstatus="1" style="cursor:pointer">
                                <span class="card-title">EM MANUTENCAO</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 ">
                        <div class="dashboard-report-card card azul link-container" data-html="true"
                             data-trigger="hover" data-toggle="popover" data-placement="bottom"
                             title="Quarto Em manutencao"
                             data-content="O quarto 101 está liberado para uso. <br> <hr> Algumm conteudo aqui .... ">
                            <div class="card-content" dataid="111222" idstatus="1" style="cursor:pointer">
                                <span class="card-title">LIBERADO</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 ">
                        <div class="dashboard-report-card card cinza link-container" data-html="true"
                             data-trigger="hover" data-toggle="popover" data-placement="bottom"
                             title="Quarto Em manutencao"
                             data-content="O quarto 101 está liberado para uso. <br> <hr> Algumm conteudo aqui .... ">
                            <div class="card-content" dataid="111222" idstatus="1" style="cursor:pointer">
                                <span class="card-title">BLOQUEIO</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="daterangepicker ltr show-ranges show-calendar opensleft"
         style="display: block; top: 209px; right: 153.594px; left: auto;">
        <div class="ranges">
            <ul>
                <li data-range-key="Hoje">Hoje</li>
                <li data-range-key="Ontem">Ontem</li>
                <li data-range-key="Últimos 7 dias">Últimos 7 dias</li>
                <li data-range-key="Últimos 30 dias">Últimos 30 dias</li>
                <li data-range-key="This Month">This Month</li>
                <li data-range-key="Last Month">Last Month</li>
                <li data-range-key="This Year">This Year</li>
                <li data-range-key="This Week" class="active">This Week</li>
                <li data-range-key="Custom Range">Custom Range</li>
            </ul>
        </div>
        <div class="drp-calendar left">
            <div class="calendar-table">
                <table class="table-condensed">
                    <thead>
                    <tr>
                        <th class="prev available"><span></span></th>
                        <th colspan="5" class="month"><select class="monthselect">
                                <option value="0">Jan</option>
                                <option value="1" selected="selected">Feb</option>
                                <option value="2">Mar</option>
                                <option value="3">Apr</option>
                                <option value="4">May</option>
                                <option value="5">Jun</option>
                                <option value="6">Jul</option>
                                <option value="7">Aug</option>
                                <option value="8">Sep</option>
                                <option value="9">Oct</option>
                                <option value="10">Nov</option>
                                <option value="11">Dec</option>
                            </select><select class="yearselect">
                                <option value="1921">1921</option>
                                <option value="1922">1922</option>
                                <option value="1923">1923</option>
                                <option value="1924">1924</option>
                                <option value="1925">1925</option>
                                <option value="1926">1926</option>
                                <option value="1927">1927</option>
                                <option value="1928">1928</option>
                                <option value="1929">1929</option>
                                <option value="1930">1930</option>
                                <option value="1931">1931</option>
                                <option value="1932">1932</option>
                                <option value="1933">1933</option>
                                <option value="1934">1934</option>
                                <option value="1935">1935</option>
                                <option value="1936">1936</option>
                                <option value="1937">1937</option>
                                <option value="1938">1938</option>
                                <option value="1939">1939</option>
                                <option value="1940">1940</option>
                                <option value="1941">1941</option>
                                <option value="1942">1942</option>
                                <option value="1943">1943</option>
                                <option value="1944">1944</option>
                                <option value="1945">1945</option>
                                <option value="1946">1946</option>
                                <option value="1947">1947</option>
                                <option value="1948">1948</option>
                                <option value="1949">1949</option>
                                <option value="1950">1950</option>
                                <option value="1951">1951</option>
                                <option value="1952">1952</option>
                                <option value="1953">1953</option>
                                <option value="1954">1954</option>
                                <option value="1955">1955</option>
                                <option value="1956">1956</option>
                                <option value="1957">1957</option>
                                <option value="1958">1958</option>
                                <option value="1959">1959</option>
                                <option value="1960">1960</option>
                                <option value="1961">1961</option>
                                <option value="1962">1962</option>
                                <option value="1963">1963</option>
                                <option value="1964">1964</option>
                                <option value="1965">1965</option>
                                <option value="1966">1966</option>
                                <option value="1967">1967</option>
                                <option value="1968">1968</option>
                                <option value="1969">1969</option>
                                <option value="1970">1970</option>
                                <option value="1971">1971</option>
                                <option value="1972">1972</option>
                                <option value="1973">1973</option>
                                <option value="1974">1974</option>
                                <option value="1975">1975</option>
                                <option value="1976">1976</option>
                                <option value="1977">1977</option>
                                <option value="1978">1978</option>
                                <option value="1979">1979</option>
                                <option value="1980">1980</option>
                                <option value="1981">1981</option>
                                <option value="1982">1982</option>
                                <option value="1983">1983</option>
                                <option value="1984">1984</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021" selected="selected">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                                <option value="2033">2033</option>
                                <option value="2034">2034</option>
                                <option value="2035">2035</option>
                                <option value="2036">2036</option>
                                <option value="2037">2037</option>
                                <option value="2038">2038</option>
                                <option value="2039">2039</option>
                                <option value="2040">2040</option>
                                <option value="2041">2041</option>
                                <option value="2042">2042</option>
                                <option value="2043">2043</option>
                                <option value="2044">2044</option>
                                <option value="2045">2045</option>
                                <option value="2046">2046</option>
                                <option value="2047">2047</option>
                                <option value="2048">2048</option>
                                <option value="2049">2049</option>
                                <option value="2050">2050</option>
                                <option value="2051">2051</option>
                                <option value="2052">2052</option>
                                <option value="2053">2053</option>
                                <option value="2054">2054</option>
                                <option value="2055">2055</option>
                                <option value="2056">2056</option>
                                <option value="2057">2057</option>
                                <option value="2058">2058</option>
                                <option value="2059">2059</option>
                                <option value="2060">2060</option>
                                <option value="2061">2061</option>
                                <option value="2062">2062</option>
                                <option value="2063">2063</option>
                                <option value="2064">2064</option>
                                <option value="2065">2065</option>
                                <option value="2066">2066</option>
                                <option value="2067">2067</option>
                                <option value="2068">2068</option>
                                <option value="2069">2069</option>
                                <option value="2070">2070</option>
                                <option value="2071">2071</option>
                                <option value="2072">2072</option>
                                <option value="2073">2073</option>
                                <option value="2074">2074</option>
                                <option value="2075">2075</option>
                                <option value="2076">2076</option>
                                <option value="2077">2077</option>
                                <option value="2078">2078</option>
                                <option value="2079">2079</option>
                                <option value="2080">2080</option>
                                <option value="2081">2081</option>
                                <option value="2082">2082</option>
                                <option value="2083">2083</option>
                                <option value="2084">2084</option>
                                <option value="2085">2085</option>
                                <option value="2086">2086</option>
                                <option value="2087">2087</option>
                                <option value="2088">2088</option>
                                <option value="2089">2089</option>
                                <option value="2090">2090</option>
                                <option value="2091">2091</option>
                                <option value="2092">2092</option>
                                <option value="2093">2093</option>
                                <option value="2094">2094</option>
                                <option value="2095">2095</option>
                                <option value="2096">2096</option>
                                <option value="2097">2097</option>
                                <option value="2098">2098</option>
                                <option value="2099">2099</option>
                                <option value="2100">2100</option>
                                <option value="2101">2101</option>
                                <option value="2102">2102</option>
                                <option value="2103">2103</option>
                                <option value="2104">2104</option>
                                <option value="2105">2105</option>
                                <option value="2106">2106</option>
                                <option value="2107">2107</option>
                                <option value="2108">2108</option>
                                <option value="2109">2109</option>
                                <option value="2110">2110</option>
                                <option value="2111">2111</option>
                                <option value="2112">2112</option>
                                <option value="2113">2113</option>
                                <option value="2114">2114</option>
                                <option value="2115">2115</option>
                                <option value="2116">2116</option>
                                <option value="2117">2117</option>
                                <option value="2118">2118</option>
                                <option value="2119">2119</option>
                                <option value="2120">2120</option>
                                <option value="2121">2121</option>
                            </select></th>
                        <th class="next available"><span></span></th>
                    </tr>
                    <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="weekend off available" data-title="r0c0">31</td>
                        <td class="available" data-title="r0c1">1</td>
                        <td class="available is_load_tooltip" data-title="r0c2">2</td>
                        <td class="available is_load_tooltip" data-title="r0c3">3</td>
                        <td class="available is_load_tooltip" data-title="r0c4">4</td>
                        <td class="available" data-title="r0c5">5</td>
                        <td class="weekend available" data-title="r0c6">6</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r1c0">7</td>
                        <td class="available" data-title="r1c1">8</td>
                        <td class="available" data-title="r1c2">9</td>
                        <td class="available" data-title="r1c3">10</td>
                        <td class="available" data-title="r1c4">11</td>
                        <td class="available is_load_tooltip" data-title="r1c5">12</td>
                        <td class="weekend available is_load_tooltip" data-title="r1c6">13</td>
                    </tr>
                    <tr>
                        <td class="weekend active start-date available" data-title="r2c0">14</td>
                        <td class="in-range available" data-title="r2c1">15</td>
                        <td class="today active end-date in-range available" data-title="r2c2">16</td>
                        <td class="available" data-title="r2c3">17</td>
                        <td class="available" data-title="r2c4">18</td>
                        <td class="available" data-title="r2c5">19</td>
                        <td class="weekend available" data-title="r2c6">20</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r3c0">21</td>
                        <td class="available" data-title="r3c1">22</td>
                        <td class="available" data-title="r3c2">23</td>
                        <td class="available" data-title="r3c3">24</td>
                        <td class="available" data-title="r3c4">25</td>
                        <td class="available" data-title="r3c5">26</td>
                        <td class="weekend available" data-title="r3c6">27</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r4c0">28</td>
                        <td class="off available" data-title="r4c1">1</td>
                        <td class="off available" data-title="r4c2">2</td>
                        <td class="off available" data-title="r4c3">3</td>
                        <td class="off available" data-title="r4c4">4</td>
                        <td class="off available" data-title="r4c5">5</td>
                        <td class="weekend off available" data-title="r4c6">6</td>
                    </tr>
                    <tr>
                        <td class="weekend off available" data-title="r5c0">7</td>
                        <td class="off available" data-title="r5c1">8</td>
                        <td class="off available" data-title="r5c2">9</td>
                        <td class="off available" data-title="r5c3">10</td>
                        <td class="off available" data-title="r5c4">11</td>
                        <td class="off available" data-title="r5c5">12</td>
                        <td class="weekend off available" data-title="r5c6">13</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-calendar right">
            <div class="calendar-table">
                <table class="table-condensed">
                    <thead>
                    <tr>
                        <th></th>
                        <th colspan="5" class="month"><select class="monthselect">
                                <option value="0" disabled="disabled">Jan</option>
                                <option value="1">Feb</option>
                                <option value="2" selected="selected">Mar</option>
                                <option value="3">Apr</option>
                                <option value="4">May</option>
                                <option value="5">Jun</option>
                                <option value="6">Jul</option>
                                <option value="7">Aug</option>
                                <option value="8">Sep</option>
                                <option value="9">Oct</option>
                                <option value="10">Nov</option>
                                <option value="11">Dec</option>
                            </select><select class="yearselect">
                                <option value="2021" selected="selected">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                                <option value="2033">2033</option>
                                <option value="2034">2034</option>
                                <option value="2035">2035</option>
                                <option value="2036">2036</option>
                                <option value="2037">2037</option>
                                <option value="2038">2038</option>
                                <option value="2039">2039</option>
                                <option value="2040">2040</option>
                                <option value="2041">2041</option>
                                <option value="2042">2042</option>
                                <option value="2043">2043</option>
                                <option value="2044">2044</option>
                                <option value="2045">2045</option>
                                <option value="2046">2046</option>
                                <option value="2047">2047</option>
                                <option value="2048">2048</option>
                                <option value="2049">2049</option>
                                <option value="2050">2050</option>
                                <option value="2051">2051</option>
                                <option value="2052">2052</option>
                                <option value="2053">2053</option>
                                <option value="2054">2054</option>
                                <option value="2055">2055</option>
                                <option value="2056">2056</option>
                                <option value="2057">2057</option>
                                <option value="2058">2058</option>
                                <option value="2059">2059</option>
                                <option value="2060">2060</option>
                                <option value="2061">2061</option>
                                <option value="2062">2062</option>
                                <option value="2063">2063</option>
                                <option value="2064">2064</option>
                                <option value="2065">2065</option>
                                <option value="2066">2066</option>
                                <option value="2067">2067</option>
                                <option value="2068">2068</option>
                                <option value="2069">2069</option>
                                <option value="2070">2070</option>
                                <option value="2071">2071</option>
                                <option value="2072">2072</option>
                                <option value="2073">2073</option>
                                <option value="2074">2074</option>
                                <option value="2075">2075</option>
                                <option value="2076">2076</option>
                                <option value="2077">2077</option>
                                <option value="2078">2078</option>
                                <option value="2079">2079</option>
                                <option value="2080">2080</option>
                                <option value="2081">2081</option>
                                <option value="2082">2082</option>
                                <option value="2083">2083</option>
                                <option value="2084">2084</option>
                                <option value="2085">2085</option>
                                <option value="2086">2086</option>
                                <option value="2087">2087</option>
                                <option value="2088">2088</option>
                                <option value="2089">2089</option>
                                <option value="2090">2090</option>
                                <option value="2091">2091</option>
                                <option value="2092">2092</option>
                                <option value="2093">2093</option>
                                <option value="2094">2094</option>
                                <option value="2095">2095</option>
                                <option value="2096">2096</option>
                                <option value="2097">2097</option>
                                <option value="2098">2098</option>
                                <option value="2099">2099</option>
                                <option value="2100">2100</option>
                                <option value="2101">2101</option>
                                <option value="2102">2102</option>
                                <option value="2103">2103</option>
                                <option value="2104">2104</option>
                                <option value="2105">2105</option>
                                <option value="2106">2106</option>
                                <option value="2107">2107</option>
                                <option value="2108">2108</option>
                                <option value="2109">2109</option>
                                <option value="2110">2110</option>
                                <option value="2111">2111</option>
                                <option value="2112">2112</option>
                                <option value="2113">2113</option>
                                <option value="2114">2114</option>
                                <option value="2115">2115</option>
                                <option value="2116">2116</option>
                                <option value="2117">2117</option>
                                <option value="2118">2118</option>
                                <option value="2119">2119</option>
                                <option value="2120">2120</option>
                                <option value="2121">2121</option>
                            </select></th>
                        <th class="next available"><span></span></th>
                    </tr>
                    <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="weekend off available" data-title="r0c0">28</td>
                        <td class="available" data-title="r0c1">1</td>
                        <td class="available" data-title="r0c2">2</td>
                        <td class="available" data-title="r0c3">3</td>
                        <td class="available" data-title="r0c4">4</td>
                        <td class="available" data-title="r0c5">5</td>
                        <td class="weekend available" data-title="r0c6">6</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r1c0">7</td>
                        <td class="available" data-title="r1c1">8</td>
                        <td class="available" data-title="r1c2">9</td>
                        <td class="available" data-title="r1c3">10</td>
                        <td class="available" data-title="r1c4">11</td>
                        <td class="available" data-title="r1c5">12</td>
                        <td class="weekend available" data-title="r1c6">13</td>
                    </tr>
                    <tr>
                        <td class="weekend available is_load_tooltip" data-title="r2c0">14</td>
                        <td class="available is_load_tooltip" data-title="r2c1">15</td>
                        <td class="available" data-title="r2c2">16</td>
                        <td class="available" data-title="r2c3">17</td>
                        <td class="available" data-title="r2c4">18</td>
                        <td class="available" data-title="r2c5">19</td>
                        <td class="weekend available" data-title="r2c6">20</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r3c0">21</td>
                        <td class="available" data-title="r3c1">22</td>
                        <td class="available is_load_tooltip" data-title="r3c2">23</td>
                        <td class="available is_load_tooltip" data-title="r3c3">24</td>
                        <td class="available is_load_tooltip" data-title="r3c4">25</td>
                        <td class="available is_load_tooltip" data-title="r3c5">26</td>
                        <td class="weekend available" data-title="r3c6">27</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r4c0">28</td>
                        <td class="available" data-title="r4c1">29</td>
                        <td class="available" data-title="r4c2">30</td>
                        <td class="available" data-title="r4c3">31</td>
                        <td class="off available" data-title="r4c4">1</td>
                        <td class="off available is_load_tooltip" data-title="r4c5">2</td>
                        <td class="weekend off available is_load_tooltip" data-title="r4c6">3</td>
                    </tr>
                    <tr>
                        <td class="weekend off available" data-title="r5c0">4</td>
                        <td class="off available" data-title="r5c1">5</td>
                        <td class="off available" data-title="r5c2">6</td>
                        <td class="off available" data-title="r5c3">7</td>
                        <td class="off available" data-title="r5c4">8</td>
                        <td class="off available" data-title="r5c5">9</td>
                        <td class="weekend off available" data-title="r5c6">10</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-buttons"><span class="drp-selected">02/14/2021 - 02/16/2021</span>
            <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button>
            <button class="applyBtn btn btn-sm btn-primary" type="button">Apply</button>
        </div>
    </div>
@endsection


@section('script.body')
    <script>

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        var start = moment().startOf("week");
        var end = moment();
        function cb(start, end) {
            $("#reportrange span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
        }
        $("#reportrange")
            .daterangepicker(
                {
                    startDate: start,
                    endDate: end,
                    alwaysShowCalendars: true,
                    opens: "left",
                    showDropdowns: true,
                    ranges: {
                        Hoje: [moment(), moment()],
                        Ontem: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                        "Últimos 7 dias": [moment().subtract(6, "days"), moment()],
                        "Últimos 30 dias": [moment().subtract(29, "days"), moment()],
                        "This Month": [moment().startOf("month"), moment().endOf("month")],
                        "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
                        "This Year": [moment().startOf("year"), moment().endOf("year")],
                        "This Week": [moment().startOf("week"), end],
                    },
                },
                cb
            )
            .on("apply.daterangepicker", function (ev, picker) {

                alert("Fazer busca do mapa de acordo com a data pesquisada... Popular o ( Overall statistics ) e a Disponibilidade dos quartos tambem.");

                // Reload Earning JS
                $.ajax({
                    url: "consultamapa.php",
                    data: {
                        chart: "earning",
                        from: picker.startDate.format("YYYY-MM-DD"),
                        to: picker.endDate.format("YYYY-MM-DD"),
                    },
                    dataType: "json",
                    type: "post",
                    success: function (res) {
                        if (res.status) {
                            window.myMixedChart.data = res.data;
                            window.myMixedChart.update();
                        }
                    },
                });
            });
        cb(start, end);

    </script>
@endsection
