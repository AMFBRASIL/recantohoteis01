@extends('admin.layouts.app')
@section('content')
    <form
        action="{{route('financial.admin.revenue.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? __('Edit: ').$row->name : __('Receitas')}}</h1>
                    @if($row->slug)
                        <p class="item-url-demo"> {{ __('Permalink:')}}
                            {{ url((request()->query('lang') ? request()->query('lang').'/' : '').config('financial.financial_route_prefix')."/".config('financial.financial_revenue_route_prefix')) }}
                            /<a href="#" class="open-edit-input" data-name="slug">{{$row->slug}}</a>
                        </p>
                    @endif
                </div>
                <div class="">
                    @if($row->slug)
                        <a class="btn btn-primary btn-sm" href="{{$row->getDetailUrl()}}"
                           target="_blank"> {{ __('View')}}</a>
                    @endif
                </div>
            </div>
            @include('admin.message')
            @include('Language::admin.navigation')
            <div class="lang-content-box">
                <div class="row">
                    <div class="col-md-9">
                        @include('Financial::admin/revenue/form')
                    </div>
                    <div class="col-md-3">
                        <div class="panel">
                            <div class="panel-title"><strong>{{ __('Publish')}}</strong></div>
                            <div class="panel-body">
                                @if(is_default_lang())
                                    <div class="form-group">
                                        <div>
                                            <label><input @if($row->status=='publish') checked @endif type="radio"
                                                          name="status" value="publish"> {{ __('Publish')}}
                                            </label>
                                        </div>
                                        <div>
                                            <label><input @if($row->status=='draft') checked @endif type="radio"
                                                          name="status" value="draft"> {{ __('Draft')}}
                                            </label>
                                        </div>
                                    </div>
                                @endif
                                <button class="btn btn-success" type="submit"><i
                                        class="fa fa-save"></i> {{ __('Save Change')}}</button>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title"><strong>{{__("Author Setting")}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <?php
                                    $user = !empty($row->create_user) ? App\User::find($row->create_user) : false;
                                    \App\Helpers\AdminForm::select2('create_user', [
                                        'configs' => [
                                            'ajax'        => [
                                                'url' => url('/admin/module/user/getForSelect2'),
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
                                            'placeholder' => __('-- Select User --')
                                        ]
                                    ], !empty($user->id) ? [
                                        $user->id,
                                        $user->getDisplayName() . ' (#' . $user->id . ')'
                                    ] : false)
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section ('script.body')
    <script>
        $('.moeda-real').mask('#.##0,00', {reverse: true});
    </script>
@endsection
