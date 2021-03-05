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
                    'whatsapp_driver',
                    'whatsapp_twilio_api_from',
                    'whatsapp_twilio_account_sid',
                    'whatsapp_twilio_account_token',

//						 Admin phonenumber config
                    'admin_phone_has_booking',
                    'admin_country_has_booking',
//						event create booking
                    'enable_whatsapp_admin_has_booking',
                    'whatsapp_message_admin_when_booking',
                    'enable_whatsapp_vendor_has_booking',
                    'whatsapp_message_vendor_when_booking',
                    'enable_whatsapp_user_has_booking',
                    'whatsapp_message_user_when_booking',
//						event update booking
                    'enable_whatsapp_admin_update_booking',
                    'whatsapp_message_admin_update_booking',
                    'enable_whatsapp_vendor_update_booking',
                    'whatsapp_message_vendor_update_booking',
                    'enable_whatsapp_user_update_booking',
                    'whatsapp_message_user_update_booking',
                ],
                'html_keys' => [

                ]
            ]
        ];
    }
}
