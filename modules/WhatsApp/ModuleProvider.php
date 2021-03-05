<?php
namespace Modules\WhatsApp;
use Illuminate\Support\Facades\Event;
use Modules\Booking\Events\BookingCreatedEvent;
use Modules\Booking\Events\BookingUpdatedEvent;
use Modules\ModuleServiceProvider;
use Modules\WhatsApp\Core\WhatsappServiceProvider;
use Modules\WhatsApp\Listeners\SendWhatsappBookingListen;
use Modules\WhatsApp\Listeners\SendWhatsappUpdateBookingListen;

class ModuleProvider extends ModuleServiceProvider
{

	public function register()
	{
		$this->app->register(WhatsappServiceProvider::class);

	}
	public function boot(){
		Event::listen(BookingCreatedEvent::class,SendWhatsappBookingListen::class);
		Event::listen(BookingUpdatedEvent::class,SendWhatsappUpdateBookingListen::class);
	}
}
