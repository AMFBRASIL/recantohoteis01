<div class="form-group">
    <label> {{ __('Nome')}}</label>
    <input type="text" required value="{{$translation->name}}" placeholder="MINIZINHA PAGSEGURO" name="name" class="form-control" style="text-transform: uppercase">
</div>
<div class="form-group">
    <label> {{ __('Conta Bancária')}}</label>
    <select class="form-control" required name="bank_account_id">
        @foreach ($bankAccountList as $option)
            @if ($translation->bank_account_id === $option->id)
                <option value="{{$option->id}}" selected>{{$option->bank}}</option>
            @else
                <option value="{{$option->id}}">{{$option->bank}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    <label> {{ __('Forma de Pagamento')}}</label>
    <select class="form-control" required name="payment_method_id">
        @foreach ($paymentMethodList as $option)
            @if ($translation->payment_method_id === $option->id)
                <option value="{{$option->id}}" selected>{{$option->name}}</option>
            @else
                <option value="{{$option->id}}">{{$option->name}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    <label> {{ __('Taxa')}}</label>
    <input type="text" required value="{{$translation->rate}}" placeholder="1.93%" step="0.01" name="rate" class="form-control" maxlength="10" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode === 46">
</div>
<div class="form-group">
    <label> {{ __('Dias')}}</label>
    <input type="text" required value="{{$translation->days}}" placeholder="30" name="days" class="form-control" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
</div>
<div class="form-group">
    <label> {{ __('Telefone Suporte')}}</label>
    <input type="text" required value="{{$translation->phone_support}}" placeholder="0800 293939383" name="phone_support" class="form-control" maxlength="20" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
</div>
<div class="form-group">
    <label> {{ __('Email Suporte')}}</label>
    <input type="email" required value="{{$translation->email_support}}" placeholder="suporte@minizinha.com.br" name="email_support" class="form-control" maxlength="50">
</div>

