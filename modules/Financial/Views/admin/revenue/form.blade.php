<div class="panel">
    <div class="panel-title"><strong>{{__("Conta Bancária")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <div class="input-group">
                <select class="form-control" name="bank_account_id">
                    @foreach ($bankAccountList as $option)
                        @if ($row->bank_account_id == $option->id)
                            <option value="{{$option->id}}" selected>{{$option->bank}}</option>
                        @else
                            <option value="{{$option->id}}">{{$option->bank}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="panel">
    <div class="panel-title"><strong>{{__("Centro de custo")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <div class="input-group">
                <select class="form-control" required name="cost_center_id">
                    @foreach ($costCenterList as $option)
                        @if ($row->cost_center_id == $option->id)
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


<div class="panel">
    <div class="panel-title"><strong>{{__("Forma de Pagamento")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <div class="input-group">
                <select class="form-control" required name="payment_method_id">
                    @foreach ($paymentMethodList as $option)
                        @if ($row->payment_method_id == $option->id)
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

<div class="panel">
    <div class="panel-title"><strong>{{__("Dados da Receita")}}</strong></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>{{ __('Data da Emissao:')}}</label>
                    <input type="date" value="{{$row->issue_date}}" disabled="" name="issue_date" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>{{ __('Data de Competência:')}}</label>
                    <input type="date" value="{{$row->competency_date}}" name="competency_date" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel">
    <div class="panel-title"><strong>{{__("Valores da Fatura")}}</strong></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label>{{ __('Valor Multa:')}}</label>
                    <input type="text" name="fine_value" placeholder="R$" class="form-control moeda-real"
                           value="{{$row->value_card}}">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>{{ __('Valor Juros:')}}</label>
                    <input type="text" name="interest_value" placeholder="R$" class="form-control moeda-real"
                           value="{{$row->value_card}}">
                </div>

            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>{{ __('Valor Total:')}}</label>
                    <input type="text" name="total_value" placeholder="R$" class="form-control moeda-real"
                           value="{{$row->value_card}}">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel">
    <div class="panel-title"><strong>{{__("Hotel Building")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label class="control-label"><b>{{ __('Historico')}}</b></label>
            <textarea name="historical" class="d-none has-ckeditor" cols="30"
                      rows="10">{{setting_item_with_lang('space_internal_regime',request()->query('lang')) }}</textarea>
        </div>
    </div>
</div>














