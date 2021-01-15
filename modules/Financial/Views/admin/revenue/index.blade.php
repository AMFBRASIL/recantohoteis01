@extends('admin.layouts.app')
@section('title','Financial')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"> {{ __('Todas as Receitas')}}</h1>
            <div class="title-actions">
                <a href="{{route('financial.admin.revenue.create')}}" class="btn btn-primary">{{__("Add Receita")}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-12">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        @if(!empty($rows))
                            <form method="post" action="{{url('admin/module/financial/costCenter/bulkEdit')}}"
                                  class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}
                                <select name="action" class="form-control">
                                    <option value="">{{__(" Bulk Action ")}}</option>
                                    <option value="publish">{{__(" Publish ")}}</option>
                                    <option value="draft">{{__(" Move to Draft ")}}</option>
                                    <option value="pending">{{__(" Move to Pending ")}}</option>
                                    <option value="clone">{{__(" Clone")}}</option>
                                    <option value="delete">{{__(" Delete ")}}</option>
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}"
                                        class="btn-info btn btn-icon dungdt-apply-form-btn"
                                        type="button">{{__('Apply')}}</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th> {{ __('Número')}}</th>
                                    <th> {{ __('Criando em')}}</th>
                                    <th> {{ __('Data Competência')}}</th>
                                    <th> {{ __('Historico')}}</th>
                                    <th> {{ __('Conta Bancária')}}</th>
                                    <th> {{ __('Centro de Custo')}}</th>
                                    <th> {{ __('Valor')}}</th>
                                    <th>{{  __('Status')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($rows) > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check-item" name="ids[]"
                                                       value="{{$row->id}}">
                                            </td>
                                            <td class="title">
                                                <a id="numero" href="#">{{$row->id}} </a>
                                            </td>
                                            <td> {{ display_date($row->created_at->format('d/m/y'))}}</td>
                                            <td> {{ display_date($row->competency_date->format('d/m/y'))}}</td>
                                            <td class="title">
                                                <a href="#" class="review-count-approved " data-toggle="modal"
                                                   data-target="#historico">
                                                    Ver mais
                                                </a>
                                            </td>
                                            <td class="title">
                                                @if ($row->bankAccount)
                                                    <a>{{$row->bankAccount->bank}}</a>
                                                @endif
                                            </td>
                                            <td class="title">
                                                @if ($row->bankAccount)
                                                    <a>{{$row->bankAccount->bank}}</a>
                                                @endif
                                            </td>
                                            <td class="title">
                                                <a>{{$row->total_value}}</a>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $row->status }}">{{ $row->status }}</span>
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

    <div id="historico" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("Historico Receitas")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="row">
                                {!! $row->historical  !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('script.body')
    <script>
        $("#numero").val(("0000" + $("#numero")).slice(-4));
    </script>
@endsection
