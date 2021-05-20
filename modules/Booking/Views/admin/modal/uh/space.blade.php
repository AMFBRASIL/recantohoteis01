<hr>
<br>
<label id="label-uh"><h3>Reserva :: Chacaras</h3></label>
<div id="div-uh" class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="60px"><input type="checkbox" class="check-all"></th>
                        <th width="180px">EMPREEENDIMENTO</th>
                        <th width="70px">Nro. Bed </th>
                        <th width="70px">Nro. Bathroom </th>
                        <th width="110px">TARIFA DIARIA </th>
                        <th width="110px">ACOMODAÇÕES</th>
                        <th width="110px">SITUAÇÃO</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($spaces) > 0)
                    @foreach($spaces as $space)
                        <tr class="publish">
                            <td>
                                <input type="checkbox" class="check-item" name="ids[]" value="3">
                            </td>
                            <td class="title"> <a href="#">{{$space->title}}</a></td>
                            <td><span class="badge badge-primary">{{$space->bed}}</span></td>
                            <td><span class="badge badge-primary">{{$space->bathroom}}</span></td>
                            <td><span class="badge badge-danger">{{format_money($space->price)}}</span></td>
                            <td><span class="badge badge-primary">{{$space->max_guests}} PESSOAS</span></td>
                            <td><span class="badge badge-publish">LIBERADO</span></td>
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
