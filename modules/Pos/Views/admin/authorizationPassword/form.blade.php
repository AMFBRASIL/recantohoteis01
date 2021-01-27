<div class="form-group">
    <label>{{ __('Senha')}}</label>
    <div class="input-group">
        <input type="text" value="{{$row->password}}" placeholder="" name="password" class="form-control">
    </div>
</div>


<div class="form-group">
    <label> {{ __('Senha Expirar: (em 30 dias)')}} </label>
    <input type="text" value="{{$row->expiration_date->format('d/m/y H:m:s')}}" disabled="" name="transaction_date" class="form-control">
</div>

<div class="form-group">
    <label>{{ __('Situação')}}</label>
    <div class="input-group">
        <select class="form-control" required name="situation_id">
            @foreach ($situationList as $option)
                @if ($row->situation_id == $option->id)
                    <option value="{{$option->id}}" selected>{{$option->name}}</option>
                @else
                    <option value="{{$option->id}}">{{$option->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label"><b>{{ __('Observações Internas')}}</b></label>
    <textarea name="internal_observations" class="d-none has-ckeditor" cols="30"
              rows="10">{{setting_item_with_lang('space_internal_regime',request()->query('lang')) }}</textarea>
</div>
