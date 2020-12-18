@extends('admin.layouts.app')

@section('content')
    <form action="{{route($route_list['store'],['parent' => isset($parent) ? $parent->id : '', 'id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? __('Edit: ') . $row : __("Adicionar {$page_title}")}}</h1>
                </div>
            </div>
            @include('admin.message')
            @if($row->id)
                @include('Language::admin.navigation')
            @endif
            <div class="lang-content-box">
                <div class="row">
                    @yield('admin-content')
                </div>
           </div>
        </div>
    </form>
    @yield('modal')
@endsection
