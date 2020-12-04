<?php

namespace Modules\PointOfSale\Admin;

use Modules\Base\Admin\CrudController;
use Modules\PointOfSale\Models\PointOfSale;
use Modules\Reservation\Models\ReservationType;

class PointOfSaleController extends CrudController
{
    protected $modelName = PointOfSale::class;

    public function __construct()
    {
        $this->setActiveMenu(route('supplier.admin.index'));
    }

    protected $titleList = [
        'index'     => 'Ponto de Venda',
        'page'      => 'Ponto de Venda',
        'create'    => 'Ponto de Venda',
        'edit'      => 'Ponto de Venda'
    ];

    protected $permissionList = [
        'index'     => 'point_of_sale_view',
        'manage'    => 'point_of_sale_manage_others',
        'create'    => 'point_of_sale_create',
        'update'    => 'point_of_sale_update',
        'delete'    => 'point_of_sale_delete',
    ];

    protected $routeList = [
        'index'     => 'point_of_sale.admin.index',
        'create'    => 'point_of_sale.admin.create',
        'edit'      => 'point_of_sale.admin.edit',
        'store'     => 'point_of_sale.admin.store',
        'bulk'      => 'point_of_sale.admin.bulkEdit',
        'recovery'  => 'point_of_sale.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'PointOfSale::admin.point_of_sale.index',
        'edit'      => 'PointOfSale::admin.point_of_sale.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index'], $model->id);
    }


}
