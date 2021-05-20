<?php

namespace Modules\Garage\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Garage\Models\Garage;

class GarageController extends CrudController
{
    protected $modelName = Garage::class;

    public function __construct()
    {
        $this->setActiveMenu(route('garage.admin.index'));
    }

    protected $titleList = [
        'index' => 'Garagem do Hotel',
        'page' => 'Garagem do Hotel',
        'create' => 'Edit',
        'edit' => 'Edit'
    ];

    protected $permissionList = [
        'index' => 'garage_view',
        'manage' => 'garage_manage_others',
        'create' => 'garage_create',
        'update' => 'garage_update',
        'delete' => 'garage_delete',
    ];

    protected $routeList = [
        'index' => 'garage.admin.index',
        'create' => 'garage.admin.create',
        'edit' => 'garage.admin.edit',
        'store' => 'garage.admin.store',
        'bulk' => 'garage.admin.bulkEdit',
        'recovery' => 'garage.admin.recovery',
    ];

    protected $viewList = [
        'index' => 'Garage::admin.garage.index',
        'edit' => 'Garage::admin.garage.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index']);
    }

    public function garages(){
        $garages = Garage::all();

        return response()->json([
            'error' => false,
            'garages' => $garages,
        ]);
    }
}
