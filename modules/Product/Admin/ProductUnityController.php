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
use Modules\Product\Models\ProductUnity;
use Modules\Product\Models\ProductUnityTranslation;

class ProductUnityController extends AdminController
{
    protected $model;
    protected $model_translation;

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu(route('product_unity.admin.index'));
        $this->model = ProductUnity::class;
        $this->model_translation = ProductUnityTranslation::class;
    }

    public function create(Request $request)
    {
        $this->checkPermission('event_create');
        $query = $this->model::query() ;
        $query->orderBy('id', 'desc');
        if (!empty($s = $request->input('s'))) {
            $query->where('acronym', 'LIKE', '%' . $s . '%');
            $query->orderBy('acronym', 'asc');
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
                    'name' => __('Unidade Produto'),
                    'url'  => 'admin/module/product_unity'
                ],
                [
                    'name'  => __('Unidades'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Unidade Produto")
        ];

        return view('Product::admin.product_unity.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('event_update');
        $row = $this->model::find($id);
        if (empty($row)) {
            return redirect(route('product_unity.admin.index'));
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        if (!$this->hasPermission('event_manage_others')) {
            if ($row->create_user != Auth::id()) {
                return redirect(route('product_unity.admin.index'));
            }
        }

        $data = [
            'row'            => $row,
            'translation'    => $translation,
            'enable_multi_lang'=>true,
            'breadcrumbs'        => [
                [
                    'name' => __('Unidade Produto'),
                    'url'  => route('product_unity.admin.create')
                ],
                [
                    'name'  => __('Unidades'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Undiade Produto")
        ];
        return view('Product::admin.product_unity.edit', $data);
    }

    public function store( Request $request, $id )
    {
        if($id>0){
            $this->checkPermission('event_update');
            $row = $this->model::find($id);
            if (empty($row)) {
                return redirect(route('product_unity.admin.create'));
            }

            if($row->create_user != Auth::id() and !$this->hasPermission('event_manage_others'))
            {
                return redirect(route('product_unity.admin.index'));
            }
        }else{
            $this->checkPermission('event_create');
            $row = new $this->model();
        }

        $dataKeys = [
            //Info
            'acronym',
            'description',
        ];

        if($this->hasPermission('event_manage_others')){
            $dataKeys[] = 'create_user';
        }

        $row->fillByAttr($dataKeys,$request->input());
        $res = $row->saveOriginOrTranslation($request->input('lang'),true);
        if ($res) {
            if($id > 0 ){
                return back()->with('success',  __('Unidade Atualizada') );
            }else{
                return redirect(route('product_unity.admin.edit',$row->id))->with('success', __('Unidade Criada') );
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
