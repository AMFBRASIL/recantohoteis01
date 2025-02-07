<?php

namespace Modules\WhatsApp\Listeners;

use Illuminate\Support\Facades\Log;
use Modules\Booking\Events\BookingCreatedEvent;
use Modules\Booking\Events\BookingUpdatedEvent;
use Modules\WhatsApp\Core\Facade\WhatsApp;
use Propaganistas\LaravelPhone\PhoneNumber;

class SendWhatsAppBookingListen
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $user;

    const CODE = [
        'id' => '[booking_id]',
        'total' => '[price]',
        'service_name' => '[service_name]',
        'start_date' => '[start_date]',
        'total_guests' => '[total_guests]',
    ];

    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param BookingCreatedEvent $event
     * @return void
     */
    public function handle(BookingUpdatedEvent $event)
    {
        /*$booking = $event->booking;
        $vendor = $booking->vendor;
        $adminPhone = setting_item('admin_phone_has_booking');
        $adminCountry = setting_item('admin_country_has_booking');
        if (!empty($booking->phone) and !empty($booking->country) and !empty(setting_item('enable_whatsApp_user_update_booking'))) {
            $message = $this->replaceMessage($booking, setting_item_with_lang('whatsApp_message_user_update_booking', app()->getLocale()));
            try {
                $to = (string)PhoneNumber::make($booking->phone)->ofCountry($booking->country);
                WhatsApp::to($to)->content($message)->send();
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }

        if (!empty($vendor->phone) and !empty($vendor->country) and !empty(setting_item('enable_whatsApp_vendor_update_booking'))) {
            $message = $this->replaceMessage($booking, setting_item_with_lang('whatsApp_message_vendor_update_booking', app()->getLocale()));
            try {
                $to = (string)PhoneNumber::make($vendor->phone)->ofCountry($vendor->country);
                WhatsApp::to($to)->content($message)->send();
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }

        if (!empty($adminPhone) and !empty($adminCountry) and !empty(setting_item('enable_whatsApp_admin_update_booking')) and !empty(setting_item('admin_phone_has_booking'))) {
            $message = $this->replaceMessage($booking, setting_item_with_lang('whatsApp_message_admin_update_booking', app()->getLocale()));
            try {
                $to = (string)PhoneNumber::make($adminPhone)->ofCountry($adminCountry);
                WhatsApp::to($to)->content($message)->send();
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }*/
    }

    public function replaceMessage($booking, $content)
    {
        if (!empty($content)) {
            foreach (self::CODE as $item => $value) {
                if ($value == '[service_name]') {
                    if (!empty($booking->service->title)) {
                        $content = str_replace('[service_name]', $booking->service->title, $content);
                    }
                } else {
                    $content = str_replace($value, @$booking->$item, $content);

                }
            }

        } else {
            return $this->replaceMessage($booking, $this->defaultContent());
        }
        return $content;
    }

    public function defaultContent()
    {
        return 'Service Name: [service_name]
					Price: [price]
					Date: [start_date]
					Total: [total_guests]';
    }
}
