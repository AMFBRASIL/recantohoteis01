<?php

namespace Modules\Age\Admin;

use Modules\Age\Models\Age;
use Modules\Base\Admin\CrudController;

class AgeController extends CrudController
{
    protected $modelName = Age::class;

    public function __construct()
    {
        $this->setActiveMenu(route('supplier.admin.index'));
    }

    protected $titleList = [
        'index'     => 'Idades',
        'page'      => 'Idades',
        'create'    => 'Edit Idades',
        'edit'      => 'Edit Idades'
    ];

    protected $permissionList = [
        'index'     => 'age_view',
        'manage'    => 'age_manage_others',
        'create'    => 'age_create',
        'update'    => 'age_update',
        'delete'    => 'age_delete',
    ];

    protected $routeList = [
        'index'     => 'age.admin.index',
        'create'    => 'age.admin.create',
        'edit'      => 'age.admin.edit',
        'store'     => 'age.admin.store',
        'bulk'      => 'age.admin.bulkEdit',
        'recovery'  => 'age.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Age::admin.age.index',
        'edit'      => 'Age::admin.age.edit',
    ];

    protected $fieldSearchList = [
        'description'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index']);
    }


}
