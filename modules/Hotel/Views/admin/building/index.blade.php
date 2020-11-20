@extends('Base::admin.index_create')
@section('admin-form-content')
    <div class="form-group">
        <label>{{__("Nome")}}</label>
        <input type="text" value="{{isset($row) ? $row->name : ''}}" placeholder="{{__("Nome")}}" name="name" class="form-control">
    </div>
    <div class="">
        <button class="btn btn-primary" type="submit">{{__("Adicionar")}}</button>
    </div>
@endsection

@section('admin-search-content')
    <thead>
    <tr>
        <th width="60px"><input type="checkbox" class="check-all"></th>
        <th width="100px"> {{ __('Nome')}}</th>
        <th width="100px"> {{ __('Status')}}</th>
        <th width="100px"> {{ __('Date')}}</th>
        <th width="100px"></th>
    </tr>
    </thead>
    <tbody>
    @if($rows->total() > 0)
        @foreach($rows as $row)
            <tr class="{{$row->status}}">
                <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
                <td class="title"> <a href="{{route($route_list['edit'],['id'=>$row->id])}}">{{$row->name}}</a></td>
                <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
                <td>{{ display_date($row->updated_at)}}</td>
                <td>
                    <a href="{{route($route_list['edit'],['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Editar')}}</a>
                    <a href="{{route('building_floor.admin.index',['parent'=>$row->id])}}" class="btn btn-success btn-sm"> {{__('Andares')}}</a>
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
