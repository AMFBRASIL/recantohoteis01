<?php

namespace Modules\WhatsApp\Core;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Manager;
use Modules\WhatsApp\Core\Drivers\TwilioDriver;

class WhatsAppManager extends Manager
{
	public function channel($name = null)
    {
        return $this->driver($name);
    }

	public function createTwilioDriver()
	{
		\config()->set('whatsApp.twilio.from',setting_item('whatsApp_twilio_api_from',\config('whatsApp.twilio.from')));
		\config()->set('whatsApp.twilio.sid',setting_item('whatsApp_twilio_account_sid',\config('whatsApp.twilio.sid')));
		\config()->set('whatsApp.twilio.token',setting_item('whatsApp_twilio_account_token',\config('whatsApp.twilio.token')));
		return new TwilioDriver(
			$this->app['config']['whatsApp.twilio']
		);
	}

    /**
     * Get the default SMS driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
	    $channel = setting_item('whatsApp_driver');
	    Config::set('whatsApp.default', $channel);
	    return $this->app['config']['sms.default'] ?? '';
    }
}
