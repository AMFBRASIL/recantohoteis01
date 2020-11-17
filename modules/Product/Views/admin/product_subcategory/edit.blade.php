@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Categoria Pai: ") . $parent->description}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-12 mb40">
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
                                <button class="btn btn-primary" type="submit">{{__("Salvar")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
