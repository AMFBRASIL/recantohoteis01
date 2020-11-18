<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/30/2019
 * Time: 1:56 PM
 */
namespace Modules\Stock\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductCategory;
use Modules\Product\Models\ProductSubCategory;
use Modules\Product\Models\ProductUnity;
use Modules\Stock\Models\StockAdjustment;

class StockAdjustmentController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu(route('stock.admin.create'));
        $this->model = StockAdjustment::class;
    }

    public function index(Request $request)
    {
        $this->checkPermission('event_view');
        $query = $this->model::query() ;
        $query->orderBy('id', 'desc');
        if (!empty($s = $request->input('s'))) {
            $query->where('content', 'LIKE', '%' . $s . '%');
            $query->orderBy('content', 'asc');
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
                    'name' => __('Ajustes de Estoque'),
                    'url'  => route('stock_adjustment.admin.index')
                ],
                [
                    'name'  => __('Ajustes'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Ajustes")
        ];
        return view('Stock::admin.adjustment.index', $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission('event_create');
        $row = new $this->model();
        $row->fill([
            'status' => 'publish'
        ]);
        $data = [
            'row'            => $row,
            'breadcrumbs'    => [
                [
                    'name' => __('Ajustes'),
                    'url'  => route('stock_adjustment.admin.index')
                ],
                [
                    'name'  => __('Adicionar Ajuste'),
                    'class' => 'active'
                ],
            ],
            'page_title'     => __("Adicionar novo Ajuste")
        ];
        return view('Stock::admin.adjustment.edit', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('event_update');
        $row = $this->model::find($id);
        if (empty($row)) {
            return redirect(route('stock_adjustment.admin.index'));
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        if (!$this->hasPermission('event_manage_others')) {
            if ($row->create_user != Auth::id()) {
                return redirect(route('stock_adjustment.admin.index'));
            }
        }

        $data = [
            'row'            => $row,
            'translation'    => $translation,
            'enable_multi_lang'=>true,
            'breadcrumbs'        => [
                [
                    'name' => __('Ajustes de Estoque'),
                    'url'  => route('stock_adjustment.admin.index')
                ],
                [
                    'name'  => __('Ajuste'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__('Ajuste de Estoque')
        ];
        return view('Stock::admin.adjustment.edit', $data);
    }

    public function store( Request $request, $id )
    {
        if($id>0){
            $this->checkPermission('event_update');
            $row = $this->model::find($id);
            if (empty($row)) {
                return redirect(route('stock_adjustment.admin.create'));
            }

            if($row->create_user != Auth::id() and !$this->hasPermission('event_manage_others'))
            {
                return redirect(route('stock_adjustment.admin.index'));
            }
        }else{
            $this->checkPermission('event_create');
            $row = new $this->model();
        }

        $dataKeys = [
            'movement_type',
            'shipping_price',
            'product_composition',
            'content',
            'send_section_mail',
            'send_supplier_mail',
            'status',
        ];

        if($this->hasPermission('event_manage_others')){
            $dataKeys[] = 'create_user';
        }

        $row->fillByAttr($dataKeys,$request->input());
        $res = $row->saveOriginOrTranslation($request->input('lang'),true);
        if ($res) {
            if($id > 0 ){
                return back()->with('success',  __('Ajuste Atualizado') );
            }else{
                return redirect(route('stock_adjustment.admin.edit',$row->id))->with('success', __('Ajuste Criada') );
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

    public function getComposition($id)
    {
        $product = StockAdjustment::find($id);
        if (! $product->product_composition) {
            return response()->json([]);
        }

        $data = [];
        foreach ($product->product_composition as $values) {
            $product = Product::find($values['product_id']);
            $category = ProductCategory::find($values['category_id']);
            $subcategory = ProductSubCategory::find($values['subcategory_id']);
            $unity = ProductUnity::find($values['unity_id']);
            $data[] = [
                'product'  => $product->title,
                'category'  => $category->description,
                'subcategory'  => $subcategory->description,
                'unity'  => $unity->acronym,
                'quantity' => $values['quantity'],
                'price' => $values['price'],
            ];
        }

        return response()->json($data);
    }
}
