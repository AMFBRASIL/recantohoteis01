<div class="form-group">
    <label> {{ __('Banco')}}</label>
    <input type="text" value="{{$translation->bank}}" placeholder="Banco" name="bank" class="form-control" style="text-transform: uppercase">
</div>
<div class="form-group">
    <label> {{ __('Agencia')}}</label>
    <input type="text" value="{{$translation->agency}}" placeholder="0000" name="agency" class="form-control" maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
</div>
<div class="form-group">
    <label> {{ __('Conta')}}</label>
    <input type="text" value="{{$translation->account}}" placeholder="0000000-0" name="account" class="form-control" maxlength="8" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
</div>
<div class="form-group">
    <label> {{ __('Tipo')}}</label>
    <select class="form-control" name="type_account">
        <optgroup label="{{__("Tipo da Conta Bancária")}}">
            @foreach ($optionAccount as $option)
                @if ($translation->type_account === $option)
                    <option value="{{$option}}" selected>{{$option}}</option>
                @else
                    <option value="{{$option}}">{{$option}}</option>
                @endif
            @endforeach
        </optgroup>
    </select>
</div>

