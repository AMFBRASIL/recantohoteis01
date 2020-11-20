<?php

namespace Modules\Hotel\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Hotel\Models\Building;

class BuildingController extends CrudController
{
    protected $modelName = Building::class;

    protected $titleList = [
        'index'     => 'Empreendimentos',
        'page'      => 'Empreendimentos',
        'create'    => 'Empreendimento',
        'edit'      => 'Empreendimento'
    ];

    protected $permissionList = [
        'index'     => 'building_view',
        'manage'    => 'building_manage_others',
        'create'    => 'building_create',
        'update'    => 'building_update',
        'delete'    => 'building_delete',
    ];

    protected $routeList = [
        'index'     => 'building.admin.index',
        'create'    => 'building.admin.create',
        'edit'      => 'building.admin.edit',
        'store'     => 'building.admin.store',
        'bulk'      => 'building.admin.bulkEdit',
        'recovery'  => 'building.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Hotel::admin.building.index',
        'edit'      => 'Hotel::admin.building.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index']);
    }
}
