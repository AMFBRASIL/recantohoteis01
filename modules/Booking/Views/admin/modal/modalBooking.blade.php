<div id="modal-new-booking" class="modal fade show" class="modal fade" role="dialog" data-backdrop="static"
     style="display: none;"
     aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal Title-->
            <div class="modal-header">
                <h4 class="modal-title">NOVA RESERVA</h4>
            </div>

            <!-- Modal Body-->
            <div class="modal-body">
                <ul class="nav nav-tabs" id="tabsRecanto" style="background-color: #ecf0f5;">
                    <li class="nav-item">
                        <a class="nav-link tab active" data-toggle="tab" href="#booking-detalhes">
                            <i class="fa fa-list fa-4x" data-toggle="tooltip" data-placement="auto" data-html="true"
                               title="" data-original-title=" <h4> Solicitante </h4> "></i>
                        </a>
                    </li>

                    <li class="nav-item tab">
                        <a class="nav-link" data-toggle="tab" href="#booking-consumo">
                            <i class="fa fa-calendar fa-4x" data-toggle="tooltip" data-placement="auto" data-html="true"
                               title="" data-original-title="<h4> CheckIN </h4>"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#booking-uhs-disponiveis"
                           data-target="#booking-uhs-disponiveis" data-toggle="tabajax">
                            <i class="fa fa-bed fa-4x" data-toggle="tooltip" data-placement="auto" data-html="true"
                               title="" data-original-title="<h4> UHs Disponíveis </h4>"></i>
                        </a>
                    </li>

                    <li class="nav-item tab">
                        <a class="nav-link" data-toggle="tab" href="#booking-acompanhantes">
                            <i class="fa fa-users fa-4x" data-toggle="tooltip" data-placement="auto" data-html="true"
                               title="" data-original-title="<h4> Hóspedes </h4>"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#booking-pagamentos">
                            <i class="fa fa-dollar fa-4x" data-toggle="tooltip" data-placement="auto" data-html="true"
                               title="" data-original-title="<h4> Pagamentos </h4>"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#booking-cartaoconsumo">
                            <i class="fa fa-credit-card fa-4x" data-toggle="tooltip" data-placement="auto"
                               data-html="true" title="" data-original-title="<h4> Cartão de Consumo Resort </h4>"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#booking-cartaoacesso">
                            <i class="fa fa-key fa-4x" data-toggle="tooltip" data-placement="auto" data-html="true"
                               title="" data-original-title="<h4> Cartão de Acesso </h4>"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#booking-veiculos">
                            <i class="fa fa-car fa-4x" data-toggle="tooltip" data-placement="auto" data-html="true"
                               title="" data-original-title="<h4> Veiculos </h4>"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#booking-pensao">
                            <i class="fa fa-cutlery fa-4x" data-toggle="tooltip" data-placement="auto" data-html="true"
                               title="" data-original-title="<h4> Pensao </h4>"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="tabreservafinal.php" class="nav-link CallButton" data-target="#booking-final"
                           data-toggle="tabajax">
                            <i class="fa fa-info-circle fa-4x" data-toggle="tooltip" data-placement="auto"
                               data-html="true" title="" data-original-title="<h4> Detalhes Final </h4>"></i>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <!--- TAB Detalhes --->
                    <div id="booking-detalhes" class="tab-pane active">
                        <br>
                        <label><h4> Reserva :: Solicitante </h4></label>
                        <div class="booking-review">
                            <div class="review-section">
                                <div class="info-form">
                                    <div class="panel">
                                        <div class="panel-body" style="background-color: #ecf0f5;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label> Nome do Hospede </label>
                                                    <div id="client_host" class="input-group">
                                                        <input type="hidden" id="client-id" name="client_id" value="">
                                                        <input id="client-name" type="text" value="" name="clent_name"
                                                               placeholder="Nome do Cliente"
                                                               class="form-control input-style">

                                                        <div class="input-group-append">
                                                            <button type="button"
                                                                    class="btn btn-info fa fa-edit fa-1x edit-client"></button>
                                                            <button type="button" data-toggle="modal"
                                                                    data-target="#register"
                                                                    class="btn btn-success fa fa-plus fa-1x"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label> Rg Cliente </label>
                                                    <div class="input-group">
                                                        <input id="client-rg" type="text" value="" name="client_rg"
                                                               placeholder="RG"
                                                               class="form-control input-style">
                                                        <div class="input-group-append">
                                                            <button id="bt-client-rg" type="button"
                                                                    class="btn btn-info fa fa-check fa-1x"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label> CPF Cliente </label>
                                                    <div class="input-group">
                                                        <input id="client-cpf" type="text" value="" name="client_cpf"
                                                               placeholder="CPF"
                                                               class="form-control input-style">
                                                        <div class="input-group-append">
                                                            <button id="bt-client-cpf" type="button"
                                                                    class="btn btn-info fa fa-check fa-1x"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Celular Solicitante</label>
                                                        <input id="client-cellphone" type="text" value="" name="celular"
                                                               placeholder="9292938844" class="form-control input-style"
                                                               disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email Solicitante</label>
                                                        <input id="client-email" type="text" value="" name="email"
                                                               placeholder="promautone@gmail.com"
                                                               class="form-control input-style"
                                                               disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label> Empresa de faturamento </label>
                                                    <div class="input-group">
                                                        <input id="billing-company" type="text" value=""
                                                               name="business_name"
                                                               placeholder="Digite o nome da empresa de faturamento"
                                                               class="form-control input-style">
                                                        <div class="input-group-append">
                                                            <button type="button"
                                                                    class="btn btn-info fa fa-edit fa-1x edit-client"></button>
                                                            <button type="button" data-toggle="modal"
                                                                    data-target="#register"
                                                                    class="btn btn-success fa fa-plus fa-1x"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label> Empresa do Cliente </label>
                                                    <div class="input-group">
                                                        <input id="client-company" type="text" value=""
                                                               name="business_name"
                                                               placeholder="Digite o nome da empresa do cliente"
                                                               class="form-control input-style">
                                                        <div class="input-group-append">
                                                            <button type="button"
                                                                    class="btn btn-info fa fa-edit fa-1x edit-client"></button>
                                                            <button type="button" data-toggle="modal"
                                                                    data-target="#register"
                                                                    class="btn btn-success fa fa-plus fa-1x"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="panel" style="background-color: #ecf0f5;">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="control-label"><b>Observações Internas ( nao
                                                                    vai no Voucher )</b></label>
                                                            <div class="">
                                                                <textarea name="internal-observations"
                                                                          class="d-none has-ckeditor" cols="30"
                                                                          rows="10">
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="control-label"><b>Observações do
                                                                    Hospede</b></label>
                                                            <div class="">
                                                                <textarea name="client-observations"
                                                                          class="d-none has-ckeditor"
                                                                          cols="30" rows="10"
                                                                          aria-hidden="true">
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--- TAB Reservation --->
                    <div id="booking-consumo" class="tab-pane fade">
                        <br>
                        <label><h4> Reserva :: Check-In </h4></label>

                        <div class="booking-review">
                            <div class="table-responsive">

                                <div class="panel" style="background-color: #ecf0f5;">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="reserva_situacao">TIPO</label><br>
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-success btn-lg active">
                                                            <input
                                                                type="radio" name="property_type" id="hotel" value="1"
                                                                checked="" data-onstyle="success"
                                                                data-offstyle="danger"> HOTEL
                                                        </label>
                                                        <label class="btn btn-success btn-lg">
                                                            <input type="radio"
                                                                   name="property_type"
                                                                   id="chacara"
                                                                   value="2"> CHACARA
                                                        </label>
                                                        <label class="btn btn-success btn-lg">
                                                            <input type="radio"
                                                                   name="property_type"
                                                                   id="evento"
                                                                   value="3"> EVENTOS
                                                        </label>
                                                        <label class="btn btn-success btn-lg">
                                                            <input type="radio"
                                                                   name="property_type"
                                                                   id="dayuse"
                                                                   value="4"> DAY USE
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> Canal de Vendas </label>
                                                    <div class="input-group">
                                                        <select id="reservationType" name="reservation_type_id"
                                                                class="select_bank form-control input-style"
                                                                required="">
                                                            <option value="">--Select--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel" style="background-color: #ecf0f5; display: block;" id="divHotel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group-lg">
                                                    <label for="adult_quantity">Adultos</label><br>
                                                    <input type="number" value="0" name="adult_quantity"
                                                           id="adult_quantity"
                                                           placeholder="" class="form-control input-style">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group-lg">
                                                    <label for="children_quantity_0_5">Crianças 0 a 5</label><br>
                                                    <input type="number" value="0" name="children_quantity_0_5"
                                                           id="children_quantity_0_5"
                                                           placeholder="" class="form-control input-style">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group-lg">
                                                    <label for="children_quantity_6_12">Crianças 6 a 12</label><br>
                                                    <input type="number" value="0" name="children_quantity_6_12"
                                                           id="children_quantity_6_12"
                                                           placeholder="" class="input-style form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel" style="background-color: #ecf0f5; display: none;" id="divChacara">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group-lg">
                                                    <label for="reserva_situacao">Qtde de Pessoas</label><br>
                                                    <input type="number" value="0" name="adult_quantity"
                                                           id="adult_quantity"
                                                           placeholder="" class="form-control input-style">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel" style="background-color: #ecf0f5;">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label"><b>CHECKIN / CHECKOUT :</b></label>
                                                    <div id="reportrange"
                                                         style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                                        <i class="fa fa-calendar"></i>&nbsp; <span>11/05/2021 02:00 PM - 12/05/2021 10:00 PM</span>
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Quartos encontrados : </label>
                                                    <div id="reportData" style="background-color: #e2e2e2;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <label for="reserva_situacao">Status</label><br>
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-primary btn-lg ">
                                                            <input type="radio" value="BLOQUEADA"
                                                                   name="situation_booking"
                                                                   id="option1"
                                                                   autocomplete="off">
                                                            BLOQUEADA </label>
                                                        <label class="btn btn-primary btn-lg active">
                                                            <input
                                                                type="radio" name="situation_booking" id="option2"
                                                                value="PRE RESERVA"
                                                                autocomplete="off" checked=""> PRE RESERVA </label>
                                                        <label class="btn btn-primary btn-lg">
                                                            <input type="radio" value="CONFIRMADA"
                                                                   name="situation_booking"
                                                                   id="option3"
                                                                   autocomplete="off">
                                                            CONFIRMADA </label>
                                                        <label class="btn btn-primary btn-lg">
                                                            <input type="radio" value="OVER BOOKING"
                                                                   name="situation_booking"
                                                                   id="option4"
                                                                   autocomplete="off">
                                                            OVER BOOKING </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label for="reserva_situacao">Faturamento</label><br>
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-primary btn-lg active">
                                                            <input value="ABERTO"
                                                                   type="radio" name="revenues" id="option1"
                                                                   autocomplete="off" checked=""> ABERTO </label>
                                                        <label class="btn btn-primary btn-lg">
                                                            <input type="radio" value="FATURADO"
                                                                   name="revenues"
                                                                   id="option2"
                                                                   autocomplete="off">
                                                            FATURADO </label>
                                                        <label class="btn btn-primary btn-lg">
                                                            <input type="radio" value="DEPOSITO"
                                                                   name="revenues"
                                                                   id="option3"
                                                                   autocomplete="off">
                                                            DEPOSITO </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--- TAB uhs Disponiveis --->
                    <div id="booking-uhs-disponiveis" class="tab-pane fade">

                    </div>

                    <!--- TAB Acompanhamentes --->
                    <div id="booking-acompanhantes" class="tab-pane fade">
                        <br>

                        <label><h4> Reserva :: Acompanhantes </h4></label>

                        <div class="booking-review">
                            <div class="review-section">
                                <div class="info-form">
                                    <div class="panel">
                                        <div class="panel-body" style="background-color: #ecf0f5;">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <label> Nome do Hospede </label>
                                                    <div class="input-group">
                                                        <input type="text" name="hospede_name" id="hospede_name"
                                                               placeholder="Digite o nome do cliente... Auto Complet"
                                                               class="form-control"
                                                               style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">

                                                        <div class="input-group-append">
                                                            <button type="button"
                                                                    class="btn btn-info fa fa-edit fa-1x editHospede"></button>
                                                            <button type="button"
                                                                    class="btn btn-success fa fa-plus fa-1x newHospede"></button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <br>
                                            <a href="#" class="btn btn-primary addNewHospede">Add Hóspede na lista</a>

                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th width="200px">Nome</th>
                                                    <th width="130px">CPF</th>
                                                    <th width="150px">Telefone</th>
                                                    <th width="180px">Email</th>
                                                    <th width="40px">Idade</th>
                                                    <th width="30px">Situação</th>
                                                    <th width="30px"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="publish">
                                                    <td class="title"><a href="#"> Anderson Mautone Ferreira </a></td>
                                                    <td class="title"><a href="#"> 303.807.108-03 </a></td>
                                                    <td class="title"><a href="#"> (011) 9.8440-1158 </a></td>
                                                    <td class="title"><a href="#"> Promautone@gmail.com </a></td>
                                                    <td class="title"> 0 a 5</td>
                                                    <td><span class="badge badge-publish">Ativo</span></td>
                                                    <td>
                                                        <!-- Default dropleft button -->
                                                        <div class="btn-group dropleft">
                                                            <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                Ação
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Remover</a>
                                                                <a class="dropdown-item" href="#">Editar Dados</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="publish">
                                                    <td class="title"><a href="#"> Sthefani de Souza Oliveira </a></td>
                                                    <td class="title"><a href="#"> 303.807.108-03 </a></td>
                                                    <td class="title"><a href="#"> (011) 9.8440-1158 </a></td>
                                                    <td class="title"><a href="#"> sthafanidesouzacrus@gmail.com </a>
                                                    </td>
                                                    <td class="title"> Adulto</td>
                                                    <td><span class="badge badge-publish">Ativo</span></td>
                                                    <td>
                                                        <!-- Default dropleft button -->
                                                        <div class="btn-group dropleft">
                                                            <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                Ação
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Remover</a>
                                                                <a class="dropdown-item" href="#">Editar Dados</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="publish">
                                                    <td class="title"><a href="#"> Andreia oliveira de Andrade </a></td>
                                                    <td class="title"><a href="#"> 303.807.108-03 </a></td>
                                                    <td class="title"><a href="#"> (011) 9.8440-1158 </a></td>
                                                    <td class="title"><a href="#">
                                                            atendimento.algumacoisa@gmail.com </a></td>
                                                    <td class="title"> Adulto</td>
                                                    <td><span class="badge badge-publish">Ativo</span></td>
                                                    <td>
                                                        <!-- Default dropleft button -->
                                                        <div class="btn-group dropleft">
                                                            <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                Ação
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Remover</a>
                                                                <a class="dropdown-item" href="#">Editar Dados</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--- TAB acompanhantes --->
                    <div id="booking-pagamentos" class="tab-pane fade">
                        <br>

                        <label><h4> Reserva :: Pagamentos </h4></label>

                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="reserva_situacao"> Pagamento da Reserva</label><br>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-primary btn-lg active"> <input type="radio"
                                                                                                     name="pagamentoReserva"
                                                                                                     id="dinheiro"
                                                                                                     autocomplete="off"
                                                                                                     checked=""
                                                                                                     value="1"> DINHEIRO
                                                </label>
                                                <label class="btn btn-primary btn-lg"> <input type="radio"
                                                                                              name="pagamentoReserva"
                                                                                              id="faturado"
                                                                                              autocomplete="off"
                                                                                              value="2"> FATURADO
                                                </label>
                                                <label class="btn btn-primary btn-lg"> <input type="radio"
                                                                                              name="pagamentoReserva"
                                                                                              id="deposito"
                                                                                              autocomplete="off"
                                                                                              value="3"> DEPOSITO
                                                </label>
                                                <label class="btn btn-primary btn-lg"> <input type="radio"
                                                                                              name="pagamentoReserva"
                                                                                              id="cartao"
                                                                                              autocomplete="off"
                                                                                              value="4"> CARTAO </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group-lg">
                                            <label for="reserva_situacao">Desconto?</label><br>
                                            <div class="custom-control custom-switch">
                                                <div class="toggle btn btn-danger off" data-toggle="toggle"
                                                     role="button" style="width: 0px; height: 0px;"><input
                                                        type="checkbox" id="aceitaDesconto" data-toggle="toggle"
                                                        data-on="S" data-off="N" data-onstyle="success"
                                                        data-offstyle="danger">
                                                    <div class="toggle-group"><label for="aceitaDesconto"
                                                                                     class="btn btn-success toggle-on">S</label><label
                                                            for="aceitaDesconto"
                                                            class="btn btn-danger toggle-off">N</label><span
                                                            class="toggle-handle btn btn-light"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2" id="TipoDesconto" style="display: none;">
                                        <div class="form-group-lg">
                                            <label for="reserva_situacao">Tipo Desconto</label><br>
                                            <div class="custom-control custom-switch">
                                                <div class="toggle btn btn-danger off" data-toggle="toggle"
                                                     role="button" style="width: 0px; height: 0px;"><input
                                                        type="checkbox" id="tipoDesconto" data-toggle="toggle"
                                                        data-on="%" data-off="R$" data-onstyle="success"
                                                        data-offstyle="danger">
                                                    <div class="toggle-group"><label for="tipoDesconto"
                                                                                     class="btn btn-success toggle-on">%</label><label
                                                            for="tipoDesconto"
                                                            class="btn btn-danger toggle-off">R$</label><span
                                                            class="toggle-handle btn btn-light"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3" id="valorDesconto" style="display: none;">
                                        <label for="reserva_situacao">Valor Desconto</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">R$</span>
                                            </div>
                                            <input type="text" name="priceValorConsumo" id="priceValorConsumo"
                                                   placeholder="99,99" class="form-control moeda-real" value=""
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row" id="formaDinheiro" name="formaDinheiro">

                                    <div class="col-lg-3">
                                        <label for="reserva_situacao">Valor Recebido Dinheiro</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">R$</span>
                                            </div>
                                            <input type="text" name="priceRecebido" id="priceRecebido"
                                                   placeholder="99,99" class="form-control moeda-real" value=""
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>

                                    <div class="col-lg-4" id="somaDinheiroRecebido" style="display: none;">
                                        <div class="col-md-12">
                                            <h6 class="account">Valor Recebido em Dinheiro</h6><span
                                                class="mt-5 balance">  <div id="somaRecebido" name="somaRecebido"></div> </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" id="formaDeposito" name="formaDeposito" style="display: none;">

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label> Banco </label>
                                            <div class="input-group">
                                                <select name="bank" class="select_bank form-control" required=""
                                                        style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                                    <option value="">--Select--</option>
                                                    <option value="BRADESCO"> BRADESCO</option>
                                                    <option value="ITAU"> ITAU</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="control-label"><b>Data Pagamento:</b></label>
                                            <input type="text" name="datetimeDeposito" id="datetimeDeposito"
                                                   format="DD/MM/YYYY"
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <label for="reserva_situacao">Valor</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">R$</span>
                                            </div>
                                            <input type="text" name="priceDeposito" id="priceDeposito"
                                                   placeholder="99,99" class="form-control moeda-real" value=""
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>

                                    <div class="col-lg-4" id="divDeposito" style="display: none;">
                                        <div class="col-md-12">
                                            <h6 class="account">Valor a receber via Deposito</h6><span
                                                class="mt-5 balance">  <div id="somaDeposito" name="somaRecebido"></div> </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" id="formaCartao" name="formaCartao" style="display: none;">

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label> Maquina de Cartao </label>
                                            <div class="input-group">
                                                <select name="bank" class="select_bank form-control" required=""
                                                        style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                                    <option value="">--Select--</option>
                                                    <option value="1"> PAGSEGURO</option>
                                                    <option value="2"> SAFRA</option>
                                                    <option value="3"> SANTANDER</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="control-label"><b>Data Pagamento:</b></label>
                                            <input type="text" name="datetimeCartao" id="datetimeCartao"
                                                   format="DD/MM/YYYY"
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <label for="reserva_situacao">Valor Pago</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">R$</span>
                                            </div>
                                            <input type="text" name="priceCartao" id="priceCartao" placeholder="99,99"
                                                   class="form-control moeda-real" value=""
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>

                                    <div class="col-lg-3" id="divCartao" style="display: none;">
                                        <div class="col-md-12">
                                            <h6 class="account">Valor Recebido via Cartão</h6><span
                                                class="mt-5 balance">  <div id="somaCartao" name="somaRecebido"></div> </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" id="formaCartaoNSU" name="formaCartaoNSU" style="display: none;">

                                    <div class="col-lg-4">
                                        <label for="reserva_situacao">NSU Cartao</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" name="nsuCartao" id="nsuCartao" placeholder=""
                                                   class="form-control moeda-real" value=""
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="reserva_situacao">Autenticação Cartao</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" name="AuthCartao" id="AuthCartao" placeholder=""
                                                   class="form-control moeda-real" value=""
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!--- TAB Cartao de Consumo --->
                    <div id="booking-cartaoconsumo" class="tab-pane fade">
                        <br>

                        <label><h4> Reserva :: Cartão Consumo </h4></label>

                        <div class="panel">
                            <div class="panel-body">

                                <div class="row">

                                    <div class="col-lg-2">
                                        <div class="form-group-lg">
                                            <label for="reserva_situacao"> Cartão Consumo</label><br>
                                            <div class="custom-control custom-switch">
                                                <div class="toggle btn btn-danger off" data-toggle="toggle"
                                                     role="button" style="width: 0px; height: 0px;"><input
                                                        type="checkbox" id="liberarCartaoConsumo" data-toggle="toggle"
                                                        data-on="S" data-off="N" data-onstyle="success"
                                                        data-offstyle="danger">
                                                    <div class="toggle-group"><label for="liberarCartaoConsumo"
                                                                                     class="btn btn-success toggle-on">S</label><label
                                                            for="liberarCartaoConsumo"
                                                            class="btn btn-danger toggle-off">N</label><span
                                                            class="toggle-handle btn btn-light"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2" id="NumeroCartaoDiv" style="display: none;">
                                        <label for="reserva_situacao">Numero do Cartão</label><br>
                                        <div class="input-group mb-2">
                                            <input type="text" name="numerocartao" id="numerocartao" placeholder=""
                                                   class="form-control moeda-real" value=""
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>

                                    <div class="col-lg-3" id="ValorCartaoDiv" style="display: none;">
                                        <label for="reserva_situacao">Valor Cartão de Consumo</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">R$</span>
                                            </div>
                                            <input type="text" name="AddCartaoConsumoValor" id="AddCartaoConsumoValor"
                                                   placeholder="99,99" class="form-control moeda-real" value=""
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>

                                    <div class="col-lg-4" id="somatoriaValor" style="display: none;">
                                        <div class="col-md-12">
                                            <h6 class="account">Valor do Cartao Adicionado</h6><span
                                                class="mt-5 balance">  <div id="somaTotal"
                                                                            name="somaTotal"></div> </span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!--- TAB de cartao do acesso --->
                    <div id="booking-cartaoacesso" class="tab-pane fade">
                        <br>

                        <label><h4> Reserva :: Cartão de Acesso Quarto </h4></label>

                        <div class="panel">
                            <div class="panel-body">

                                <div class="row">

                                    <div class="col-lg-2">
                                        <div class="form-group-lg">
                                            <label for="reserva_situacao"> Cartão de Acesso </label><br>
                                            <div class="custom-control custom-switch">
                                                <div class="toggle btn btn-danger off" data-toggle="toggle"
                                                     role="button" style="width: 0px; height: 0px;"><input
                                                        type="checkbox" id="liberarAcesso" data-toggle="toggle"
                                                        data-on="S" data-off="N" data-onstyle="success"
                                                        data-offstyle="danger">
                                                    <div class="toggle-group"><label for="liberarAcesso"
                                                                                     class="btn btn-success toggle-on">S</label><label
                                                            for="liberarAcesso"
                                                            class="btn btn-danger toggle-off">N</label><span
                                                            class="toggle-handle btn btn-light"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4" id="numeroChaveAcesso" style="display: none;">
                                        <label for="reserva_situacao">Numero do Cartão</label><br>
                                        <div class="input-group mb-2">
                                            <input type="text" name="numerochave" id="numerochave" placeholder=""
                                                   class="form-control moeda-real" value=""
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <!--- TAB Veiculos --->
                    <div id="booking-veiculos" class="tab-pane fade">
                        <br>

                        <label><h4> Reserva :: Veiculos </h4></label>

                        <div class="panel">
                            <div class="panel-body" style="background-color: #ecf0f5;">

                                <div class="row">

                                    <div class="col-lg-3">
                                        <div class="form-group-lg">
                                            <label for="reserva_situacao">Garagem </label><br>
                                            <select name="bank" class="select_bank form-control" required=""
                                                    style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                                <option value="">--Select--</option>
                                                <option value="1"> Garagem 1</option>
                                                <option value="2"> Garagem 2</option>
                                                <option value="3"> Garagem 3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2" id="Placa">
                                        <label for="reserva_situacao">Placa</label><br>
                                        <div class="input-group mb-2">
                                            <input type="text" name="placa" id="placa" placeholder=""
                                                   class="form-control moeda-real" value=""
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group-lg">
                                            <label for="cor"> Cor Veiculo </label><br>
                                            <select name="bank" class="select_bank form-control" required=""
                                                    style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                                <option value="">--Selecione Cor Veiculo--</option>
                                                <option value="1"> BRANCO</option>
                                                <option value="2"> PRETO</option>
                                                <option value="3"> CINZA</option>
                                                <option value="3"> AMARELO</option>
                                                <option value="3"> VERMELHO</option>
                                                <option value="3"> BRANCO PEROLA</option>
                                                <option value="3"> VERDE</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4" id="modelo">
                                        <label for="reserva_situacao">Modelo Veiculo</label><br>
                                        <div class="input-group mb-2">
                                            <input type="text" name="modelo" id="modelo" placeholder=""
                                                   class="form-control moeda-real" value=""
                                                   style="background: #fff; cursor: pointer; padding: 10px 10px; border: 2px solid #ccc;">
                                        </div>
                                    </div>

                                </div>

                                <br>
                                <a href="#" class="btn btn-primary addNewHospede">Add Veiculo na lista</a>

                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width="250px">Garagem</th>
                                        <th width="150px">Placa</th>
                                        <th width="150px">Cor</th>
                                        <th width="200px">Modelo</th>
                                        <th width="50px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="publish">
                                        <td class="title"><a href="#"> GARAGEM 1 </a></td>
                                        <td class="title"><a href="#"> DRF-2039 </a></td>
                                        <td class="title"><a href="#"> BRANCO </a></td>
                                        <td class="title"><a href="#"> PORSHE </a></td>
                                        <td>
                                            <!-- Default dropleft button -->
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Ação
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Remover</a>
                                                    <a class="dropdown-item" href="#">Editar Dados</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="publish">
                                        <td class="title"><a href="#"> GARAGEM 2 </a></td>
                                        <td class="title"><a href="#"> DRF-2039 </a></td>
                                        <td class="title"><a href="#"> BRANCO </a></td>
                                        <td class="title"><a href="#"> PORSHE </a></td>
                                        <td>
                                            <!-- Default dropleft button -->
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Ação
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Remover</a>
                                                    <a class="dropdown-item" href="#">Editar Dados</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!--- TAB pensao --->
                    <div id="booking-pensao" class="tab-pane fade">
                        <br>

                        <label><h4> Reserva :: Pensão ( Somente quando for HOTEL selecionado ) </h4></label>

                        <div class="booking-review">
                            <div class="table-responsive">
                                <hr>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width="40px">UH</th>
                                        <th width="120px">CheckIN</th>
                                        <th width="60px">Hospedes</th>
                                        <th width="80px">Tarifa Por Pessoa</th>
                                        <th width="80px">Tarifa Calculada</th>
                                        <th width="100px">Cafe</th>
                                        <th width="100px">Almoço</th>
                                        <th width="100px">Jantar</th>
                                        <th width="100px">All Inclusive</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="publish">
                                        <td class="title">
                                            101
                                        </td>
                                        <td class="title">
                                            <b>11/12/2020</b>
                                        </td>

                                        <td class="title">
                                            3
                                        </td>


                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço por Pessoa. </h5> ">  <div
                                                    id="valordiaria01" name="valordiaria01"></div> </span>
                                        </td>
                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço Calculado. </h5> ">  <div
                                                    id="calculado01" name="calculado01"></div> </span>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkCafe_1"
                                                                                         name="checkCafe_1"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkCafe_1"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkCafe_1"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkAlmoco_1"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkAlmoco_1"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkAlmoco_1"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkJantar_1"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkJantar_1"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkJantar_1"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox" id="checkAll_1"
                                                                                         name="checkAll_1"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkAll_1"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkAll_1"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="publish">
                                        <td class="title">
                                            101
                                        </td>
                                        <td class="title">
                                            <b>12/12/2020</b>
                                        </td>
                                        <td class="title">
                                            3
                                        </td>
                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço por Pessoa. </h5> ">  <div
                                                    id="valordiaria02" name="valordiaria02"></div> </span>
                                        </td>
                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço Calculado. </h5> ">  <div
                                                    id="calculado02" name="calculado02"></div> </span>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkCafe_2"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkCafe_2"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkCafe_2"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checlAlmoco_2"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checlAlmoco_2"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checlAlmoco_2"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkJantar_2"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkJantar_2"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkJantar_2"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox" id="checkAll_2"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkAll_2"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkAll_2"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="publish">
                                        <td class="title">
                                            101
                                        </td>
                                        <td class="title">
                                            <b>13/12/2020</b>
                                        </td>
                                        <td class="title">
                                            3
                                        </td>
                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço por Pessoa. </h5> ">  <div
                                                    id="valordiaria03" name="valordiaria03"></div> </span>
                                        </td>
                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço por Pessoa. </h5> ">  <div
                                                    id="calculado03" name="calculado03"></div> </span>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkCafe_3"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkCafe_3"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkCafe_3"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checlAlmoco_3"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checlAlmoco_3"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checlAlmoco_3"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkJantar_3"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkJantar_3"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkJantar_3"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox" id="checkAll_3"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkAll_3"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkAll_3"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="publish">

                                    </tr>

                                    <tr class="publish">
                                        <td class="title">
                                            102
                                        </td>
                                        <td class="title">
                                            <b>14/12/2020</b>
                                        </td>
                                        <td class="title">
                                            3
                                        </td>
                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço por Pessoa. </h5> ">  <div
                                                    id="valordiaria04" name="valordiaria04"></div> </span>
                                        </td>
                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço Calculado. </h5> ">  <div
                                                    id="calculado04" name="calculado04"></div> </span>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkCafe_2"
                                                                                         name="checkCafe_2"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkCafe_2"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkCafe_2"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checlAlmoco_2"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checlAlmoco_2"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checlAlmoco_2"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkJantar_1"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkJantar_1"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkJantar_1"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox" id="checkAll_4"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkAll_4"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkAll_4"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="publish">
                                        <td class="title">
                                            102
                                        </td>
                                        <td class="title">
                                            <b>15/12/2020</b>
                                        </td>
                                        <td class="title">
                                            3
                                        </td>
                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço por Pessoa. </h5> ">  <div
                                                    id="valordiaria05" name="valordiaria05"></div> </span>
                                        </td>
                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço Calculado. </h5> ">  <div
                                                    id="calculado05" name="calculado05"></div> </span>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkCafe_2"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkCafe_2"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkCafe_2"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checlAlmoco_2"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checlAlmoco_2"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checlAlmoco_2"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkJantar_2"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkJantar_2"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkJantar_2"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox" id="checkAll_5"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkAll_5"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkAll_5"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="publish">
                                        <td class="title">
                                            102
                                        </td>
                                        <td class="title">
                                            <b>16/12/2020</b>
                                        </td>
                                        <td class="title">
                                            3
                                        </td>
                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço por Pessoa. </h5> ">  <div
                                                    id="valordiaria06" name="valordiaria06"></div> </span>
                                        </td>
                                        <td>
                                            <span class="mt-5 somatotal" data-toggle="tooltip" data-placement="top"
                                                  data-html="true" title=""
                                                  data-original-title=" <h5> Preço por Pessoa. </h5> ">  <div
                                                    id="calculado06" name="calculado06"></div> </span>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkCafe_3"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkCafe_3"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkCafe_3"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checlAlmoco_3"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checlAlmoco_3"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checlAlmoco_3"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox"
                                                                                         id="checkJantar_3"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkJantar_3"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkJantar_3"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div class="toggle btn btn-danger off" data-toggle="toggle" role="button"
                                                 style="width: 0px; height: 0px;"><input type="checkbox" id="checkAll_6"
                                                                                         data-toggle="toggle"
                                                                                         data-on="SIM" data-off="NAO"
                                                                                         data-onstyle="success"
                                                                                         data-offstyle="danger">
                                                <div class="toggle-group"><label for="checkAll_6"
                                                                                 class="btn btn-success toggle-on">SIM</label><label
                                                        for="checkAll_6"
                                                        class="btn btn-danger toggle-off">NAO</label><span
                                                        class="toggle-handle btn btn-light"></span></div>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="booking-final" class="tab-pane fade">
                        <br>

                        <label><h4> Reserva :: Detalhes finais </h4></label>

                        <div class="booking-review">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width="90px">UH</th>
                                        <th width="130px">CAT.</th>
                                        <th width="100px">TITULAR</th>
                                        <th width="100px">TARIFA</th>
                                        <th width="100px">PENSAO</th>
                                        <th width="100px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="publish">
                                        <td class="title">
                                            <a href="#"> BLOCO 01 - 104</a>
                                        </td>
                                        <td class="title">
                                            <a href="#"> STANDARD CASAL - FOCO </a>
                                        </td>
                                        <td class="title">
                                            <a href="#"> ANDERSON M FERREIRA </a>
                                        </td>
                                        <td class="title">
                                            <a href="#"> R$ 1.900,00 </a>
                                        </td>
                                        <td><span class="badge badge-draft">ALL INCLUSIVE</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                       href="https://homolog.recantohoteis.com.br/admin/module/hotel/edit/11">Edit
                                                        Ajuste</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                       data-target="#modal-booking-92">Visualizar Produtos do Ajuste</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="publish">
                                        <td class="title">
                                            <a href="#"> BLOCO 01 - 105</a>
                                        </td>
                                        <td class="title">
                                            <a href="#"> STANDARD CASAL - PLUS BABY </a>
                                        </td>
                                        <td class="title">
                                            <a href="#"> AMANDA LOURRANI </a>
                                        </td>
                                        <td class="title">
                                            <a href="#"> R$ 2.400,00 </a>
                                        </td>
                                        <td><span class="badge badge-draft">ALL INCLUSIVE</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                       href="https://homolog.recantohoteis.com.br/admin/module/hotel/edit/11">Edit
                                                        Ajuste</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                       data-target="#modal-booking-92">Visualizar Produtos do Ajuste</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!--- TAB Bilhetagem --->
                    <div id="booking-bilhetagem" class="tab-pane fade">
                        <br>
                        <div class="booking-review">
                            <h4 class="booking-review-title">Informações pessoais</h4>
                            <div class="booking-review-content">
                                <div class="review-section">
                                    Bilhetagem
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-lg mr-auto previous"><i class="fa fa-backward"></i> VOLTAR
                        </button>

                        <button type="button" class="btn btn-lg btn-primary mr-center" style="display: none;"
                                id="bookingSave"><i class="fa fa-save"></i> CONCLUIR RESERVA
                        </button>

                        <button type="button" class="btn btn-lg btn-secondary mr-center" data-dismiss="modal"><i
                                class="fa fa-close"></i> CANCELAR RESERVA
                        </button>
                        <button class="btn btn-primary btn-lg next"> PRÓXIMO <i class="fa fa-forward"></i></button>
                    </div>
                </div>

                <link rel="stylesheet" href="{{asset('module/booking/css/modal-booking.css')}}"/>
            </div>
        </div>
    </div>
</div>

@include('User::admin/form-register/index')
