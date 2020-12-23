@extends('layouts.user')
@section('head')

@endsection
@section('content')
    <h2 class="title-bar">
        {{__("Settings")}}
        <a href="{{route('user.change_password')}}" class="btn-change-password">{{__("Change Password")}}</a>
    </h2>
    @include('admin.message')
    <form action="{{route('user.profile.update')}}" method="post" class="input-has-icon">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-title">
                    <strong>{{__("Personal Information")}}</strong>
                </div>
                <div class="form-group">
                    <label>{{__("E-mail")}}</label>
                    <input type="text" name="email" value="{{old('email',$dataUser->email)}}"
                           placeholder="{{__("E-mail")}}" class="form-control">
                    <i class="fa fa-envelope input-icon"></i>
                </div>
                @if($is_vendor_access)
                    <div class="form-group">
                        <label>{{__("Business name")}}</label>
                        <input type="text" value="{{old('business_name',$dataUser->business_name)}}"
                               name="business_name" placeholder="{{__("Business name")}}" class="form-control">
                        <i class="fa fa-user input-icon"></i>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__("First name")}}</label>
                            <input type="text" value="{{old('first_name',$dataUser->first_name)}}" name="first_name"
                                   placeholder="{{__("First name")}}" class="form-control">
                            <i class="fa fa-user input-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__("Last name")}}</label>
                            <input type="text" value="{{old('last_name',$dataUser->last_name)}}" name="last_name"
                                   placeholder="{{__("Last name")}}" class="form-control">
                            <i class="fa fa-user input-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__("Birthday")}}</label>
                            <input type="text"
                                   value="{{ old('birthday',$dataUser->birthday? display_date($dataUser->birthday) :'') }}"
                                   name="birthday" placeholder="{{__("Birthday")}}" class="form-control date-picker">
                            <i class="fa fa-birthday-cake input-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__("CPF")}}</label>
                            <input type="text" value="{{old('',$dataUser->cpf_cnpj)}}" name="cpf_cnpj"
                                   placeholder="{{__("303.807.108.03")}}"
                                   class="form-control cpf">
                            <i class="fa fa-user input-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__("RG")}}</label>
                            <input type="text" value="{{old('',$dataUser->rg)}}" name="rg"
                                   placeholder="{{ __('29.976.027-3')}}" class="form-control rg">
                            <i class="fa fa-user input-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__("Passport")}}</label>
                            <input type="text" value="{{ old('',$dataUser->passport) }}" name="passport"
                                   placeholder="{{__("FN8498378")}}" class="form-control">
                            <i class="fa fa-user input-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__("Vehicle Model")}}</label>
                            <input type="text" value="{{old('',$dataUser->vehicle_model)}}"
                                   name="vehicle_model" placeholder="{{__("BMW")}}" class="form-control">
                            <i class="fa fa-user input-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__("Vehicle Cor")}}</label>
                            <input type="text" value="{{old('',$dataUser->vehicle_cor)}}" name="vehicle_cor"
                                   placeholder="{{__("BRANCO")}}" class="form-control">
                            <i class="fa fa-user input-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__("Vehicle Plate")}}</label>
                            <input type="text" value="{{ old('',$dataUser->vehicle_plate) }}"
                                   name="vehicle_plate" placeholder="{{__("DRl92834")}}" class="form-control">
                            <i class="fa fa-user input-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Phone Number")}}</label>
                    <input type="text" value="{{old('phone',$dataUser->phone)}}" name="phone"
                           placeholder="{{__("Phone Number")}}" class="form-control phone">
                    <i class="fa fa-phone input-icon"></i>
                </div>

                <div class="form-group">
                    <label>{{__("About Yourself")}}</label>
                    <textarea name="bio" rows="5" class="form-control">{{old('bio',$dataUser->bio)}}</textarea>
                </div>
                <div class="form-group">
                    <label>{{__("Avatar")}}</label>
                    <div class="upload-btn-wrapper">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    {{__("Browse")}}… <input type="file">
                                </span>
                            </span>
                            <input type="text" data-error="{{__("Error upload...")}}"
                                   data-loading="{{__("Loading...")}}" class="form-control text-view" readonly
                                   value="{{ $dataUser->getAvatarUrl()?? __("No Image")}}">
                        </div>
                        <input type="hidden" class="form-control" name="avatar_id"
                               value="{{ $dataUser->avatar_id?? ""}}">
                        <img class="image-demo" src="{{ $dataUser->getAvatarUrl()?? ""}}"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-title">
                    <strong>{{__("Location Information")}}</strong>
                </div>
                <div class="form-group">
                    <label>{{__("Zip Code")}}</label>
                    <input type="text" value="{{old('zip_code',$dataUser->zip_code)}}" name="zip_code"
                           placeholder="{{__("Zip Code")}}" class="form-control cep">
                    <i class="fa fa-map-pin input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Address Line 1")}}</label>
                    <input type="text" value="{{old('address',$dataUser->address)}}"
                           placeholder="{{ __('Address')}}" name="address" class="form-control street_name">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Address Line 2")}}</label>
                    <input type="text" value="{{old('address2',$dataUser->address2)}}" name="address2"
                           placeholder="{{__("Address2")}}" class="form-control neighborhood">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("City")}}</label>
                    <input type="text" value="{{old('city',$dataUser->city)}}" name="city"
                           placeholder="{{__("City")}}" class="form-control city">
                    <i class="fa fa-street-view input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("State")}}</label>
                    <input type="text" value="{{old('state',$dataUser->state)}}" name="state"
                           placeholder="{{__("State")}}" class="form-control state">
                    <i class="fa fa-map-signs input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Country")}}</label>
                    <select name="country" class="form-control country">
                        <option value="">{{__('-- Select --')}}</option>
                        @foreach(get_country_lists() as $id=>$name)
                            <option @if((old('country',$dataUser->country ?? '')) == $id) selected
                                    @endif value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
            </div>
        </div>
    </form>
@endsection

@section('footer')

@endsection

@section ('script.body')
{{--    {!! App\Helpers\MapEngine::scripts() !!}--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $(".cpf").mask('000.000.000-00', {reverse: true});
            $(".cep").mask('00.000-000', {reverse: true});
            $(".phone").mask('(00) Z0000-0000', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});

            $(document).on('blur', '.cep', function () {
                var zipcode = $(this).val().replace(/\D/g, '');
                axios.get(`https://viacep.com.br/ws/${zipcode}/json/`)
                    .then(function (response) {
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
        });
    </script>
@endsection
