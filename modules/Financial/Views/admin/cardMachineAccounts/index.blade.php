@extends('admin.layouts.app')
@section('title','Financial')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"> {{ __('Conta Máquina Cartão')}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-title"> {{ __('Add Máquina Cartão')}}</div>
                    <div class="panel-body">
                        <form action="{{route('financial.admin.card.machine.account.store',['id'=>-1])}}" method="post">
                            @csrf
                            @include('Financial::admin/cardMachineAccounts/form',['bankAccountList' => $bankAccountList, 'paymentMethodList' => $paymentMethodList,])
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
                            <form method="post" action="{{url('admin/module/financial/cardMachineAccount/bulkEdit')}}"
                                  class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}
                                <select name="action" class="form-control">
                                    <option value="">{{__(" Bulk Action ")}}</option>
                                    <option value="delete">{{__(" Delete ")}}</option>
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-left">
                        <form method="get" action="{{url('/admin/module/financial/cardMachineAccount')}} " class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            @csrf
                            <input type="text" name="s" value="{{ Request()->s }}" class="form-control">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit" type="submit">{{__('Search Machine Account')}}</button>
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
                                    <th class="title"> {{ __('Maquina')}}</th>
                                    <th class="title"> {{ __('Conta')}}</th>
                                    <th class="title"> {{ __('Cartão')}}</th>
                                    <th class="title"> {{ __('Taxa')}}</th>
                                    <th class="title"> {{ __('Dias')}}</th>
                                    <th class="title"> {{ __('Suporte')}}</th>
                                    <th class="title"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($rows) > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}">
                                            </td>
                                            <td class="title">
                                                <a href="{{$row->getEditUrl()}}">{{$row->name}}</a>
                                            </td>
                                            <td class="title">
                                                @if ($row->bankAccount)
                                                    <a>{{$row->bankAccount->bank}}</a>
                                                @endif
                                            </td>
                                            <td class="title">
                                                @if ($row->paymentMethod)
                                                    <a>{{$row->paymentMethod->name}}</a>
                                                @endif
                                            </td>
                                            <td class="title">
                                                <a>{{$row->rate}}%</a>
                                            </td>
                                            <td class="title">
                                                <a>{{$row->days}}</a>
                                            </td>
                                            <td class="title">
                                                <a>{{$row->phone_support}}</a>
                                            </td>
                                            <td>
                                                <a href="{{route('financial.admin.card.machine.account.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Edit')}}</a>
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
@endsection


