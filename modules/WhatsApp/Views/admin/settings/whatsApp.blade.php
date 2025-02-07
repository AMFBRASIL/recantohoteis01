<div class="row mb-3">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Config WhatsApp')}}</h3>
        <p class="form-group-desc">{{__('WhatsApp driver')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <label>{{__('WhatsApp Driver')}}</label>
                        <div class="form-controls">
                            <select name="whatsApp_driver" class="form-control">
                                @foreach(\Modules\WhatsApp\SettingClass::WHATSAPP_DRIVER as $item=>$value)
                                    <option value="{{$value}}" {{(setting_item('whatsApp_driver') ?? '') == $value ? 'selected' : ''  }}>{{__(strtoupper($value))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @else
                    <p>{{__('You can edit on main lang.')}}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@if(is_default_lang())
    <div class="row" data-condition="whatsApp_driver:is(twilio)">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Config Twilio Driver')}}</h3>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div data-condition="whatsApp_driver:is(twilio)">
                        <div class="form-group">
                            <label class="">{{__("Twilio Account Sid")}}</label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="whatsApp_twilio_account_sid" value="{{setting_item('whatsApp_twilio_account_sid',config('whatsapp.twilio.sid'))}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">{{__("Twilio Account Token")}}</label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="whatsApp_twilio_account_token" value="{{setting_item('whatsApp_twilio_account_token',config('whatsapp.twilio.token'))}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">{{__("From")}}</label>
                            <div class="form-controls">
                                <input type="number" class="form-control" name="whatsApp_twilio_api_from" value="{{setting_item('whatsApp_twilio_api_from',config('whatsapp.twilio.from'))}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endif

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('WhatsApp Event Booking')}}</h3>
        <div class="form-group-desc">
            {{__('Phone number must be E.164 format')}}
            <p>{{__('Format')}}:<code> {{__('[+][country code][subscriber number including area code]')}} </code></p>
            <p>{{__('Example')}}:<code> +12019480710</code></p>
            <div>{{__('Message')}}:</div>
            @foreach(\Modules\WhatsApp\Listeners\SendWhatsAppUpdateBookingListen::CODE as $item=>$value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>{{__("Config Phone Administrator")}}</strong></div>
            <div class="panel-body">
                @if(is_default_lang())
                <div class="form-group">
                    <label>{{__('Admin Phone')}} </label>
                    <div class="form-controls">
                        <input type="number" class="form-control" name="admin_phone_has_booking" value="{{setting_item_with_lang('admin_phone_has_booking',request()->query('lang')) ?? ''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="">{{__("Country")}}</label>
                    <select name="admin_country_has_booking" class="form-control">
                        <option value="">{{__('-- Select --')}}</option>
                        @foreach(get_country_lists() as $id=>$name)
                            <option @if(setting_item_with_lang('admin_country_has_booking',request()->query('lang')) ==$id) selected @endif value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                    @else
                    <p>{{__('You can edit on main lang.')}}</p>
                @endif
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>{{__("Create Booking")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#WhatsAppAdminEventCreateBooking">{{__("Administrator")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#WhatsAppVendorEventCreateBooking">{{__("Vendor")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#WhatsAppUserEventCreateBooking">{{__("Customer")}}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="WhatsAppAdminEventCreateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_whatsApp_admin_has_booking')?? '' == 1) checked @endif name="enable_whatsApp_admin_has_booking" value="1"> {{__("Enable send whatsApp to Administrator when have booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_whatsApp_admin_has_booking') ?? '' == 1) checked @endif name="enable_whatsApp_admin_has_booking" disabled value="1"> {{__("Enable send whatsApp to Administrator when have booking?")}}</label>
                                </div>
                                @if(setting_item('enable_whatsApp_admin_has_booking')!= 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div data-condition="enable_whatsApp_admin_has_booking:is(1)">
                                <div class="form-group">
                                    <label>{{__("Message to Administrator")}}</label>
                                    <div class="form-controls">
                                        <textarea name="whatsApp_message_admin_when_booking" rows="8" class="form-control">{{setting_item_with_lang('whatsApp_message_admin_when_booking',request()->query('lang')) ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="WhatsAppVendorEventCreateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_whatsApp_vendor_has_booking') ?? '' == 1) checked @endif name="enable_whatsApp_vendor_has_booking" value="1"> {{__("Enable send whatsApp to Vendor when have booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_whatsApp_vendor_has_booking') ?? '' == 1) checked @endif name="enable_whatsApp_vendor_has_booking" disabled value="1"> {{__("Enable send whatsApp to Vendor when have booking?")}}</label>
                                </div>
                                @if(setting_item('enable_whatsApp_vendor_has_booking') != 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div class="form-group" data-condition="enable_whatsApp_vendor_has_booking:is(1)">
                                <label>{{__("Message to Customer")}}</label>
                                <div class="form-controls">
                                    <textarea name="whatsApp_message_vendor_when_booking" rows="8" class="form-control">{{setting_item_with_lang('whatsApp_message_vendor_when_booking',request()->query('lang')) ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="WhatsAppUserEventCreateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_whatsApp_user_has_booking') ?? '' == 1) checked @endif name="enable_whatsApp_user_has_booking" value="1"> {{__("Enable send whatsApp to Customer when have booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_whatsApp_user_has_booking') ?? '' == 1) checked @endif name="enable_whatsApp_user_has_booking" disabled value="1"> {{__("Enable send whatsApp to Customer when have booking?")}}</label>
                                </div>
                                @if(setting_item('enable_whatsApp_user_has_booking') != 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div class="form-group" data-condition="enable_whatsApp_user_has_booking:is(1)">
                                <label>{{__("Message to Customer")}}</label>
                                <div class="form-controls">
                                    <textarea name="whatsApp_message_user_when_booking" rows="8" class="form-control">{{setting_item_with_lang('whatsApp_message_user_when_booking',request()->query('lang')) ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>{{__("Update booking")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#WhatsAppAdminEventUpdateBooking">{{__("Administrator")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#WhatsAppVendorEventUpdateBooking">{{__("Vendor")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#WhatsAppUserEventUpdateBooking">{{__("Customer")}}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="WhatsAppAdminEventUpdateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_whatsApp_admin_update_booking') ?? '' == 1) checked @endif name="enable_whatsApp_admin_update_booking" value="1"> {{__("Enable send whatsApp to Administrator when update booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_whatsApp_admin_update_booking') ?? '' == 1) checked @endif name="enable_whatsApp_admin_update_booking" disabled value="1"> {{__("Enable send whatsApp to Administrator when update booking?")}}</label>
                                </div>
                                @if(@setting_item('enable_whatsApp_admin_update_booking') != 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div data-condition="enable_whatsApp_admin_update_booking:is(1)">
                                <div class="form-group">
                                    <label>{{__("Message to Administrator")}}</label>
                                    <div class="form-controls">
                                        <textarea name="whatsApp_message_admin_update_booking" rows="8" class="form-control">{{setting_item_with_lang('whatsApp_message_admin_update_booking',request()->query('lang')) ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="WhatsAppVendorEventUpdateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_whatsApp_vendor_update_booking') ?? '' == 1) checked @endif name="enable_whatsApp_vendor_update_booking" value="1"> {{__("Enable send whatsApp to Vendor when update booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(@setting_item('enable_whatsApp_vendor_update_booking') ?? '' == 1) checked @endif name="enable_whatsApp_vendor_update_booking" disabled value="1"> {{__("Enable send whatsApp to Vendor when update booking?")}}</label>
                                </div>
                                @if(@setting_item('enable_whatsApp_vendor_update_booking') != 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div class="form-group" data-condition="enable_whatsApp_vendor_update_booking:is(1)">
                                <label>{{__("Message to Customer")}}</label>
                                <div class="form-controls">
                                    <textarea name="whatsApp_message_vendor_update_booking" rows="8" class="form-control">{{setting_item_with_lang('whatsApp_message_vendor_update_booking',request()->query('lang')) ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="WhatsAppUserEventUpdateBooking">
                            @if(is_default_lang())
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(@setting_item('enable_whatsApp_user_update_booking') ?? '' == 1) checked @endif name="enable_whatsApp_user_update_booking" value="1"> {{__("Enable send whatsApp to Customer when update booking?")}}</label>
                                </div>
                            @else
                                <div class="form-group">
                                    <label> <input type="checkbox" @if(setting_item('enable_whatsApp_user_has_booking') ?? '' == 1) checked @endif name="enable_whatsApp_user_has_booking" disabled value="1"> {{__("Enable send whatsApp to Customer when update booking?")}}</label>
                                </div>
                                @if(@setting_item('enable_whatsApp_user_update_booking') != 1)
                                    <p>{{__('You must enable on main lang.')}}</p>
                                @endif
                            @endif
                            <div class="form-group" data-condition="enable_whatsApp_user_update_booking:is(1)">
                                <label>{{__("Message to Customer")}}</label>
                                <div class="form-controls">
                                    <textarea name="whatsApp_message_user_update_booking" rows="8" class="form-control">{{setting_item_with_lang('whatsApp_message_user_update_booking',request()->query('lang')) ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('WhatsApp Testing')}}</h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                        <label class="">{{__("Country")}}</label>
                        <select name="country" class="form-control" id="country-whatsApp-testing">
                            <option value="">{{__('-- Select --')}}</option>
                            @foreach(get_country_lists() as $id=>$name)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-controls">
                        <label class="">{{__("To (phone number)")}}</label>
                        <input type="number" class="form-control" id="to-whatsApp-testing" name="to"></input>
                    </div>

                    <div class="form-controls">
                        <label class="">{{__("Message")}}</label>
                        <textarea class="form-control" id="message-whatsApp-testing" name="message"></textarea>
                    </div>
                    <div class="form-controls">
                        <br>
                        <div id="whatsApp-testing" style="cursor: pointer;" class="btn btn-primary">{{__('Send WhatsApp Test')}}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-controls">
                        <div id="whatsApp-testing-alert" class="" role="alert">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script.body')
    <script>
        $(document).ready(function () {
            var cant_test = 1;
            $(document).on('click', '#whatsApp-testing', function (e) {
                event.preventDefault();
                var to = $('#to-whatsApp-testing').val();
                var message = $('#message-whatsApp-testing').val();
                var country = $('#country-whatsApp-testing').val();
                $.ajax({
                    url: '{{url('admin/module/whatsApp/testWhatsApp')}}',
                    type: 'get',
                    data: {to: to, country: country, message: message},
                    beforeSend: function () {
                        $('#whatsApp-testing').append(' <i class="fa  fa-spinner fa-spin"></i>').addClass('disabled');
                    },
                    success: function (res) {
                        if (res.error !== false) {
                            $('#whatsApp-testing-alert').removeClass().addClass('alert alert-warning').html(res.messages);
                        } else {
                            $('#whatsApp-testing-alert').removeClass().addClass('alert alert-success').html('<strong>WhatsApp Test Success!</strong>');
                        }
                        cant_test = 1;
                    },
                    complete: function () {
                        $('#whatsApp-testing').removeClass('disabled').find('i').remove();
                        cant_test = 1;
                    },
                    error: function (request, status, error) {
                        err = JSON.parse(request.responseText);
                        html = '<p><strong>' + request.statusText + '</strong></p><p>' + err.message + '</p>';
                        $('#whatsApp-testing-alert').removeClass().addClass('alert alert-warning').html(html);
                        cant_test = 1;
                    }
                })

                setTimeout(function () {
                    $('#whatsApp-testing-alert').html('').removeClass();
                }, 20000);
            })

        })
    </script>
@endsection
