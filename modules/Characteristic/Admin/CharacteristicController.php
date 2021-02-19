<?php

namespace Modules\Characteristic\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Characteristic\Models\Characteristic;

class CharacteristicController extends CrudController
{
    protected $modelName = Characteristic::class;

    public function __construct()
    {
        $this->setActiveMenu(route('supplier.admin.index'));
    }

    protected $titleList = [
        'index'     => 'Característica de Quarto',
        'page'      => 'Característica de Quarto',
        'create'    => 'Edit',
        'edit'      => 'Edit'
    ];

    protected $permissionList = [
        'index'     => 'characteristic_view',
        'manage'    => 'characteristic_manage_others',
        'create'    => 'characteristic_create',
        'update'    => 'characteristic_update',
        'delete'    => 'characteristic_delete',
    ];

    protected $routeList = [
        'index'     => 'characteristic.admin.index',
        'create'    => 'characteristic.admin.create',
        'edit'      => 'characteristic.admin.edit',
        'store'     => 'characteristic.admin.store',
        'bulk'      => 'characteristic.admin.bulkEdit',
        'recovery'  => 'characteristic.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Characteristic::admin.characteristic.index',
        'edit'      => 'Characteristic::admin.characteristic.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index']);
    }
}
