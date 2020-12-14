<?php
namespace Modules\Situation;

use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
    }

    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }
}
