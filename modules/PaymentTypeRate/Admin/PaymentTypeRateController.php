<?php

namespace Modules\PaymentTypeRate\Admin;

use Modules\Base\Admin\CrudController;
use Modules\PaymentTypeRate\Models\PaymentTypeRate;

class PaymentTypeRateController extends CrudController
{
    protected $modelName = PaymentTypeRate::class;

    public function __construct()
    {
        $this->setActiveMenu(route('paymentTypeRate.admin.index'));
    }

    protected $titleList = [
        'index'     => 'Tipo de Pagamentos e Taxas',
        'page'      => 'Tipo de Pagamentos e Taxas',
        'create'    => 'Tipo de Pagamentos e Taxas',
        'edit'      => 'Tipo de Pagamentos e Taxas'
    ];

    protected $permissionList = [
        'index'     => 'paymentTypeRate_view',
        'manage'    => 'paymentTypeRate_manage_others',
        'create'    => 'paymentTypeRate_create',
        'update'    => 'paymentTypeRate_update',
        'delete'    => 'paymentTypeRate_delete',
    ];

    protected $routeList = [
        'index'     => 'paymentTypeRate.admin.index',
        'create'    => 'paymentTypeRate.admin.create',
        'edit'      => 'paymentTypeRate.admin.edit',
        'store'     => 'paymentTypeRate.admin.store',
        'bulk'      => 'paymentTypeRate.admin.bulkEdit',
        'recovery'  => 'paymentTypeRate.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'PaymentTypeRate::admin.paymentTypeRate.index',
        'edit'      => 'PaymentTypeRate::admin.paymentTypeRate.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index']);
    }


}
