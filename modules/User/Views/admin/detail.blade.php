@extends('admin.layouts.app')

@section('content')
    <form action="{{url('admin/module/user/store/'.($row->id ?? -1))}}" method="post" class="needs-validation"
          novalidate>
        @csrf
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? 'Edit: '.$row->getDisplayName() : 'Add new user'}}</h1>
                </div>
            </div>
            @include('admin.message')
            <div class="row">
                <div class="col-md-9">
                    <div class="panel">
                        <div class="panel-title"><strong>{{ __('User Info')}}</strong></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("Business name")}}</label>
                                        <input type="text" value="{{old('business_name',$row->business_name)}}"
                                               name="business_name" placeholder="{{__("Business name")}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Type')}}</label>
                                        <div class="form-controls">
                                            <select name="user_type" class="form-control person_type" required>
                                                <option value="">{{__("--Select--")}}</option>
                                                <option
                                                    value="PESSOA JURIDICA" {{($row->user_type ?? '') == 'PESSOA JURIDICA' ? 'selected' : ''  }}>{{__('PESSOA JURIDICA')}}</option>
                                                <option
                                                    value="PESSOA FISICA" {{($row->user_type ?? '') == 'PESSOA FISICA' ? 'selected' : ''  }}>{{__('PESSOA FISICA')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label document-label">{{__("CNPJ:")}}</label>
                                        <input type="text" name="cpf_cnpj" class="form-control document-value" value="{{$row->cpf_cnpj}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('RG')}}</label>
                                        <input type="text" value="{{old('rg',$row->rg)}}"
                                               placeholder="{{ __('29.976.027-3')}}" name="rg" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Passport')}}</label>
                                        <input type="text" value="{{old('passport',$row->passport)}}"
                                               placeholder="{{ __('FN8498378')}}" name="passport" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('E-mail')}}</label>
                                        <input type="email" required value="{{old('email',$row->email)}}"
                                               placeholder="{{ __('Email')}}" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("First name")}}</label>
                                        <input type="text" required value="{{old('first_name',$row->first_name)}}"
                                               name="first_name" placeholder="{{__("First name")}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("Last name")}}</label>
                                        <input type="text" required value="{{old('last_name',$row->last_name)}}"
                                               name="last_name" placeholder="{{__("Last name")}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Phone Number')}}</label>
                                        <input type="text" value="{{old('phone',$row->phone)}}"
                                               placeholder="{{ __('Phone')}}" name="phone" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Phone Number 2')}}</label>
                                        <input type="text" value="{{old('phone2',$row->phone2)}}"
                                               placeholder="{{ __('Phone')}}" name="phone2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('WhatsAPP Phone')}}</label>
                                        <input type="text" value="{{old('whatsApp phone',$row->phone_whatsApp)}}"
                                               placeholder="{{ __('Phone')}}" name="phone_whatsApp"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Birthday')}}</label>
                                        <input id='datetimepicker1' type="date"
                                               value="{{old('birthday',$row->birthday)}}"
                                               name="birthday" class="form-control has-datepicker input-group date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("Zip Code")}}</label>
                                        <input type="text" value="{{old('zip_code',$row->zip_code)}}" name="zip_code"
                                               placeholder="{{__("Zip Code")}}" class="form-control cep">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Address Line 1')}}</label>
                                        <input type="text" value="{{old('address',$row->address)}}"
                                               placeholder="{{ __('Address')}}" name="address" class="form-control street_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Address Line 2')}}</label>
                                        <input type="text" value="{{old('address2',$row->address2)}}"
                                               placeholder="{{ __('Address 2')}}" name="address2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("City")}}</label>
                                        <input type="text" value="{{old('city',$row->city)}}" name="city"
                                               placeholder="{{__("City")}}" class="form-control city">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("State")}}</label>
                                        <input type="text" value="{{old('state',$row->state)}}" name="state"
                                               placeholder="{{__("State")}}" class="form-control state">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">{{__("Country")}}</label>
                                        <select name="country" class="form-control" id="country-sms-testing" required>
                                            <option value="">{{__('-- Select --')}}</option>
                                            @foreach(get_country_lists() as $id=>$name)
                                                <option @if($row->country==$id) selected
                                                        @endif value="{{$id}}">{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__("Website Business")}}</label>
                                        <input type="text" value="{{old('website business',$row->business_website)}}"
                                               name="business_website"
                                               placeholder="{{__("www.site.com.br")}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> {{ __('Profession Client')}}</label>
                                        <select class="form-control" name="profession_id">
                                            <option value="">{{__("--Selecione--")}}</option>
                                            @foreach ($professionList as $option)
                                                @if ($row->profession_id == $option->id)
                                                    <option value="{{$option->id}}" selected>{{$option->name}}</option>
                                                @else
                                                    <option value="{{$option->id}}">{{$option->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> {{ __('Companies')}}</label>
                                        <select class="form-control" name="company_id">
                                            <option value="">{{__("--Select--")}}</option>
                                            @foreach ($companyList as $option)
                                                @if ($row->company_id == $option->id)
                                                    <option value="{{$option->id}}" selected>{{$option->title}}</option>
                                                @else
                                                    <option value="{{$option->id}}">{{$option->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("Vehicle Model")}}</label>
                                        <input type="text" value="{{old('vehicle model',$row->vehicle_model)}}"
                                               name="vehicle_model"
                                               placeholder="{{__("BMW")}}" class="form-control"
                                               style="text-transform: uppercase">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("Vehicle Cor")}}</label>
                                        <input type="text" value="{{old('vehicle cor',$row->vehicle_cor)}}"
                                               name="vehicle_cor"
                                               placeholder="{{__("BRANCO")}}" class="form-control"
                                               style="text-transform: uppercase">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("Vehicle Plate")}}</label>
                                        <input type="text" value="{{old('vehicle plate',$row->vehicle_plate)}}"
                                               name="vehicle_plate"
                                               placeholder="{{__("DRl92834")}}" class="form-control"
                                               style="text-transform: uppercase">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("Differentiated Discount")}}</label>
                                        <input type="text"
                                               value="{{old('Differentiated Discount',$row->differentiated_discount)}}"
                                               name="differentiated_discount"
                                               placeholder="{{__("30#")}}" class="form-control"
                                               style="text-transform: uppercase">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("Fixed Overnight Rate")}}</label>
                                        <input type="text"
                                               value="{{old('fixed overnight rate',$row->fixed_overnight_rate)}}"
                                               name="fixed_overnight_rate"
                                               placeholder="{{__("R$ 300,00")}}" class="form-control"
                                               style="text-transform: uppercase">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("Billing Day")}}</label>
                                        <input type="text" value="{{old('billing day',$row->billing_day)}}"
                                               name="billing_day"
                                               placeholder="{{__("15")}}" class="form-control"
                                               style="text-transform: uppercase">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("Number Days Bill")}}</label>
                                        <input type="text" value="{{old('billing day',$row->number_days_bill)}}"
                                               name="number_days_bill"
                                               placeholder="{{__("28")}}" class="form-control"
                                               style="text-transform: uppercase">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("Billing Limit")}}</label>
                                        <input type="text" value="{{old('billing limit',$row->billing_limit)}}"
                                               name="billing_limit"
                                               placeholder="{{__("R$ 1000,00")}}" class="form-control"
                                               style="text-transform: uppercase">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__("Hours Of")}}</label>
                                        <input type="text" value="{{old('hours of',$row->hours_of)}}" name="hours_of"
                                               placeholder="{{__("09:00")}}" class="form-control"
                                               style="text-transform: uppercase">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__("Hours Until")}}</label>
                                        <input type="text" value="{{old('hours until',$row->hours_until)}}"
                                               name="hours_until"
                                               placeholder="{{__("18:00")}}" class="form-control"
                                               style="text-transform: uppercase">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Day or Night')}}</label>
                                        <div class="form-controls">
                                            <select name="day_or_night" class="form-control">
                                                <option value="">{{__("--Select--")}}</option>
                                                <option
                                                    value="DAY" {{($row->day_or_night ?? '') == 'DAY' ? 'selected' : ''  }}>{{__('DAY')}}</option>
                                                <option
                                                    value="NIGHT" {{($row->day_or_night ?? '') == 'NIGHT' ? 'selected' : ''  }}>{{__('NIGHT')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Bank')}}</label>
                                        <div class="form-controls">
                                            <select name="bank" class="select_bank form-control" required>
                                                <option value="">{{__("--Select--")}}</option>
                                                @foreach ($bankList as $option)
                                                    @if ($row->bank == $option->nome_reduzido)
                                                        <option value="{{$option->nome_reduzido}}"
                                                                selected>{{$option->nome_reduzido}}</option>
                                                    @else
                                                        <option value="{{$option->nome_reduzido}}">{{$option->nome_reduzido}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__('Agency')}}</label>
                                        <input type="text" value="{{old('',$row->agency)}}" required
                                               name="agency" maxlength="5" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                               placeholder="{{__("2500-0")}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__('Account')}}</label>
                                        <input type="text" value="{{old('',$row->account)}}" required
                                               name="account" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                               placeholder="{{__("25000-0")}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{ __('Biographical')}}</label>
                                <div class="">
                                    <textarea name="bio" class="d-none has-ckeditor" cols="30"
                                              rows="10">{{old('bio',$row->bio)}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-title"><strong>{{ __('Publish')}}</strong></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>{{__('Status')}}</label>
                                <select required class="custom-select" name="status">
                                    <option value="">{{ __('-- Select --')}}</option>
                                    <option @if(old('status',$row->status) =='publish') selected
                                            @endif value="publish">{{ __('Publish')}}</option>
                                    <option @if(old('status',$row->status) =='draft') selected
                                            @endif value="draft">{{ __('Draft')}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{__('Role')}}</label>
                                <select required class="custom-select" name="role_id">
                                    <option value="">{{ __('-- Select --')}}</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}"
                                                @if(!old('role_id') && $row->hasRole($role)) selected
                                                @elseif(old('role_id')  == $role->id ) selected @endif >{{ucfirst($role->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-title"><strong>{{ __('Vendor')}}</strong></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>{{__('Vendor Commission Type')}}</label>
                                <div class="form-controls">
                                    <select name="vendor_commission_type" class="form-control">
                                        <option value="">{{__("Default")}}</option>
                                        <option
                                            value="percent" {{($row->vendor_commission_type ?? '') == 'percent' ? 'selected' : ''  }}>{{__('Percent')}}</option>
                                        <option
                                            value="amount" {{($row->vendor_commission_type ?? '') == 'amount' ? 'selected' : ''  }}>{{__('Amount')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{__('Vendor commission value')}}</label>
                                <div class="form-controls">
                                    <input type="text" class="form-control" name="vendor_commission_amount"
                                           value="{{!empty($row->vendor_commission_amount) ? $row->vendor_commission_amount:'' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-title"><strong>{{__("Configuração Cliente")}}</strong></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="is_pos" value="">
                                        <input type="checkbox" name="is_pos" @if($row->is_pos) checked
                                               @endif value="1"> {{__("Pode receber lançamento consumo POS")}}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="is_iss" value="">
                                        <input type="checkbox" name="is_iss" @if($row->is_iss) checked
                                               @endif value="1"> {{__("Retem ISS?")}}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="is_smoker" value="">
                                        <input type="checkbox" name="is_smoker" @if($row->is_smoker) checked
                                               @endif value="1"> {{__("Fumante")}}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="is_suspect" value="">
                                        <input type="checkbox" name="is_suspect" @if($row->is_suspect) checked
                                               @endif value="1"> {{__("Suspeito ?")}}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="is_nfe" value="">
                                        <input type="checkbox" name="is_nfe" @if($row->is_nfe) checked
                                               @endif value="1"> {{__("Emissao de NFe")}}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="is_nfce" value="">
                                        <input type="checkbox" name="is_nfce" @if($row->is_nfce) checked
                                               @endif value="1"> {{__("Emissao de NFCe")}}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="is_sat" value="">
                                        <input type="checkbox" name="is_sat" @if($row->is_sat) checked
                                               @endif value="1"> {{__("Emissao de SAT")}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-title"><strong>{{ __('Avatar')}}</strong></div>
                        <div class="panel-body">
                            <div class="form-group">
                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id',old('avatar_id',$row->avatar_id)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span></span>
                <button class="btn btn-primary" type="submit">{{ __('Save Change')}}</button>
            </div>
        </div>
    </form>

@endsection
@section ('script.body')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        $(document).ready(function () {
            $('.select_bank').select2();
        });

        jQuery(function ($) {
            $(document).on('change', '.person_type', function (){
                var person = $(this).val();
                if (person == 'PESSOA JURIDICA') {
                    $('.document-label').text('CNPJ:')
                    $('.document-value').removeClass('cpf').addClass('cnpj');
                    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
                } else if (person == 'PESSOA FISICA') {
                    $('.document-label').text('CPF:')
                    $('.document-value').removeClass('cnpj').addClass('cpf')
                    $('.cpf').mask('000.000.000-00', {reverse: true});
                }
            });

            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
            $('.cep').mask('00000-000', {reverse: true});
            $('.phone').mask('(00) Z0000-0000', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});

            $(document).on('blur', '.cep', function() {
                var zipcode = $(this).val().replace(/\D/g, '');
                axios.get(`https://viacep.com.br/ws/${zipcode}/json/`)
                    .then(function(response ) {
                        if (!response.data.erro) {
                            console.log(response.data);
                            $('.street_name').val(response.data.logradouro);
                            $('.complement').val(response.data.complemento);
                            $('.neighborhood').val(response.data.bairro);
                            $('.city').val(response.data.localidade);
                            $('.state').val(response.data.uf);
                        }
                    });
            });
        })
    </script>
@endsection


