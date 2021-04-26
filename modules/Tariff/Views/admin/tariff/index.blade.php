@extends('admin.layouts.app')
@section('title','Financial')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"> {{ __('Tarifador do Hotel por Lotação')}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-4 mb40">
                <div class="panel">
                    <div class="panel-title"> {{ __('Add Tarifador por Lotação')}}</div>
                    <div class="panel-body">
                        <form action="{{route('tariff.admin.store',['id'=>-1])}}" method="post">
                            @csrf
                            @include('Tariff::admin.tariff.form')
                            <div class="">
                                <button class="btn btn-primary" type="submit">{{__("Add New")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        @if(!empty($rows))
                            <form method="post" action="{{route('tariff.admin.bulkEdit')}}"
                                  class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}
                                <select name="action" class="form-control">
                                    <option value="">{{__(" Ação em massa ")}}</option>
                                    <option value="delete">{{__(" Delete ")}}</option>
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}"
                                        class="btn-info btn btn-icon dungdt-apply-form-btn"
                                        type="button">{{__('Confirma')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-left">
                        <form method="get" action="{{route('tariff.admin.index')}} "
                              class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            @csrf
                            <input type="text" name="s" value="{{ Request()->s }}" class="form-control">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit"
                                    type="submit">{{__('Pesquisa de Tarifador')}}</button>
                        </form>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th width="100px"> TARIFADOR</th>
                                    <th width="200px"> Lotação Hotel</th>
                                    <th width="370px">
                                        <span data-toggle="tooltip" data-placement="top" data-html="true"
                                              data-title=" <h6> P = Percentual Acrescentar na Taxa <br> C = Classificação do Quarto <br> C = Caracteristica <br> P = Pessoa  </h6> ">
                                            P / C / C / P
                                        </span>
                                    </th>
                                    <th><span data-toggle="tooltip" data-placement="top" data-html="true" title=""
                                              data-original-title=" <h6> Segunda-Feira "> Seg </span></th>
                                    <th><span data-toggle="tooltip" data-placement="top" data-html="true" title=""
                                              data-original-title=" <h6> Terça-Feira ">Ter </span></th>
                                    <th><span data-toggle="tooltip" data-placement="top" data-html="true" title=""
                                              data-original-title=" <h6> Quarta-Feira ">Qua </span></th>
                                    <th><span data-toggle="tooltip" data-placement="top" data-html="true" title=""
                                              data-original-title=" <h6> Quinta-Feira ">Qui </span></th>
                                    <th><span data-toggle="tooltip" data-placement="top" data-html="true" title=""
                                              data-original-title=" <h6> Sexta-Feira ">Sex </span></th>
                                    <th><span data-toggle="tooltip" data-placement="top" data-html="true" title=""
                                              data-original-title=" <h6> Sábado ">Sab </span></th>
                                    <th><span data-toggle="tooltip" data-placement="top" data-html="true" title=""
                                              data-original-title=" <h6> Domingo ">Dom </span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <tr class="{{$row->status}}">
                                            <td><input type="checkbox" name="ids[]" class="check-item"
                                                       value="{{$row->id}}"></td>
                                            <td class="title"><a
                                                    href="{{route($route_list['edit'],['id'=>$row->id])}}">{{$row->name}}</a>
                                            </td>
                                            <td class="title">{{$row->tariff_start}} <i class="fa fa-arrows-h"
                                                                                        aria-hidden="true"></i> {{$row->tariff_end}}
                                                Quartos
                                            </td>
                                            <th>
                                                <span class="badge badge-primary">{{$row->percentage_tariff}}%</span>
                                                <span class="badge badge-primary">{{$row->classification->name}}</span>
                                                <span class="badge badge-primary">{{$row->characteristic->name}}</span>
                                                <span class="badge badge-primary">{{$row->guest_category}}</span>
                                            </th>
                                            <td>
                                                @if($row->is_monday == 'S')
                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->is_tuesday == 'S')
                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->is_wednesday == 'S')
                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->is_thursday == 'S')
                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->is_friday == 'S')
                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->is_saturday == 'S')
                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->is_sunday == 'S')
                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{route($route_list['edit'],['id'=>$row->id])}}"
                                                   class="btn btn-primary btn-sm"><i
                                                        class="fa fa-edit"></i> {{__('Editar')}}
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
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script.head')
    <link rel="stylesheet" href="{{asset('css/input.css')}}">
    <link rel="stylesheet" href="{{asset('libs/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.css')}}"/>
@endsection

@section ('script.body')
    <script src="{{asset('libs/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.js')}}"></script>
    <script src="{{asset('module/tariff/js/form.js')}}"></script>
@endsection
