<?php

namespace Modules\Reservation\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Reservation\Models\PensionType;

class PensionTypeController extends CrudController
{
    protected $modelName = PensionType::class;

    protected $titleList = [
        'index'     => 'Tipos de Pensão',
        'page'      => 'Tipos de Pensão',
        'create'    => 'Tipo de Pensão',
        'edit'      => 'Tipo de Pensão'
    ];

    protected $permissionList = [
        'index'     => 'pension_type_view',
        'manage'    => 'pension_type_manage_others',
        'create'    => 'pension_type_create',
        'update'    => 'pension_type_update',
        'delete'    => 'pension_type_delete',
    ];

    protected $routeList = [
        'index'     => 'pension_type.admin.index',
        'create'    => 'pension_type.admin.create',
        'edit'      => 'pension_type.admin.edit',
        'store'     => 'pension_type.admin.store',
        'bulk'      => 'pension_type.admin.bulkEdit',
        'recovery'  => 'pension_type.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Reservation::admin.pension_type.index',
        'edit'      => 'Reservation::admin.pension_type.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index'], $model->id);
    }
}
