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
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductTranslation;
use Modules\Core\Models\Attributes;

class ProductController extends AdminController
{
    protected $model;
    protected $model_translation;
    protected $attributes;

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu(route('product.admin.index'));
        $this->model = Product::class;
        $this->model_translation = ProductTranslation::class;
        $this->attributes = Attributes::class;
    }

    public function index(Request $request)
    {
        $this->checkPermission('event_view');
        $query = $this->model::query() ;
        $query->orderBy('id', 'desc');
        if (!empty($s = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $s . '%');
            $query->orderBy('title', 'asc');
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
                    'name' => __('Produtos'),
                    'url'  => 'admin/module/product'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Gerenciar Produto")
        ];
        return view('Product::admin.index', $data);
    }

    public function recovery(Request $request)
    {
        $this->checkPermission('event_view');
        $query = $this->model::onlyTrashed() ;
        $query->orderBy('id', 'desc');
        if (!empty($s = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $s . '%');
            $query->orderBy('title', 'asc');
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
            'recovery'           => 1,
            'breadcrumbs'        => [
                [
                    'name' => __('Produtos'),
                    'url'  => 'admin/module/product'
                ],
                [
                    'name'  => __('Recovery'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Recuperar Fornecedor")
        ];
        return view('Product::admin.index', $data);
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
            'attributes'     => $this->attributes::where('service', 'event')->get(),
            'translation'    => new $this->model_translation(),
            'breadcrumbs'    => [
                [
                    'name' => __('Produtos'),
                    'url'  => route('product.admin.index')
                ],
                [
                    'name'  => __('Adicionar Produto'),
                    'class' => 'active'
                ],
            ],
            'page_title'     => __("Adicionar novo Produto")
        ];
        return view('Product::admin.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('event_update');
        $row = $this->model::find($id);
        if (empty($row)) {
            return redirect(route('product.admin.index'));
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        if (!$this->hasPermission('event_manage_others')) {
            if ($row->create_user != Auth::id()) {
                return redirect(route('product.admin.index'));
            }
        }
        $data = [
            'row'            => $row,
            'translation'    => $translation,
            'enable_multi_lang'=>true,
            'breadcrumbs'    => [
                [
                    'name' => __('Produtos'),
                    'url'  => route('product.admin.index')
                ],
                [
                    'name'  => __('Editar Produto'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Edit: :name",['name'=>$row->title])
        ];
        return view('Product::admin.detail', $data);
    }

    public function store( Request $request, $id )
    {
        if($id>0){
            $this->checkPermission('event_update');
            $row = $this->model::find($id);
            if (empty($row)) {
                return redirect(route('product.admin.index'));
            }

            if($row->create_user != Auth::id() and !$this->hasPermission('event_manage_others'))
            {
                return redirect(route('product.admin.index'));
            }
        }else{
            $this->checkPermission('event_create');
            $row = new $this->model();
            $row->status = "publish";
        }

        $dataKeys = [
            //Info
            'title',
            'slug',
            'product_code',
            'product_barcode',
            'content',
            //Price
            'price',
            'sale_price',
            'unit_price',
            // Weight
            'net_weight',
            'gross_weight',
            // Media
            'image_id',
            'gallery',
            'banner_image_id',
            // Composition
            'product_composition',
            // Stock
            'available_stock',
            'min_stock',
            'max_stock',
            'stock_id',
            // Unit/Category
            'product_unity_id',
            'product_category_id',
            'product_subcategory_id',
            // Supplier
            'supplier_id',
            // NCM / CEST
            'ncm_id',
            'cest_id',
            // CFOP
            'cfop_internal_id',
            'cfop_external_id',
            'origin_code',
            // CST
            'csosn_code',
            'csosn_value',
            'cst_pis_id',
            'cst_pis_value',
            'cst_cofins_id',
            'cst_cofins_value',
            'cst_ipi_id',
            'cst_ipi_value',
            // Config
            'control_stock',
            'enable_pos',
            'enable_nf',
            'show_in_menu',
            'use_balance',
            'loan_object',
            'input_product',
            'is_service',
            'facilities',
            // Role configs
            'status',
        ];

        if($this->hasPermission('event_manage_others')){
            $dataKeys[] = 'create_user';
        }

        $row->fillByAttr($dataKeys,$request->input());
        if($request->input('slug')){
            $row->slug = $request->input('slug');
        }

        $res = $row->saveOriginOrTranslation($request->input('lang'),true);
        if ($res) {
            if($id > 0 ){
                return back()->with('success',  __('Product updated') );
            }else{
                return redirect(route('product.admin.edit',$row->id))->with('success', __('Product created') );
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

        $data = [];
        foreach ($res as $product) {
            $data[] = [
                'id' => $product->id,
                'text' => $product->text,
                'available_stock' => $product->available_stock,
                'price' => $product->price_formatted
            ];
        }

        return response()->json([
            'results' => $data
        ]);
    }

    public function getComposition($id)
    {
        $product = Product::find($id);
        if (! $product->product_composition) {
            return response()->json([]);
        }

        $data = [];
        foreach ($product->product_composition as $values) {
            $product = Product::find($values['product_id']);
            $data[] = [
                'name'  => $product->title,
                'quantity' => $values['quantity']
            ];
        }

        return response()->json($data);
    }
}
