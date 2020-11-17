<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/30/2019
 * Time: 1:56 PM
 */
namespace Modules\Product\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Product\Models\ProductCategory;
use Modules\Product\Models\ProductCategoryTranslation;

class ProductCategoryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu(route('product_category.admin.create'));
        $this->model = ProductCategory::class;
        $this->model_translation = ProductCategoryTranslation::class;
    }

    public function create(Request $request)
    {
        $this->checkPermission('event_create');
        $query = $this->model::query() ;
        $query->orderBy('id', 'desc');
        if (!empty($s = $request->input('s'))) {
            $query->where('description', 'LIKE', '%' . $s . '%');
            $query->orderBy('description', 'asc');
        }

        if ($this->hasPermission('event_manage_others')) {
            if (!empty($author = $request->input('vendor_id'))) {
                $query->where('create_user', $author);
            }
        } else {
            $query->where('create_user', Auth::id());
        }
        $data = [
            'rows'               => $query->with(['author'])->paginate(20),
            'event_manage_others' => $this->hasPermission('event_manage_others'),
            'breadcrumbs'        => [
                [
                    'name' => __('Categoria Produto'),
                    'url'  => route('product_category.admin.create')
                ],
                [
                    'name'  => __('Categorias'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Categoria Produto")
        ];

        return view('Product::admin.product_category.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('event_update');
        $row = $this->model::find($id);
        if (empty($row)) {
            return redirect(route('product_category.admin.index'));
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        if (!$this->hasPermission('event_manage_others')) {
            if ($row->create_user != Auth::id()) {
                return redirect(route('product_category.admin.index'));
            }
        }

        $data = [
            'row'            => $row,
            'translation'    => $translation,
            'enable_multi_lang'=>true,
            'breadcrumbs'        => [
                [
                    'name' => __('Categoria Produto'),
                    'url'  => route('product_category.admin.create')
                ],
                [
                    'name'  => __('Categorias'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Categoria Produto")
        ];
        return view('Product::admin.product_category.edit', $data);
    }

    public function store( Request $request, $id )
    {
        if($id>0){
            $this->checkPermission('event_update');
            $row = $this->model::find($id);
            if (empty($row)) {
                return redirect(route('product_category.admin.create'));
            }

            if($row->create_user != Auth::id() and !$this->hasPermission('event_manage_others'))
            {
                return redirect(route('product_category.admin.index'));
            }
        }else{
            $this->checkPermission('event_create');
            $row = new $this->model();
        }

        $dataKeys = [
            //Info
            'description',
            'enable_hide'
        ];

        if($this->hasPermission('event_manage_others')){
            $dataKeys[] = 'create_user';
        }

        $row->fillByAttr($dataKeys,$request->input());
        $res = $row->saveOriginOrTranslation($request->input('lang'),true);
        if ($res) {
            if($id > 0 ){
                return back()->with('success',  __('Categoria Atualizada') );
            }else{
                return redirect(route('product_category.admin.edit',$row->id))->with('success', __('Categoria Criada') );
            }
        }
    }

    public function bulkEdit(Request $request)
    {
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }

        switch ($action){
            case "delete":
                foreach ($ids as $id) {
                    $query = $this->model::where("id", $id);
                    if (!$this->hasPermission('event_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('event_delete');
                    }
                    $query->first();
                    if(!empty($query)){
                        $query->delete();
                    }
                }
                return redirect()->back()->with('success', __('Deleted success!'));
                break;
            case "recovery":
                foreach ($ids as $id) {
                    $query = $this->model::where("id", $id);
                    if (!$this->hasPermission('event_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('event_delete');
                    }
                    $query->first();
                    if(!empty($query)){
                        $query->restore();
                    }
                }
                return redirect()->back()->with('success', __('Recovery success!'));
                break;
            case "clone":
                $this->checkPermission('event_create');
                foreach ($ids as $id) {
                    (new $this->model())->saveCloneByID($id);
                }
                return redirect()->back()->with('success', __('Clone success!'));
                break;
            default:
                // Change status
                foreach ($ids as $id) {
                    $query = $this->model::where("id", $id);
                    if (!$this->hasPermission('event_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('event_update');
                    }
                    $query->update(['status' => $action]);
                }
                return redirect()->back()->with('success', __('Update success!'));
                break;
        }
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
