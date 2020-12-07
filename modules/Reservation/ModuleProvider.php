<?php
namespace Modules\Reservation;

use Modules\Product\Models\Product;
use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(){

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        return [
            'reservation'=>[
                "position"=>34,
                'url'        => "/admin/module/reservation",
                'title'      => __('Reservas'),
                'icon'       => 'icon ion-ios-bed',
                'permission' => 'reservation_view',
                'children'   => [
                    'pension_type'=>[
                        'url'        => route('pension_type.admin.index'),
                        'title'      => __('Tipo de Pensão'),
                        'permission' => 'pension_type_view',
                    ],
                    'reservation_type'=>[
                        'url'        => route('reservation_type.admin.index'),
                        'title'      => __('Canais de Venda'),
                        'permission' => 'reservation_type_view',
                    ],
                    'check_availability'=>[
                        'url'        => route('check_availability.admin.index'),
                        'title'      => __('Verificar disponibilidade'),
                        'permission' => 'check_availability_view',
                    ]
                ]
            ]
        ];
    }
}
