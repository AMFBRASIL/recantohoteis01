<?php
namespace Modules\Financial;

use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{
    public function boot(){
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->publishes([
            __DIR__.'/Config/config.php' => config_path('financial.php'),
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
            __DIR__.'/Config/config.php', 'financial'
        );

        $this->app->register(RouteServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        return [
            'financial'=>[
                "position"=>40,
                'url'        => 'admin/module/financial',
                'title'      => __("Financeiro"),
                'icon'       => 'ion-md-cash',
                'permission' => 'news_view',
                'children'   => [
                    'billingType'=>[
                        'url'        => 'admin/module/financial/billingType',
                        'title'      => __("Tipo de Faturamento"),
                        'permission' => 'billing_view',
                    ],
                    'paymentMethods'=>[
                        'url'        => 'admin/module/financial/paymentMethod',
                        'title'      => __("Formas de Pagamento"),
                        'permission' => 'payment_methods_view',
                    ],
                    'bankAccount'=>[
                        'url'        => 'admin/module/financial/bankAccount',
                        'title'      => __("Conta Bancaria"),
                        'permission' => 'bank_account_view',
                    ],
                    'cardMachineAccount'=>[
                        'url'        => 'admin/module/financial/cardMachineAccount',
                        'title'      => __("Máquina de Cartão"),
                        'permission' => 'card_machine_account_view',
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
