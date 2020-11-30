<?php

namespace Modules\Company\Admin;

use Modules\Base\Admin\CrudController;
use Modules\Company\Models\Company;

class CompanyController extends CrudController
{
    protected $modelName = Company::class;

    public function __construct()
    {
        $this->setActiveMenu(route('supplier.admin.index'));
    }

    protected $titleList = [
        'index'     => 'Empresas',
        'page'      => 'Empresas',
        'create'    => 'Empresa',
        'edit'      => 'Empresa'
    ];

    protected $permissionList = [
        'index'     => 'company_view',
        'manage'    => 'company_manage_others',
        'create'    => 'company_create',
        'update'    => 'company_update',
        'delete'    => 'company_delete',
    ];

    protected $routeList = [
        'index'     => 'company.admin.index',
        'create'    => 'company.admin.create',
        'edit'      => 'company.admin.edit',
        'store'     => 'company.admin.store',
        'bulk'      => 'company.admin.bulkEdit',
        'recovery'  => 'company.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Company::admin.company.index',
        'edit'      => 'Company::admin.company.edit',
    ];

    protected $fieldSearchList = [
        'title'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index'], $model->id);
    }


}
