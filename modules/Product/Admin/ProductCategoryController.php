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
use Modules\Product\Models\ProductCategory;

class ProductCategoryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = ProductCategory::class;
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
        $row->fillByAttr(['description'],request()->input());
        if ($row->save()) {
            return response()->json([
                    'status' => 'success',
                    'message' => _('Categoria Criada com sucesso!')
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => _('Não foi possível criar categoria')
        ]);
    }
}
