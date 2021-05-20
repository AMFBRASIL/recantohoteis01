<hr>
<br>
<label id="label-uh"><h3>Reserva :: Day USE</h3></label>
<div id="div-uh" class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="60px"><input type="checkbox" class="check-all"></th>
                        <th width="200px">SERVIÇO</th>
                        <th width="200px">TARIFA</th>
                        <th width="150px">PENSAO</th>
                        <th width="150px">SITUAÇÃO</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($tours) > 0)
                    @foreach($tours as $tour)
                        <tr class="publish">
                            <td>
                                <input type="checkbox" class="check-item" name="ids[]" value="3">
                            </td>
                            <td class="title"> <a href="#"> DAY USE </a></td>
                            <td><span class="badge badge-danger">{{format_money($tour->price)}}</span></td>
                            <td><span class="badge badge-publish"></span></td>
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
