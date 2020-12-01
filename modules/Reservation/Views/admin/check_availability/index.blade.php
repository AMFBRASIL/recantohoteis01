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
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_reservation">{{__("Nova Reserva")}}</button>
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
			         <div class="col-lg-2 col-md-3 col-sm-4 rooms-title">
			            <div class="room-title bg-info text-info" id="room-title-1">
			               Deluxe Double Bedroom                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-1-0">DDB #1</span>
			            </div>
			            <div class="room-title bg-info text-info" id="room-title-13">
			               Deluxe room                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-13-0">DR #1</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-13-1">DR #2</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-13-2">DR #3</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-13-3">DR #4</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-13-4">DR #5</span>
			            </div>
			            <div class="room-title bg-info text-info" id="room-title-6">
			               Double Bedroom                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-6-0">DB #1</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-6-1">DB #2</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-6-2">DB #3</span>
			            </div>
			            <div class="room-title bg-info text-info" id="room-title-11">
			               Family room suite                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-11-0">FRS #1</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-11-1">FRS #2</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-11-2">FRS #3</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-11-3">FRS #4</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-11-4">FRS #5</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-11-5">FRS #6</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-11-6">FRS #7</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-11-7">FRS #8</span>
			            </div>
			            <div class="room-title bg-info text-info" id="room-title-4">
			               Luxury bungalow                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-4-0">LB #1</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-4-1">LB #2</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-4-2">LB #3</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-4-3">LB #4</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-4-4">LB #5</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-4-5">LB #6</span>
			            </div>
			            <div class="room-title bg-info text-info" id="room-title-2">
			               Luxury suite                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-2-0">LS #1</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-2-1">LS #2</span>
			            </div>
			            <div class="room-title bg-info text-info" id="room-title-12">
			               Royal room suite                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-12-0">RRS #1</span>
			            </div>
			            <div class="room-title bg-info text-info" id="room-title-3">
			               Royal suite                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-3-0">RS #1</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-3-1">RS #2</span>
			            </div>
			            <div class="room-title bg-info text-info" id="room-title-5">
			               Single room                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-5-0">SR #1</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-5-1">SR #2</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-5-2">SR #3</span>
			            </div>
			            <div class="room-title bg-info text-info" id="room-title-9">
			               Standard double room                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-9-0">SDR #1</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-9-1">SDR #2</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-9-2">SDR #3</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-9-3">SDR #4</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-9-4">SDR #5</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-9-5">SDR #6</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-9-6">SDR #7</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-9-7">SDR #8</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-9-8">SDR #9</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-9-9">SDR #10</span>
			            </div>
			            <div class="room-title bg-info text-info" id="room-title-8">
			               Suite room                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-8-0">SR #1</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-8-1">SR #2</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-8-2">SR #3</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-8-3">SR #4</span>
			            </div>
			            <div class="room-title bg-info text-info" id="room-title-7">
			               Twin en-suite room                                                
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-0">TER #1</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-1">TER #2</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-2">TER #3</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-3">TER #4</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-4">TER #5</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-5">TER #6</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-6">TER #7</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-7">TER #8</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-8">TER #9</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-9">TER #10</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-10">TER #11</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-11">TER #12</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-12">TER #13</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-13">TER #14</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-14">TER #15</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-15">TER #16</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-16">TER #17</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-17">TER #18</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-18">TER #19</span>
			            </div>
			            <div class="room-label">
			               <span id="room-num-7-19">TER #20</span>
			            </div>
			         </div>
			         <div class="col-lg-10 col-md-9 col-sm-8 timeline-wrapper">
			            <div class="timeline-row" style="width: 1736px;">
			               <div class="timeline-cel timeline-d today">
			                  <b>WED</b><br>25/11<br>
			                  <div class="badge">0</div>
			                  <a href="#" onclick="return false;" class="ajax-popup-link" data-params="date=1606262400" data-toggle="modal" data-target="#check_in_check_out">
			                     <div class="badge badge-checkout">2</div>
			                  </a>
			                  <div class="">
			                     0%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>THU</b><br>26/11<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     0%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>FRI</b><br>27/11<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     0%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d bg-warning">
			                  <b>SAT</b><br>28/11<br>
			                  <a href="#" onclick="return false;" class="ajax-popup-link" data-params="date=1606521600" data-toggle="modal" data-target="#check_in_check_out">
			                     <div class="badge badge-checkin">2</div>
			                  </a>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d bg-warning">
			                  <b>SUN</b><br>29/11<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>MON</b><br>30/11<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>TUE</b><br>01/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>WED</b><br>02/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>THU</b><br>03/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>FRI</b><br>04/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d bg-warning">
			                  <b>SAT</b><br>05/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d bg-warning">
			                  <b>SUN</b><br>06/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>MON</b><br>07/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>TUE</b><br>08/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>WED</b><br>09/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>THU</b><br>10/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>FRI</b><br>11/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d bg-warning">
			                  <b>SAT</b><br>12/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d bg-warning">
			                  <b>SUN</b><br>13/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>MON</b><br>14/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>TUE</b><br>15/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>WED</b><br>16/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>THU</b><br>17/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>FRI</b><br>18/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d bg-warning">
			                  <b>SAT</b><br>19/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d bg-warning">
			                  <b>SUN</b><br>20/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>MON</b><br>21/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>TUE</b><br>22/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>WED</b><br>23/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>THU</b><br>24/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			               <div class="timeline-cel timeline-d">
			                  <b>FRI</b><br>25/12<br>
			                  <div class="badge">0</div>
			                  <div class="badge">0</div>
			                  <div class="">
			                     3.08%
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-1-1-0-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-1-1-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-1-0-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 172</div>
			                     <div></div>
			                     <span class="text-muted">5</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-7-13-0-1606262400" class="timeline-cel timeline-default end-d today">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link  checked-out" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2242" data-tippy-content="<b>z asdasd</b><br>#2242<br>2020-10-27 → 2020-11-25<br>Total: $ 5,478.63"></a>                                                                
			                  </div>
			                  <div id="cel-7-13-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-0-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-7-13-1-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-7-13-1-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-1-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-7-13-2-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-7-13-2-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-2-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-7-13-3-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-7-13-3-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-3-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-7-13-4-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-7-13-4-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-7-13-4-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 250</div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 250</div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 250</div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 250</div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 142.20</div>
			                     <div><s class="text-warning">$ 158</s></div>
			                     <span class="text-muted">3</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-2-6-0-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-2-6-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-0-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-2-6-1-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-2-6-1-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-1-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-2-6-2-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-2-6-2-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-2-6-2-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 289</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-5-11-0-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-5-11-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-0-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-5-11-1-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-5-11-1-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-1-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-5-11-2-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-5-11-2-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-2-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-5-11-3-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-5-11-3-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-3-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-5-11-4-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-5-11-4-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-4-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-5-11-5-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-5-11-5-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-5-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-5-11-6-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-5-11-6-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-6-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-5-11-7-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-5-11-7-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-5-11-7-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">6</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-3-4-0-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-3-4-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-0-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-3-4-1-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-3-4-1-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-1-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-3-4-2-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-3-4-2-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-2-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-3-4-3-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-3-4-3-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-3-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-3-4-4-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-3-4-4-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-4-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-3-4-5-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-3-4-5-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-4-5-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 225</div>
			                     <div><s class="text-warning">$ 250</s></div>
			                     <span class="text-muted">2</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-1-2-0-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-1-2-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-0-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-1-2-1-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-1-2-1-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-2-1-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 1,490</div>
			                     <div></div>
			                     <span class="text-muted">1</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-6-12-0-1606262400" class="timeline-cel timeline-default end-d today">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link  checked-out" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2258" data-tippy-content="<b>test test</b><br>#2258<br>2020-10-31 → 2020-11-25<br>Total: $ 37,705" data-toggle="tooltip"></a>                                                                
			                  </div>
			                  <div id="cel-6-12-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-6-12-0-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 290</div>
			                     <div></div>
			                     <span class="text-muted">2</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-1-3-0-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-1-3-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-0-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-1-3-1-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-1-3-1-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-1-3-1-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div></div>
			                     <div></div>
			                     <span class="text-muted">3</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-3-5-0-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-3-5-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-0-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-3-5-1-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-3-5-1-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-1-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-3-5-2-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-3-5-2-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-3-5-2-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">10</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">10</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">10</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 129</div>
			                     <div></div>
			                     <span class="text-muted">8</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-9-9-0-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-9-9-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-0-1606521600" class="timeline-cel timeline-default booked start-d confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1606608000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1606694400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1606780800" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1606867200" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1606953600" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607040000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607126400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607212800" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607299200" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607385600" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607472000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607558400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607644800" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607731200" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607817600" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607904000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1607990400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1608076800" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1608163200" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1608249600" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1608336000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1608422400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1608508800" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1608595200" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1608681600" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1608768000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-0-1608854400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-9-9-1-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-9-9-1-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-1-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-1-1606521600" class="timeline-cel timeline-default booked start-d confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1606608000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1606694400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1606780800" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1606867200" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1606953600" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607040000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607126400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607212800" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607299200" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607385600" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607472000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607558400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607644800" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607731200" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607817600" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607904000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1607990400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1608076800" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1608163200" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1608249600" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1608336000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1608422400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1608508800" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1608595200" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1608681600" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1608768000" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			                  <div id="cel-9-9-1-1608854400" class="timeline-cel timeline-default booked full confirmed">
			                     <a data-html="true" data-container="body" class="tips ajax-popup-link confirmed" href="#" onclick="return false" data-toggle="modal" data-target="#booking_summary" title="" data-params="id=2287" data-tippy-content="<b>ddkdj kekke</b><br>#2287<br>2020-11-28 → 2020-12-29<br>Total: $ 8,844.30"></a>                                                                
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-9-9-2-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-9-9-2-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-2-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-9-9-3-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-9-9-3-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-3-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-9-9-4-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-9-9-4-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-4-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-9-9-5-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-9-9-5-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-5-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-9-9-6-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-9-9-6-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-6-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-9-9-7-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-9-9-7-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-7-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-9-9-8-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-9-9-8-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-8-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-9-9-9-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-9-9-9-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-9-9-9-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 810</div>
			                     <div></div>
			                     <span class="text-muted">4</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-4-8-0-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-4-8-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-0-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-4-8-1-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-4-8-1-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-1-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-4-8-2-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-4-8-2-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-2-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-4-8-3-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-4-8-3-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-4-8-3-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			            <div class="room-row">
			               <div class="timeline-row" style="width: 1736px;">
			                  <div class="timeline-cel timeline-price today">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price bg-warning">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			                  <div class="timeline-cel timeline-price">
			                     <div>$ 109</div>
			                     <div></div>
			                     <span class="text-muted">20</span>
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-0-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-0-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-0-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-1-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-1-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-1-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-2-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-2-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-2-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-3-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-3-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-3-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-4-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-4-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-4-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-5-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-5-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-5-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-6-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-6-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-6-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-7-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-7-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-7-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-8-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-8-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-8-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-9-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-9-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-9-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-10-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-10-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-10-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-11-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-11-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-11-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-12-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-12-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-12-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-13-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-13-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-13-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-14-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-14-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-14-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-15-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-15-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-15-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-16-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-16-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-16-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-17-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-17-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-17-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-18-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-18-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-18-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			               <div class="timeline-row" style="width: 1736px;">
			                  <div id="cel-8-7-19-1606262400" class="timeline-cel timeline-default today">
			                  </div>
			                  <div id="cel-8-7-19-1606348800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1606435200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1606521600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1606608000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1606694400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1606780800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1606867200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1606953600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607040000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607126400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607212800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607299200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607385600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607472000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607558400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607644800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607731200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607817600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607904000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1607990400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1608076800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1608163200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1608249600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1608336000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1608422400" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1608508800" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1608595200" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1608681600" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1608768000" class="timeline-cel timeline-default">
			                  </div>
			                  <div id="cel-8-7-19-1608854400" class="timeline-cel timeline-default">
			                  </div>
			               </div>
			            </div>
			         </div>
			      </div>
			      <div class="row block-row">


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
		                  <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
		                     <path fill="currentColor" d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
		                  </svg>
		                  <!-- <i class="fas fa-caret-left"></i> --> Day / Date
		               </div>
		               <div class="legend-label">
		                  <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
		                     <path fill="currentColor" d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
		                  </svg>
		                  <!-- <i class="fas fa-caret-left"></i> --> Number of check-in
		               </div>
		               <div class="legend-label">
		                  <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
		                     <path fill="currentColor" d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
		                  </svg>
		                  <!-- <i class="fas fa-caret-left"></i> --> Number of check-out
		               </div>
		               <div class="legend-label">
		                  <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
		                     <path fill="currentColor" d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
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
		                  <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
		                     <path fill="currentColor" d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
		                  </svg>
		                  <!-- <i class="fas fa-caret-left"></i> --> Price per night
		               </div>
		               <div class="legend-label">
		                  <svg class="svg-inline--fa fa-caret-left fa-w-6" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
		                     <path fill="currentColor" d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
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
            			   	  <span class="icon text-center text-primary pull-right"><i class="fa fa-print"></i></span>
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