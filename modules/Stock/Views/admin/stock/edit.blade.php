@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Local de Estoque")}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-12 mb40">
                <div class="panel">
                    <div class="panel-title">{{__("Local de Estoque")}}</div>
                    <div class="panel-body">
                        <form action="{{route('stock.admin.store',['id'=>isset($row) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>{{__("Nome")}}</label>
                                <input type="text" value="{{isset($row) ? $row->description : ''}}" placeholder="{{__("Nome")}}" name="description" class="form-control">
                            </div>
                            <div class="">
                                <button class="btn btn-primary" type="submit">{{__("Salvar")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
