<div class="panel">
    <div class="panel-title"><strong>{{__("Hotel building")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label>{{__("Hotel building")}}</label>
            <select class="form-control" name="building_id">
                @foreach ($buildingList as $option)
                    @if ($translation->building_id === $option->id)
                        <option value="{{$option->id}}" selected>{{$option->name}}</option>
                    @else
                        <option value="{{$option->id}}">{{$option->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
