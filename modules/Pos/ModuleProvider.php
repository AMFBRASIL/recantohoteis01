<?php
namespace Modules\Pos;

use Modules\Pos\RouteServiceProvider;
use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{
    public function boot(){
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->publishes([
            __DIR__.'/Config/config.php' => config_path('pos.php'),
        ]);
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/config.php', 'pos'
        );

        $this->app->register(RouteServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        return [
            'pos'=>[
                "position"=>39,
                'url'        => 'admin/module/pos/consumptionCard',
                'title'      => __("Pos"),
                'icon'       => 'fa fa-building-o',
                'permission' => 'consumptionCard_view',
                'children'   => [
                    'consumptionCard'=>[
                        'url'        => 'admin/module/pos/consumptionCard',
                        'title'      => __("Cartao de Consumo"),
                        'permission' => 'consumptionCard_view',
                    ],
                ]
            ],
        ];
    }

    public static function getTemplateBlocks(){
        return [
        ];
    }
}
