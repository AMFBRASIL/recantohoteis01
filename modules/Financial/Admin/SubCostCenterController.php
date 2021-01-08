<?php

namespace Modules\Financial\Admin;

use Illuminate\Http\Request;
use Modules\Base\Admin\CrudController;
use Modules\Financial\Models\CostCenter;
use Modules\Financial\Models\SubCostCenter;

class SubCostCenterController extends CrudController
{
    protected $modelName = SubCostCenter::class;
    protected $parentName = CostCenter::class;
    protected $parentField = 'cost_center_id';

    protected $titleList = [
        'index' => 'Sub Custos',
        'page' => 'Sub Custos',
        'create' => 'Sub Custo',
        'edit' => 'Sub Custo'
    ];

    protected $permissionList = [
        'index' => 'sub_cost_view',
        'manage' => 'sub_cost_manage_others',
        'create' => 'sub_cost_create',
        'update' => 'sub_cost_update',
        'delete' => 'sub_cost_delete',
    ];

    protected $routeList = [
        'index' => 'financial.admin.sub.cost.index',
        'create' => 'financial.admin.sub.cost.create',
        'edit' => 'financial.admin.sub.cost.edit',
        'store' => 'financial.admin.sub.cost.store',
        'bulk' => 'financial.admin.sub.cost.bulkEdit',
        'recovery' => 'financial.admin.sub.cost.recovery',
    ];

    protected $viewList = [
        'index' => 'Financial::admin.sub_cost.index',
        'edit' => 'Financial::admin.sub_cost.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index'], $model->cost_center_id);
    }


    public function getForSelect2(Request $request, $costCenter)
    {
        $q = $request->query('q');
        $query = $this->modelName::getForSelect2Query($q, $costCenter);
        $res = $query->orderBy('id', 'desc')->limit(20)->get();

        return response()->json([
            'results' => $res
        ]);
    }
}
