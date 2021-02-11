@extends('admin.layouts.app')

@section('content')
    <form action="{{route('hotel.admin.room.store',['hotel_id'=>$hotel->id,'id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between mb20">
                        <div class="">
                            <h1 class="title-bar">{{$row->id ? __('Edit: ').$row->title : __('Add new Hotel Room')}}</h1>
                        </div>
                    </div>
                    @include('admin.message')
                    @if($row->id)
                        @include('Language::admin.navigation')
                    @endif
                    <div class="lang-content-box">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__("Room information")}}</strong></div>
                            <div class="panel-body">
                                @include('Hotel::admin.room.form')
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> {{__("Save Changes")}}</button>
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

        let room_id = $("#room_id").val();
        console.log(room_id)

        getRooms();

        $("#floor_id").on('change', function (e) {
            getRooms();
        })

        function getRooms() {
            let data = {
                floor_id: $('#floor_id').val(),
            };

            let url = "/admin/module/hotel/room/findRoomByFloorID";

            $.ajax({
                url: url,
                type: 'GET',
                data: data,
                success: function (data) {
                    let select = $('#room_id');
                    select.empty();
                    $.each(data.results, function (index, item) {
                        if(item.id == room_id){
                            select.append(
                                new Option(item.number, item.id, null, true));
                        }else{
                            select.append(
                                new Option(item.number, item.id, null, false));
                        }
                    });
                }
            });
        }
    </script>
@endsection
