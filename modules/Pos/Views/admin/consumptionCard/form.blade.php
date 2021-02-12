<div class="form-group">
    <label>{{ __('Número do Cartão')}}</label>
    <div class="input-group">
        <input type="number" value="{{$row->card_number}}" placeholder="" name="card_number" class="form-control">
    </div>
</div>
<div class="form-group">
    <label>{{ __('Cliente')}}</label>
    <div class="input-group">
        <?php
            $user = !empty($row->user_id) ? App\User::find($row->user_id) : false;
            \App\Helpers\AdminForm::select2('user_id', [
                'configs' => [
                    'ajax' => [
                        'url' => route('user.admin.autocomplete'),
                        'dataType' => 'json'
                    ],
                    'allowClear'  => true,
                    'placeholder' => __('cliente')
                ]
            ], !empty($user->id) ? [$user->id, $user->getNameAttribute()] : false)
        ?>
        <div class="input-group-append">
            <button type="button" data-toggle="modal" data-target="#register" class="btn btn-info btn-sm btn-add-item">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>

<div class="form-group">
    <label>{{ __('Valor Inicial Cartão')}}</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">R$</span>
        </div>
        <input id="priceAdd" type="text" name="value_card" placeholder="99,99" class="form-control moeda-real" value="{{$row->value_card}}">
    </div>
</div>

<div class="panel" id="somaValores" name="somaValores" style="display: none">
    <div class="panel-body">
        <div class="col-md-12">
            <h6 class="account">Valor a Creditar no Cartão</h6><span class="mt-5 balance">  <div id="somaTotal" name="somaTotal"></div> </span>
            <h6 class="account">Valor a Cobrar do Cliente </h6><span class="mt-5 restante">  <div id="somaTotalCobrar" name="somaTotalCobrar"></div> </span>
        </div>
    </div>
</div>

<div class="form-group">
    <label>{{ __('Situação do Cartão')}}</label>
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
    <label>{{ __('Forma de pagamento')}}</label>
    <div class="input-group" data-select2-id="25">
        <select id="formPayment" class="form-control" required name="payment_method_id" data-value="{{$cashPayment->id}}">
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

<div id="divNSU" class="form-group">
    <label>{{ __('Número da Transação Cartão')}}</label>
    <input id="nsuinput" type="text" value="{{$row->card_transaction_number}}"
           placeholder="AUHDEUY804837943" name="card_transaction_number"
           class="form-control">
</div>

<div class="form-group">
    <label>{{ __('Centro de Custo')}}</label>
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

<div class="form-group">
    <label> {{ __('Conta Bancária')}}</label>
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

<div class="form-group">
    <label> {{ __('Data Transação')}} </label>
    <input type="text" value="{{$row->transaction_date->format('d/m/y H:m:s')}}" disabled="" name="transaction_date" class="form-control">
</div>

<div class="form-group">
    <label class="control-label"><b>{{ __('Observações Internas')}}</b></label>
    <textarea name="internal_observations" class="d-none has-ckeditor" cols="30"
              rows="10"></textarea>
</div>
