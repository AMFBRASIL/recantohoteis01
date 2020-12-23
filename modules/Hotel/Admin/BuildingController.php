<?php

namespace Modules\Hotel\Admin;

use Illuminate\Http\Request;
use Modules\Base\Admin\CrudController;
use Modules\Hotel\Models\Building;

class BuildingController extends CrudController
{
    protected $modelName = Building::class;

    protected $titleList = [
        'index'     => 'Blocos',
        'page'      => 'Blocos',
        'create'    => 'Bloco',
        'edit'      => 'Bloco'
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

    public function getForSelect2(Request $request)
    {
        $q = $request->query('q');
        $query = $this->modelName::getForSelect2Query($q, true);
        $res = $query->orderBy('id', 'desc')->limit(20)->get();

        return response()->json([
            'results' => $res
        ]);
    }
}
