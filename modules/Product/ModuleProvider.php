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
        if(!Product::isEnable()) return [];
        return [
            'product'=>[
                "position"=>33,
                'url'        => "#",
                'title'      => __('Produtos'),
                'icon'       => 'icon ion-ios-pricetag',
                'permission' => 'event_view',
                'children'   => [
                    'add'=>[
                        'url'        => route('product.admin.index'),
                        'title'      => __('Gerenciar Produtos'),
                        'permission' => 'event_view',
                    ],
//                    'product_category'=>[
//                        'url'        => route('product_category.admin.index'),
//                        'title'      => __('Categorias'),
//                        'permission' => 'event_view',
//                    ],
//                    'product_unity'=>[
//                        'url'        => route('product_unity.admin.index'),
//                        'title'      => __('Categorias'),
//                        'permission' => 'event_view',
//                    ],
//                    'product_tag'=>[
//                        'url'        => route('product_tag.admin.index'),
//                        'title'      => __('Etiquetas'),
//                        'permission' => 'event_view',
//                    ]
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
