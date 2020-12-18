@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Categoria Pai: ") . $parent->description}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-4 mb40">
                <div class="panel">
                    <div class="panel-title">{{__("Sub Categoria Produto")}}</div>
                    <div class="panel-body">
                        <form action="{{route('product_subcategory.admin.store',['id' => $parent->id, 'sub'=>isset($row) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>{{__("Nome")}}</label>
                                <input type="text" value="{{isset($row) ? $row->description : ''}}" placeholder="{{__("Nome")}}" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Class Icon - get icon in fontawesome.com or icofont.com</label>
                                <input type="text" value="{{isset($row) ? $row->class_icon : ''}}" placeholder="{{__("Ex: fa fa-facebook")}}" name="class_icon" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__("Upload Image")}}</label>
                                <div class="form-group-image">
                                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('image_id', isset($row) ? $row->image_id : '') !!}
                                </div>
                            </div>
                            <div class="">
                                <button class="btn btn-primary" type="submit">{{__("Adicionar")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        @if(!empty($rows))
                            <form method="post" action="{{route('product_subcategory.admin.bulkEdit', ['id' => $parent->id])}}" class="filter-form filter-form-left d-flex justify-content-start">
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
                        <form method="get" action="{{route('product_subcategory.admin.create', ['id' => $parent->id])}} " class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            <input type="text" name="s" value="{{ Request()->s }}" class="form-control" placeholder="{{__("Buscar")}}">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit" type="submit">{{__('Pesquisar')}}</button>
                        </form>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-title">{{__("Todas Categorias")}}</div>
                    <div class="panel-body">
                        <form class="bravo-form-item">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th class="">{{__("Nome")}}</th>
                                    <th class="">{{__("Date")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($rows) > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td><input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}">
                                            </td>
                                            <td class="title">{{$row->description}}</td>
                                            <td>{{ display_date($row->updated_at)}}</td>
                                            <td>
                                                <a href="{{route('product_subcategory.admin.edit',['id' => $parent->id, 'sub'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Edit')}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">{{__("No data")}}</td>
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
