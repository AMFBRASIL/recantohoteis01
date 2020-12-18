@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{!empty($recovery) ? __('Recovery') : __("{$page_title}")}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-4 mb40">
                <div class="panel">
                    <div class="panel-title">{{__("Adicionar {$page_title}")}}</div>
                    <div class="panel-body">
                        <form action="{{route($route_list['store'],['parent' => isset($parent) ? $parent->id : '', 'id' => '-1','lang'=>request()->query('lang')])}}" method="post">
                            @csrf
                            @yield('admin-form-content')
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        @if(!empty($rows))
                            <form method="post" action="{{route($route_list['bulk'])}}" class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}
                                <select name="action" class="form-control">
                                    <option value="">{{__(" Ação em Massa ")}}</option>
                                    <option value="publish">{{__(" Publicar ")}}</option>
                                    <option value="draft">{{__(" Mover para Rascunho ")}}</option>
                                    <option value="pending">{{__("Mover para Pendente")}}</option>
                                    <option value="clone">{{__(" Clonar ")}}</option>
                                    @if(!empty($recovery))
                                        <option value="recovery">{{__(" Recovery ")}}</option>
                                    @else
                                        <option value="delete">{{__(" Deletar ")}}</option>
                                    @endif
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Confirmar')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-left">
                        <form method="get" action="{{ !empty($recovery) ? route($route_list['recovery']) : route($route_list['index'], isset($parent) ? ['parent' => $parent->id] : [])}}" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                            @if(!empty($rows) and $permission_manage)
                                <?php
                                $user = !empty(Request()->vendor_id) ? App\User::find(Request()->vendor_id) : false;
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
                            <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Buscar por nome')}}" class="form-control">
                            <button class="btn-info btn btn-icon btn_search" type="submit">{{__('Buscar')}}</button>
                        </form>
                    </div>
                </div>
                <div class="text-right">
                    <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                @yield('admin-search-content')
                            </table>
                            </div>
                        </form>
                        {{$rows->appends(request()->query())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
