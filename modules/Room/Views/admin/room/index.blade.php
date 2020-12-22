@extends('Base::admin.index_create')
@section('admin-form-content')
    <div class="form-group">
        <label>{{__("Número")}}</label>
        <input type="text" value="{{isset($row) ? $row->number : ''}}" placeholder="{{__("Numero")}}" name="number" class="form-control">
    </div>
    <div class="form-group">
        <label>{{__("Bloco do Quarto")}}</label>
        <select
            class="form-control building dungdt-select2-field"
            data-options='{"ajax":{"url":"/admin/module/hotel/building/get-select","dataType":"json"},"allowClear":true,"placeholder":"-- Digite para pesquisar --"}'
            name="building_id"
        >
        </select>
    </div>
    <div class="form-group">
        <label>{{__("Andar do Quarto")}}</label>
        <select class="form-control building_floor" name="building_floor_id"></select>
    </div>
    <div class="">
        <button class="btn btn-primary" type="submit">{{__("Adicionar")}}</button>
    </div>
@endsection

@section('admin-search-content')
    <thead>
    <tr>
        <th width="60px"><input type="checkbox" class="check-all"></th>
        <th width="100px"> {{ __('Numero')}}</th>
        <th width="100px"> {{ __('Bloco')}}</th>
        <th width="100px"> {{ __('Andar')}}</th>
        <th width="100px"></th>
    </tr>
    </thead>
    <tbody>
    @if($rows->total() > 0)
        @foreach($rows as $row)
            <tr class="{{$row->status}}">
                <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
                <td class="title"> <a href="{{route($route_list['edit'],['id'=>$row->id])}}">{{$row->number}}</a></td>
                <td>{{ $row->building->name }}</td>
                <td>{{ $row->buildingFloor->name }}</td>
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

@section ('script.body')
    <script>
        jQuery(function ($) {
            $('.building').on('change', function() {
                $('.building_floor').select2({
                    ajax: {
                        url: '/admin/module/hotel/building/'+$(this).val()+'/floor/get-select',
                        dataType: 'json'
                    }
                });
            })
        });
    </script>
@endsection
