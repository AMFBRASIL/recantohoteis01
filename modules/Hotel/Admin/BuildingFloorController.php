<?php

namespace Modules\Hotel\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Hotel\Models\Building;
use Modules\Hotel\Models\BuildingFloor;

class BuildingFloorController extends CrudController
{
    protected $modelName = BuildingFloor::class;
    protected $parentName = Building::class;
    protected $parentField = 'building_id';

    protected $titleList = [
        'index'     => 'Andares',
        'page'      => 'Andares',
        'create'    => 'Andar',
        'edit'      => 'Andar'
    ];

    protected $permissionList = [
        'index'     => 'building_floor_view',
        'manage'    => 'building_floor_manage_others',
        'create'    => 'building_floor_create',
        'update'    => 'building_floor_update',
        'delete'    => 'building_floor_delete',
    ];

    protected $routeList = [
        'index'     => 'building_floor.admin.index',
        'create'    => 'building_floor.admin.create',
        'edit'      => 'building_floor.admin.edit',
        'store'     => 'building_floor.admin.store',
        'bulk'      => 'building_floor.admin.bulkEdit',
        'recovery'  => 'building_floor.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Hotel::admin.building_floor.index',
        'edit'      => 'Hotel::admin.building_floor.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index'], $model->building_id);
    }
}
