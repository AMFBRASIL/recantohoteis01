<div class="form-group">
    <label>{{__("Tarifador Name")}}</label>
    <input type="text" value="{{$row->name}}" placeholder="" name="name"
           class="form-control input-border">
</div>

<div class="form-group">
    <label> Lotação Start </label>
    <div class="input-group">
        <input type="number" value="{{$row->tariff_start}}" placeholder="" name="tariff_start" class="form-control input-border">
    </div>
</div>

<div class="form-group">
    <label> Lotação End </label>
    <div class="input-group">
        <input type="number" value="{{$row->tariff_end}}" placeholder="" name="tariff_end" class="form-control input-border">
    </div>
</div>

<div class="form-group">
    <label for="reserva_situacao">Percentual Aplicar na Tarifa</label><br>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">%</span>
        </div>
        <input type="text" name="percentage_tariff" placeholder="99,99" class="form-control moeda-real input-border"
               value="{{$row->percentage_tariff}}">
    </div>
</div>

<div class="form-group">
    <label> Categoria do Hospede </label>
    <div class="input-group">
        <select name="guest_category" class="form-control  input-border">
            <option value="">Selecione Categoria do Hospede</option>
            <option {{ $row->guest_category == "Adulto" ? "selected":""}} value="Adulto"> Adulto</option>
            <option {{ $row->guest_category == "Criança 0 a 5" ? "selected":""}} value="Criança 0 a 5"> Criança 0 a 5</option>
            <option {{ $row->guest_category == "Criança 6 a 12" ? "selected":""}} value="Criança 6 a 12"> Criança 6 a 12</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label> Classificação Apartamento </label>
    <div class="input-group">
        <select class="form-control input-border" name="classification_id">
            @foreach ($classificationList as $option)
                @if ($row->classification_id == $option->id)
                    <option value="{{$option->id}}" selected>{{$option->name}}</option>
                @else
                    <option value="{{$option->id}}">{{$option->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label> Caracteristica Apartamento </label>
    <div class="input-group">
        <select class="form-control input-border" name="characteristic_id">
            @foreach ($characteristicList as $option)
                @if ($row->characteristic_id == $option->id)
                    <option value="{{$option->id}}" selected>{{$option->name}}</option>
                @else
                    <option value="{{$option->id}}">{{$option->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label> Situação</label>
    <div class="input-group">
        <select class="form-control input-border" name="situation_id">
            @foreach ($situationList as $option)
                @if ($row->situation_id == $option->id)
                    <option value="{{$option->id}}" selected>{{$option->name}}</option>
                @else
                    <option value="{{$option->id}}">{{$option->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<hr>

<table class="table table-hover">
    <thead>
        <tr>
            <th width="40px">SEGUNDA</th>
            <th width="40px">TERCA</th>
            <th width="40px">QUARTA</th>
            <th width="40px">QUINTA</th>
        </tr>
    </thead>
    <tbody>
        <tr class="publish">
            <td class="title">
                <input type="checkbox" id="is_monday" value="{{$row->is_monday}}"
                       data-toggle="toggle" data-on="SIM" data-off="NÃO"
                       data-onstyle="success" data-offstyle="danger">
                <input type='hidden' id="is_monday_input" name="is_monday">
            </td>
            <td class="title">
                <input type="checkbox" id="is_tuesday" value="{{$row->is_tuesday}}"
                       data-toggle="toggle" data-on="SIM" data-off="NÃO"
                       data-onstyle="success" data-offstyle="danger">
                <input type='hidden' id="is_tuesday_input" name="is_tuesday">
            </td>
            <td class="title">
                <input type="checkbox" id="is_wednesday" value="{{$row->is_wednesday}}"
                       data-toggle="toggle" data-on="SIM" data-off="NÃO"
                       data-onstyle="success" data-offstyle="danger">
                <input type='hidden' id="is_wednesday_input" name="is_wednesday">
            </td>
            <td class="title">
                <input type="checkbox" id="is_thursday" value="{{$row->is_thursday}}"
                       data-toggle="toggle" data-on="SIM" data-off="NÃO"
                       data-onstyle="success" data-offstyle="danger">
                <input type='hidden' id="is_thursday_input" name="is_thursday">
            </td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th width="40px">SEXTA</th>
            <th width="40px">SABADO</th>
            <th width="40px">DOMINGO</th>
        </tr>
    </thead>
    <tbody>
        <tr class="publish">
            <td class="title">
                <input type="checkbox" id="is_friday" value="{{$row->is_friday}}"
                       data-toggle="toggle" data-on="SIM" data-off="NÃO"
                       data-onstyle="success" data-offstyle="danger">
                <input type='hidden' id="is_friday_input" name="is_friday">
            </td>
            <td class="title">
                <input type="checkbox" id="is_saturday" value="{{$row->is_saturday}}"
                       data-toggle="toggle" data-on="SIM" data-off="NÃO"
                       data-onstyle="success" data-offstyle="danger">
                <input type='hidden' id="is_saturday_input" name="is_saturday">
            </td>
            <td class="title">
                <input type="checkbox" id="is_sunday" value="{{$row->is_sunday}}"
                       data-toggle="toggle" data-on="SIM" data-off="NÃO"
                       data-onstyle="success" data-offstyle="danger">
                <input type='hidden' id="is_sunday_input" name="is_sunday">
            </td>
        </tr>
    </tbody>
</table>
<hr>
