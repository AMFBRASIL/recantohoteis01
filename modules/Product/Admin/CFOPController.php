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
use Modules\Product\Models\CFOP;

class CFOPController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = CFOP::class;
    }

    public function getForSelect2(Request $request)
    {
        $q = $request->query('q');
        $query = $this->model::getForSelect2Query($q);
        $res = $query->orderBy('id', 'asc')->limit(20)->get();

        return response()->json([
            'results' => $res
        ]);
    }
}
