<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/30/2019
 * Time: 1:56 PM
 */
namespace Modules\Product\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Product\Models\ProductIPI;

class ProductIPIController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = ProductIPI::class;
    }

    public function getForSelect2(Request $request)
    {
        $q = $request->query('q');
        $query = $this->model::getForSelect2Query($q);
        $res = $query->orderBy('id', 'desc')->limit(20)->get();

        return response()->json([
            'results' => $res
        ]);
    }

    public function ajaxStore()
    {
        $row = new $this->model();
        $row->fillByAttr(['code', 'description'],request()->input());
        if ($row->save()) {
            return response()->json([
                    'status' => 'success',
                    'message' => _('IPI Criado com sucesso!')
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => _('Não foi possível criar IPI')
        ]);
    }
}
