<hr>
<br>
<label id="label-uh"><h3>Reserva :: Quartos / UHs </h3></label>
<div id="div-uh" class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="10px"><input type="checkbox" class="check-all"></th>
                    <th width="160px">UH <i class="fa fa-arrows-h" aria-hidden="true"></i> BLOCO
                        <i class="fa fa-arrows-h" aria-hidden="true"></i> ANDAR
                    </th>
                    <th width="30px">FOTO</th>
                    <th width="50px">CAPACIDADE</th>
                    <th width="160px" data-toggle="tooltip" data-placement="top"
                        data-html="true" title=""
                        data-original-title=" <h5> Caracteristica / Tipo / Tarifa UH  </h5> ">
                        CAC <i class="fa fa-arrows-h" aria-hidden="true"></i> TIPO <i
                            class="fa fa-arrows-h" aria-hidden="true"></i> TARIF
                    </th>
                    <th width="50px">TARIFADOR</th>
                    <th width="20px">SITUAÇÃO</th>
                </tr>
                </thead>
                <tbody>
                @if(count($rooms) > 0)
                    @foreach($rooms as $room)
                        <tr class="publish">
                            <td>
                                <input type="checkbox" class="check-item" name="room_id" value="{{$room->id}}">
                            </td>
                            <td class="title">
                                <span class="badge badge-primary">{{$room->room->number}}</span>
                                <span class="badge badge-primary">{{$room->room->building->name}}</span>
                                <span class="badge badge-primary">{{$room->room->buildingFloor->name}}</span>
                            </td>
                            <td class="title">
                                <a id="{{$room->id}}-popover" href="#" data-html="true" data-trigger="click" data-toggle="popover"
                                   title="" data-content="
                                   <h4> Quarto {{$room->room->number}} liberado para Uso</h4>
                                   <br>
                                   <b>Capacidade Hospedes:</b> {{$room->adults + $room->children}}
                                   <b>Adultos: </b> {{$room->adults}} <br>
                                   <b>Crianças: </b> {{$room->children}} <br>
                                   <br>
                                   <b>Detalhes Quarto:</b>  Quarto de {{$room->classification->name}} e {{$room->characteristic->name}}
                                   <br>
                                   <b>Valor Diário Comum :</b> {{format_money($room->price)}}
                                   <hr>
                                   <img src='{!! \Modules\Media\Helpers\FileHelper::url($room->image_id, "medium") !!}' width='550' height='300'>"
                                   data-original-title="">
                                   <i class="fa fa-info-circle fa-2x"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-placement="top" data-html="true"
                                   title=""
                                   data-original-title=" <h5> Informações: <br> Quarto : {{$room->classification->name}} <br> Berço: SIM <br> Caracteristica: {{$room->characteristic->name}}</h5> ">
                                    <i class="fa fa-lightbulb-o fa-2x"></i>
                                </a>

                            </td>
                            <td><span class="badge badge-publish">2</span></td>
                            <td>
                                <span class="badge badge-danger">{{$room->classification->name}}</span>
                                <span class="badge badge-danger">{{$room->characteristic->name}}</span>
                                <span class="badge badge-danger">{{format_money($room->price)}}</span>
                            </td>
                            <td><span class="badge badge-publish">TARIFADOR 1</span></td>
                            <td><span class="badge badge-publish">{{$room->situation->name}}</span></td>
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
