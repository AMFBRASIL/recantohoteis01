<?php
namespace Modules\Stock;

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
            'stock'=>[
                "position"=>34,
                'url'        => "/admin/module/stock/create",
                'title'      => __('Estoque'),
                'icon'       => 'icon ion-ios-business',
                'permission' => 'event_view',
                'children'   => [
                    'add'=>[
                        'url'        => route('stock.admin.create'),
                        'title'      => __('Centro de Custo'),
                        'permission' => 'event_view',
                    ],
                    'adjustment'=>[
                        'url'        => route('stock_adjustment.admin.index'),
                        'title'      => __('Ajustes'),
                        'permission' => 'event_view',
                    ],
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
