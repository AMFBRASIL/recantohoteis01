<?php
namespace Modules\Product;

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
            'product'=>[
                "position"=>33,
                'url'        => "/admin/module/product",
                'title'      => __('Produtos'),
                'icon'       => 'icon ion-ios-pricetag',
                'permission' => 'event_view',
                'children'   => [
                    'add'=>[
                        'url'        => route('product.admin.index'),
                        'title'      => __('Gerenciar Produtos'),
                        'permission' => 'event_view',
                    ],
                    'product_category'=>[
                        'url'        => route('product_category.admin.create'),
                        'title'      => __('Categorias'),
                        'permission' => 'event_view',
                    ],
                    'product_unity'=>[
                        'url'        => route('product_unity.admin.create'),
                        'title'      => __('Unidade de Produto'),
                        'permission' => 'event_view',
                    ]
                ]
            ]
        ];
    }
}
