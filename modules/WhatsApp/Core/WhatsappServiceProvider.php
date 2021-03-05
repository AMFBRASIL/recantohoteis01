<?php

namespace Modules\WhatsApp\Core ;

use Modules\WhatsApp\ModuleProvider;

class WhatsappServiceProvider extends ModuleProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot(){
    	$this->publishes([
		    __DIR__.'/Config/whatsapp.php'=>config_path('whatsapp.php')
	    ]);
    }
    public function register()
    {
	    $this->mergeConfigFrom(
		    __DIR__.'/Config/whatsapp.php', 'whatsapp'
	    );
        $this->app->singleton('whatsapp', function ($app) {
            return new WhatsappManager($app);
        });

    }
	/**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['whatsapp'];
    }
}
