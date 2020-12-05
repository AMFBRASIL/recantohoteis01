<?php

namespace Modules\Governance\Admin;

use Illuminate\Http\Request;
use Modules\Base\Admin\CrudController;
use Modules\Governance\Models\ChecklistType;

class ChecklistTypeController extends CrudController
{
    protected $modelName = ChecklistType::class;

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
        $row->fill(request()->input());
        if ($row->save()) {
            return response()->json([
                'status' => 'success',
                'message' => _('Tipo Criado com sucesso!')
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => _('Não foi possível criar o tipo')
        ]);
    }
}
