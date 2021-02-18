<div class="panel">
    <div class="panel-title"><strong>{{__("Hotel Building")}}</strong></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{__("Hotel building")}}</label>
                    <select id="building" class="form-control" name="building_id" data-value="{{$translation->floor_id}}">
                        @foreach ($buildingList as $option)
                            @if ($translation->building_id == $option->id)
                                <option value="{{$option->id}}" selected>{{$option->name}}</option>
                            @else
                                <option value="{{$option->id}}">{{$option->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
