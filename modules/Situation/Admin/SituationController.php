<?php

namespace Modules\Situation\Admin;

use Illuminate\Http\Request;
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
        'index' => 'Situações',
        'page' => 'Situações',
        'create' => 'Edit',
        'edit' => 'Edit'
    ];

    protected $permissionList = [
        'index' => 'situation_view',
        'manage' => 'situation_manage_others',
        'create' => 'situation_create',
        'update' => 'situation_update',
        'delete' => 'situation_delete',
    ];

    protected $routeList = [
        'index' => 'situation.admin.index',
        'create' => 'situation.admin.create',
        'edit' => 'situation.admin.edit',
        'store' => 'situation.admin.store',
        'bulk' => 'situation.admin.bulkEdit',
        'recovery' => 'situation.admin.recovery',
    ];

    protected $viewList = [
        'index' => 'Situation::admin.situation.index',
        'edit' => 'Situation::admin.situation.edit',
    ];

    protected $fieldSearchList = [
        'name',
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index']);
    }

    public function index(Request $request)
    {
        $this->checkPermission($this->permissionList['create']);

        $query = $this->modelName::query();
        $query->orderBy('id', 'desc');

        if (!empty($s = $request->input('s'))) {
            foreach ($this->fieldSearchList as $field) {
                $query->where($field, 'LIKE', '%' . $s . '%');
            }
        }

        if (!empty($s = $request->input('section_id'))) {
            $query->where('section_id', '=', $s);

        }

        $data = [
            'rows' => $query->with(['author'])->paginate(20),
            'permission_manage' => $this->hasPermission($this->permissionList['manage']),
            'page_title' => $this->titleList['page'],
            'route_list' => $this->routeList,
            'breadcrumbs' => [
                [
                    'name' => __("{$this->titleList['page']}"),
                    'class' => 'active'
                ],
            ],
        ];

        return view($this->viewList['index'], $data);
    }
}
