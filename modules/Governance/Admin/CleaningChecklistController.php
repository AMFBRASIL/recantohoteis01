<?php

namespace Modules\Governance\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Governance\Models\CleaningChecklist;

class CleaningChecklistController extends CrudController
{
    protected $modelName = CleaningChecklist::class;

    public function __construct()
    {
        $this->setActiveMenu(route('supplier.admin.index'));
    }

    protected $titleList = [
        'index'     => 'CheckList Limpeza',
        'page'      => 'CheckList Limpeza',
        'create'    => 'CheckList Limpeza',
        'edit'      => 'CheckList Limpeza'
    ];

    protected $permissionList = [
        'index'     => 'cleaning_checklist_view',
        'manage'    => 'cleaning_checklist_manage_others',
        'create'    => 'cleaning_checklist_create',
        'update'    => 'cleaning_checklist_update',
        'delete'    => 'cleaning_checklist_delete',
    ];

    protected $routeList = [
        'index'     => 'cleaning_checklist.admin.index',
        'create'    => 'cleaning_checklist.admin.create',
        'edit'      => 'cleaning_checklist.admin.edit',
        'store'     => 'cleaning_checklist.admin.store',
        'bulk'      => 'cleaning_checklist.admin.bulkEdit',
        'recovery'  => 'cleaning_checklist.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Governance::admin.cleaning_checklist.index',
        'edit'      => 'Governance::admin.cleaning_checklist.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];
}
