@extends('admin.layouts.app')
@section('title','Financial')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"> {{ __('Centro de Custo')}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-4 mb40">
                <div class="panel">
                    <div class="panel-title"> {{ __('Add New')}}</div>
                    <div class="panel-body">
                        <form action="{{route('financial.admin.cost.center.store',['id'=>-1])}}" method="post">
                            @csrf
                            @include('Financial::admin/costCenter/form',['parents'=>$rows])
                            <div class="">
                                <button class="btn btn-primary" type="submit"> {{ __('Add')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
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
                                    {{--<option value="clone">{{__(" Clone")}}</option>--}}
                                    <option value="delete">{{__(" Delete ")}}</option>
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}"
                                        class="btn-info btn btn-icon dungdt-apply-form-btn"
                                        type="button">{{__('Apply')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-left">
                        <form method="get" action="{{url('/admin/module/financial/costCenter')}} "
                              class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            @csrf
                            @if(!empty($rows) and $cost_center_others)
                                <?php
                                $user = !empty(Request()->vendor_id) ? App\User::query()->find(Request()->vendor_id) : false;
                                \App\Helpers\AdminForm::select2('vendor_id', [
                                    'configs' => [
                                        'ajax'        => [
                                            'url'      => url('/admin/module/user/getForSelect2'),
                                            'dataType' => 'json',
                                            'data' => array("user_type"=>"vendor")
                                        ],
                                        'allowClear'  => true,
                                        'placeholder' => __('-- Vendor --')
                                    ]
                                ], !empty($user->id) ? [
                                    $user->id,
                                    $user->name_or_email . ' (#' . $user->id . ')'
                                ] : false)
                                ?>
                            @endif
                            <input type="text" name="s" value="{{ Request()->s }}" class="form-control" placeholder="Name">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit"
                                    type="submit">{{__('Search')}}</button>
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
                                    <th class="title"> {{ __('Name')}}</th>
                                    <th width="100px"> {{ __('Date')}}</th>
                                    <th width="100px">{{  __('Status')}}</th>
                                    <th width="200px"></th>
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
                                                <a href="{{$row->getEditUrl()}}">{{$row->name}}</a>
                                            </td>
                                            <td> {{ display_date($row->updated_at)}}</td>
                                            <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span>
                                            </td>
                                            <td>
                                                <a href="{{route('financial.admin.cost.center.edit',['id'=>$row->id])}}"
                                                   class="btn btn-primary btn-sm"><i
                                                        class="fa fa-edit"></i> {{__('Edit')}}</a>
                                                <a href="{{route('financial.admin.cost.center.sub',['id'=>$row->id])}}"
                                                   class="btn btn-success btn-sm">{{__('Sub Custo')}}</a>
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
