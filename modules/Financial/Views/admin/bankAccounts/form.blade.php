<div class="form-group">
    <label> {{ __('Banco')}}</label>
    <div class="form-controls">
        <select name="bank" class="select_bank form-control" required>
            <option value="">{{__("--Select--")}}</option>
            @foreach ($bankList as $option)
                @if ($translation->bank == $option->nome_reduzido)
                    <option value="{{$option->nome_reduzido}}"
                            selected>{{$option->numero_codigo}} - {{$option->nome_reduzido}}</option>
                @else
                    <option value="{{$option->nome_reduzido}}">{{$option->numero_codigo}} - {{$option->nome_reduzido}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label> {{ __('Agencia')}}</label>
    <input type="text" value="{{$translation->agency}}" placeholder="0000" name="agency" class="form-control"
           maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
</div>
<div class="form-group">
    <label> {{ __('Conta')}}</label>
    <input type="text" value="{{$translation->account}}" placeholder="0000000-0" name="account" class="form-control"
           maxlength="8" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
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
@section ('script.body')
    <script>
        $(document).ready(function () {
            $('.select_bank').select2();
        });
    </script>
@endsection

