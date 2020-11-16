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
use Modules\Product\Models\ProductUnity;

class ProductUnityController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = ProductUnity::class;
    }

    public function getForSelect2(Request $request)
    {
//        $pre_selected = $request->query('pre_selected');
//        $selected = $request->query('selected');
//
//        if($pre_selected && $selected){
//            if(is_array($selected))
//            {
//                $query = $this->termsClass::getForSelect2Query('Car');
//                $items = $query->whereIn('bravo_terms.id',$selected)->take(50)->get();
//                return response()->json([
//                    'items'=>$items
//                ]);
//            }
//
//            if(empty($item)){
//                return response()->json([
//                    'text'=>''
//                ]);
//            }else{
//                return response()->json([
//                    'text'=>$item->name
//                ]);
//            }
//        }

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
        $row->fillByAttr(['acronym', 'description'],request()->input());
        if ($row->save()) {
            return response()->json([
                    'status' => 'success',
                    'message' => _('Unidade Criada com sucesso!')
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => _('Não foi possível criar a unidade')
        ]);
    }
}
