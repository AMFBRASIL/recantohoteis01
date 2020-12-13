<?php

namespace Modules\Situation\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Situation\Models\Situation;

class SituationController extends CrudController
{
    protected $modelName = Situation::class;

    public function __construct()
    {
        $this->setActiveMenu('admin/module/core/settings/index/general');
    }

    protected $titleList = [
        'index'     => 'Situações',
        'page'      => 'Situações',
        'create'    => 'Situação',
        'edit'      => 'Situação'
    ];

    protected $permissionList = [
        'index'     => 'situation_view',
        'manage'    => 'situation_manage_others',
        'create'    => 'situation_create',
        'update'    => 'situation_update',
        'delete'    => 'situation_delete',
    ];

    protected $routeList = [
        'index'     => 'situation.admin.index',
        'create'    => 'situation.admin.create',
        'edit'      => 'situation.admin.edit',
        'store'     => 'situation.admin.store',
        'bulk'      => 'situation.admin.bulkEdit',
        'recovery'  => 'situation.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Situation::admin.situation.index',
        'edit'      => 'Situation::admin.situation.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index']);
    }


}
