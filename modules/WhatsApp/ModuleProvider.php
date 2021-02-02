<?php
namespace Modules\WhatsApp;
use Illuminate\Support\Facades\Event;
use Modules\Booking\Events\BookingCreatedEvent;
use Modules\Booking\Events\BookingUpdatedEvent;
use Modules\ModuleServiceProvider;
use Modules\WhatsApp\Core\WhatsAppServiceProvider;
use Modules\WhatsApp\Listeners\SendWhatsAppBookingListen;
use Modules\WhatsApp\Listeners\SendWhatsAppUpdateBookingListen;

class ModuleProvider extends ModuleServiceProvider
{

	public function register()
	{
		$this->app->register(WhatsAppServiceProvider::class);

	}
	public function boot(){
		Event::listen(BookingCreatedEvent::class,SendWhatsAppBookingListen::class);
		Event::listen(BookingUpdatedEvent::class,SendWhatsAppUpdateBookingListen::class);
	}
}
