<?php

namespace Modules\Classification\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Classification\Models\Classification;

class ClassificationController extends CrudController
{
    protected $modelName = Classification::class;

    public function __construct()
    {
        $this->setActiveMenu(route('supplier.admin.index'));
    }

    protected $titleList = [
        'index'     => 'Tipo de Quarto',
        'page'      => 'Tipo de Quarto',
        'create'    => 'Edit',
        'edit'      => 'Edit'
    ];

    protected $permissionList = [
        'index'     => 'classification_view',
        'manage'    => 'classification_manage_others',
        'create'    => 'classification_create',
        'update'    => 'classification_update',
        'delete'    => 'classification_delete',
    ];

    protected $routeList = [
        'index'     => 'classification.admin.index',
        'create'    => 'classification.admin.create',
        'edit'      => 'classification.admin.edit',
        'store'     => 'classification.admin.store',
        'bulk'      => 'classification.admin.bulkEdit',
        'recovery'  => 'classification.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Classification::admin.classification.index',
        'edit'      => 'Classification::admin.classification.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index']);
    }


}
