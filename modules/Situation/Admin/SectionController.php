<?php

namespace Modules\Situation\Admin;

use Illuminate\Http\Request;
use Modules\Base\Admin\CrudController;
use Modules\Situation\Models\Section;

class SectionController extends CrudController
{
    protected $modelName = Section::class;

    public function __construct()
    {
        $this->setActiveMenu('admin/module/core/settings/index/general');
    }

    protected $titleList = [
        'index'     => 'Setor',
        'page'      => 'Setor',
        'create'    => 'Setor',
        'edit'      => 'Setor'
    ];

    protected $permissionList = [
        'index'     => 'section_view',
        'manage'    => 'section_manage_others',
        'create'    => 'section_create',
        'update'    => 'section_update',
        'delete'    => 'section_delete',
    ];

    protected $routeList = [
        'index'     => 'section.admin.index',
        'create'    => 'section.admin.create',
        'edit'      => 'section.admin.edit',
        'store'     => 'section.admin.store',
        'bulk'      => 'section.admin.bulkEdit',
        'recovery'  => 'section.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Section::admin.situation.index',
        'edit'      => 'Section::admin.situation.edit',
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
        $query = $this->modelName::getForSelect2Query($q);
        $res = $query->orderBy('id', 'desc')->limit(20)->get();

        return response()->json([
            'results' => $res
        ]);
    }

    public function ajaxStore()
    {
        $row = new $this->modelName();
        if (request()->get('section_id')) {
            $row = $this->modelName::find(request()->get('section_id'));
        }

        $row->fill(request()->input());
        if ($row->save()) {
            return response()->json([
                'status' => 'success',
                'message' => _('Setor criado/atualizado com sucesso!')
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => _('Não foi possível criar/atualizar Setor')
        ]);
    }
}
