<?php

namespace Modules\Situation;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouterServiceProvider extends ServiceProvider
{

    protected $adminModuleNamespace = 'Modules\Situation\Admin';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapAdminRoutes();
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware(['web','dashboard'])
            ->namespace($this->adminModuleNamespace)
            ->prefix('admin/module/situation')
            ->group(__DIR__ . '/Routes/admin.php');
    }
}
