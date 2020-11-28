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
        if(!Product::isEnable()) return [];
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
                    ]
                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        if(!Product::isEnable()) return [];
        return [
            'event'=>Product::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Product::isEnable()) return [];
        return [
            'event'=>[
                'class' => Product::class,
                'name'  => __("Product"),
                'items' => Product::searchForMenu(),
                'position'=>51
            ]
        ];
    }

    public static function getTemplateBlocks(){
        if(!Product::isEnable()) return [];
        return [
            'form_search_event'=>"\\Modules\\Event\\Blocks\\FormSearchEvent",
            'list_event'=>"\\Modules\\Event\\Blocks\\ListEvent",
        ];
    }
}
