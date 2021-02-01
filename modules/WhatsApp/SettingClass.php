<?php

namespace Modules\WhatsApp;

use Modules\Core\Abstracts\BaseSettingsClass;

class SettingClass extends BaseSettingsClass
{
    const WHATSAPP_DRIVER = [
        "twilio"
    ];

    public static function getSettingPages()
    {
        return [
            [
                'id' => 'whatsapp',
                'title' => __("WhatsApp Settings"),
                'position' => 100,
                'view' => "WhatsApp::admin.settings.whatsApp",
                "keys" => [
                    'whatsApp_twilio_api_from',
                    'whatsApp_twilio_account_sid',
                    'whatsApp_twilio_account_token',

//						 Admin phonenumber config
                    'admin_phone_has_booking',
                    'admin_country_has_booking',
//						event create booking
                    'enable_whatsApp_admin_has_booking',
                    'whatsApp_message_admin_when_booking',
                    'enable_whatsApp_vendor_has_booking',
                    'whatsApp_message_vendor_when_booking',
                    'enable_whatsApp_user_has_booking',
                    'whatsApp_message_user_when_booking',
//						event update booking
                    'enable_whatsApp_admin_update_booking',
                    'whatsApp_message_admin_update_booking',
                    'enable_whatsApp_vendor_update_booking',
                    'whatsApp_message_vendor_update_booking',
                    'enable_whatsApp_user_update_booking',
                    'whatsApp_message_user_update_booking',
                ],
                'html_keys' => [

                ]
            ]
        ];
    }
}
