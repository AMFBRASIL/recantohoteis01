@extends('admin.layouts.app')
@section('title','Pos')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"> {{ __('Senha Autorizacao Geral Sistema')}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-title"> {{ __('Add Senha Autorizacao')}}</div>
                    <div class="panel-body">
                        <form action="{{route('pos.admin.authorization.password.store',['id'=>-1])}}" method="post">
                            @csrf
                            @include('Pos::admin/authorizationPassword/form',['parents'=>$rows])
                            <div class="">
                                <button class="btn btn-primary" type="submit"> {{ __('Add New')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                            @if(!empty($rows))
                                <form method="post" action="{{url('admin/module/pos/authorizationPassword/bulkEdit')}}"
                                      class="filter-form filter-form-left d-flex justify-content-start">
                                    {{csrf_field()}}
                                    <select name="action" class="form-control">
                                        <option value="">{{__(" Ação em Massa ")}}</option>
                                        <option value="delete">{{__(" Delete ")}}</option>
                                    </select>
                                    <button data-confirm="{{__("Do you want to delete?")}}"
                                            class="btn-info btn btn-icon dungdt-apply-form-btn"
                                            type="button">{{__('Confirmar')}}</button>
                                </form>
                            @endif
                    </div>
                    <div class="col-left">
                        <form method="get" action="{{url('/admin/module/pos/authorizationPassword')}} "
                              class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            @csrf
                            <input type="text" name="s" value="{{ Request()->s }}" class="form-control"
                                   placeholder="">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit"
                                    type="submit">{{__('Pesquisa de Situação')}}</button>
                        </form>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="W0%"> {{__("SENHA")}}</th>
                                    <th width="20%"> {{__("DATA EXPIRAÇÃO")}} </th>
                                    <th width="15%"> {{__("SITUAÇÃO")}} </th>
                                    <th width="10%"> {{__("OBS.")}} </th>
                                    <th width="20%"> {{__("DATA CADASTRO")}} </th>
                                    <th width="10%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($rows) > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td class="title">
                                                <a href="#">{{ $row->password }}</a>
                                            </td>
                                            <td class="title">
                                                <a href="#">{{$row->expiration_date->format('d/m/y H:m:s')}}</a>
                                            </td>
                                            <td class="title">
                                                @if ($row->situation)
                                                    <span class="badge badge-{{$row->situation->label}}"
                                                          style="text-transform: uppercase">{{$row->situation->name}}</span>
                                                @endif
                                            </td>
                                            <td class="title">
                                                <a href="#" class="review-count-approved" data-toggle="modal"
                                                   data-target="#observacao">
                                                    Ver mais
                                                </a>
                                            </td>
                                            <td class="title">
                                                <a href="#">{{$row->created_at->format('d/m/y H:m:s')}}</a>
                                            </td>
                                            <td>
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        Ação
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item" href="#">
                                                            Edit Senha
                                                        </a>
                                                        <a class="dropdown-item" data-toggle="modal"
                                                           data-target="#expirationPassword">
                                                            Expirar Senha
                                                        </a>
                                                        <a class="dropdown-item"  data-toggle="modal"
                                                           data-target="#RenovationPassword">
                                                            Renovar + 10 dias
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">{{__("No data")}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="observacao" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("Observações do Cliente")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            {!! $row->internal_observations  !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("FECHAR")}}</button>
                </div>
            </div>
        </div>
    </div>

    <div id="RenovationPassword" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("Renovação de Senha")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p>{{__("Deseja Renovar a Senha em 10 dias?")}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{route('pos.admin.authorization.password.renovation',['id'=>$row->id])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">{{__("CONFIRMAR")}}</button>
                    </form>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("FECHAR")}}</button>
                </div>
            </div>
        </div>
    </div>

    <div id="expirationPassword" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("Experição de senha")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p>{{__("Deseja Expirar Senha selecionada?")}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{route('pos.admin.authorization.password.expiration',['id'=>$row->id])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">{{__("CONFIRMAR")}}</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("FECHAR")}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

