<?php
	return[
        'default' => env('WHATSAPP_DRIVER', ''),
		'twilio'=>[
            'url'=>'https://api.twilio.com',
			'from'=>env('WHATSAPP_TWILIO_FROM','+12019480710'),
			'sid'=>env('WHATSAPP_TWILIO_ACCOUNTSID',''),
			'token'=>env('WHATSAPP_TWILIO_TOKEN',''),
		],
	];
