@extends('Base::admin.index_create')
@section('admin-form-content')
    <div class="form-group">
        <label>{{__("Pensão")}}</label>
        <input type="text" value="" placeholder="{{__("Nome")}}" name="name" class="form-control" style="text-transform: uppercase">
    </div>
    <div class="form-group">
        <label> Tarifa Diaria / Pessoa ( De 1 a 6 )  </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>
            <input type="text" name="daily_rate_40" placeholder="99,99" class="form-control moeda-real" value="">
        </div>
    </div>
    <div class="form-group">
        <label> Tarifa Diaria / Pessoa ( De 6 + )  </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>
            <input type="text" name="daily_rate_100" placeholder="99,99" class="form-control moeda-real" value="">
        </div>
    </div>
    <div class="form-group" id="dataLiberacao">
        <div class="form-group">
            <label class="control-label">Intervalo Inicial</label>
            <input type="time" name="start_time" placeholder="00:00" class="form-control" value="">
        </div>
    </div>
    <div class="form-group" id="dataLiberacao">
        <div class="form-group">
            <label class="control-label">Intervalo Final</label>
            <input type="time" name="end_date" placeholder="00:0-" class="form-control" value="">
        </div>
    </div>
    <div class="">
        <button class="btn btn-primary" type="submit">{{__("Adicionar")}}</button>
    </div>
@endsection

@section('admin-search-content')
    <thead>
    <tr>
        <th width="60px"><input type="checkbox" class="check-all"></th>
        <th width="100px"> {{ __('Pensão')}}</th>
        <th width="100px"> {{ __('Status')}}</th>
        <th width="100px"> {{ __('Tarifa Diaria / Pessoa')}} <br> {{ __('De 1 a 6 (40%)')}} </th>
        <th width="100px"> {{ __('Tarifa Diaria / Pessoa')}} <br> {{ __('De 1 a 6 (100%)')}} </th>
        <th width="100px"> {{ __('Intervalo Inicial')}}</th>
        <th width="100px"> {{ __('Intervalo Final')}}</th>
        <th width="100px"></th>
    </tr>
    </thead>
    <tbody>
    @if($rows->total() > 0)
        @foreach($rows as $row)
            <tr class="{{$row->status}}">
                <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
                <td class="title"> <a href="{{route($route_list['edit'],['id'=>$row->id])}}">{{strtoupper($row->name)}}</a></td>
                <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>

                <td><b>R$ {{$row->daily_rate_40_formatted}}</b></td>
                <td><b>R$ {{$row->daily_rate_100_formatted}}</b></td>
                <td>{{(new DateTime($row->start_time))->format('H:i A')}}</td>
                <td>{{(new DateTime($row->end_date))->format('H:i A')}}</td>
                <td>
                    <a href="{{route($route_list['edit'],['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Editar')}}
                    </a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7">{{__("Nenhum registro encontrado.")}}</td>
        </tr>
    @endif
    </tbody>
@endsection

@section('script.body')
    <script>
        $(function (){
            $('.moeda-real').mask('#.##0,00', {reverse: true});;
        });
    </script>
@endsection
