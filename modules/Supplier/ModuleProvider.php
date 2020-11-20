<?php
namespace Modules\Supplier;

use Modules\Supplier\Models\Supplier;
use Modules\Supplier\Rou;
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
        if(!Supplier::isEnable()) return [];
        return [
            'supplier'=>[
                "position"=>33,
                'url'        => '#',
                'title'      => __('Cadastros'),
                'icon'       => 'ion-ios-folder-open',
                'permission' => 'event_view',
                'children'   => [
                    'add'=>[
                        'url'        => route('supplier.admin.index'),
                        'title'      => __('Fornecedores'),
                        'permission' => 'event_view',
                    ],
                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        if(!Supplier::isEnable()) return [];
        return [
            'event'=>Supplier::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Supplier::isEnable()) return [];
        return [
            'event'=>[
                'class' => Supplier::class,
                'name'  => __("Fornecedor"),
                'items' => Supplier::searchForMenu(),
                'position'=>51
            ]
        ];
    }

    public static function getTemplateBlocks(){
        if(!Supplier::isEnable()) return [];
        return [
            'form_search_event'=>"\\Modules\\Event\\Blocks\\FormSearchEvent",
            'list_event'=>"\\Modules\\Event\\Blocks\\ListEvent",
        ];
    }
}
