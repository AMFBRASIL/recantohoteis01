<?php

namespace Modules\WhatsApp\Core;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Manager;
use Modules\Sms\Core\Drivers\NullDriver;
use Modules\WhatsApp\Core\Drivers\TwilioDriver;

class WhatsappManager extends Manager
{
	public function channel($name = null)
    {
        return $this->driver($name);
    }

	public function createTwilioDriver()
	{
		\config()->set('whatsapp.twilio.from',setting_item('whatsapp_twilio_api_from',\config('whatsapp.twilio.from')));
		\config()->set('whatsapp.twilio.sid',setting_item('whatsapp_twilio_account_sid',\config('whatsapp.twilio.sid')));
		\config()->set('whatsapp.twilio.token',setting_item('whatsapp_twilio_account_token',\config('whatsapp.twilio.token')));
		return new TwilioDriver(
			$this->app['config']['whatsapp.twilio']
		);
	}

    public function getDefaultDriver()
    {
	    $channel = setting_item('whatsapp_driver');
        Config::set('whatsapp.default', $channel);
        return $this->app['config']['whatsapp.default'] ?? '';
    }
}
