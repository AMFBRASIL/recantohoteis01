<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/30/2019
 * Time: 1:56 PM
 */
namespace Modules\Supplier\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Supplier\Models\Supplier;
use Modules\Supplier\Models\SupplierTranslation;
use Modules\Core\Models\Attributes;
use Modules\Location\Models\Location;

class SupplierController extends AdminController
{
    protected $supplier;
    protected $supplier_translation;
    protected $attributes;
    protected $location;
    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu(route('supplier.admin.index'));
        $this->supplier = Supplier::class;
        $this->supplier_translation = SupplierTranslation::class;
        $this->attributes = Attributes::class;
        $this->location = Location::class;
    }

    public function index(Request $request)
    {
        $this->checkPermission('event_view');
        $query = $this->supplier::query() ;
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
                    'name' => __('Fornecedores'),
                    'url'  => 'admin/module/supplier'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Gerenciar Fornecedor")
        ];
        return view('Supplier::admin.index', $data);
    }

    public function recovery(Request $request)
    {
        $this->checkPermission('event_view');
        $query = $this->supplier::onlyTrashed() ;
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
                    'name' => __('Fornecedores'),
                    'url'  => 'admin/module/supplier'
                ],
                [
                    'name'  => __('Recovery'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Recuperar Fornecedor")
        ];
        return view('Event::admin.index', $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission('event_create');
        $row = new $this->supplier();
        $row->fill([
            'status' => 'publish'
        ]);
        $data = [
            'row'            => $row,
            'attributes'     => $this->attributes::where('service', 'event')->get(),
            'event_location' => $this->location::where('status', 'publish')->get()->toTree(),
            'translation'    => new $this->supplier_translation(),
            'breadcrumbs'    => [
                [
                    'name' => __('Fornecedores'),
                    'url'  => route('supplier.admin.index')
                ],
                [
                    'name'  => __('Adicionar Fornecedor'),
                    'class' => 'active'
                ],
            ],
            'page_title'     => __("Adicionar novo Fornecedor")
        ];
        return view('Supplier::admin.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('event_update');
        $row = $this->supplier::find($id);
        if (empty($row)) {
            return redirect(route('supplier.admin.index'));
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        if (!$this->hasPermission('event_manage_others')) {
            if ($row->create_user != Auth::id()) {
                return redirect(route('supplier.admin.index'));
            }
        }
        $data = [
            'row'            => $row,
            'translation'    => $translation,
            'enable_multi_lang'=>true,
            'breadcrumbs'    => [
                [
                    'name' => __('Fornecedores'),
                    'url'  => route('supplier.admin.index')
                ],
                [
                    'name'  => __('Editar Fornecedor'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Edit: :name",['name'=>$row->title])
        ];
        return view('Supplier::admin.detail', $data);
    }

    public function store( Request $request, $id )
    {
        if($id>0){
            $this->checkPermission('event_update');
            $row = $this->supplier::find($id);
            if (empty($row)) {
                return redirect(route('supplier.admin.index'));
            }

            if($row->create_user != Auth::id() and !$this->hasPermission('event_manage_others'))
            {
                return redirect(route('supplier.admin.index'));
            }
        }else{
            $this->checkPermission('event_create');
            $row = new $this->supplier();
            $row->status = "publish";
        }

        $dataKeys = [
            'title',
            'slug',
            'contact',
            'person_type',
            'document',
            'state_registration',
            'city_registration',
            'taxpayer',
            'birthdate',

            // Address
            'zipcode',
            'street_name',
            'street_number',
            'neighborhood',
            'complement',
            'city',
            'state',

            // Contact
            'home_number',
            'phone_number',
            'whatsapp',
            'website',
            'email',
            'contact_name',
            'contact_complement',
            'comments',

            // Config
            'is_simples',
            'is_rural',
            'is_shipping',

            // Images
            'image_id',
            'banner_image_id',

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
                return back()->with('success',  __('Supplier updated') );
            }else{
                return redirect(route('supplier.admin.edit',$row->id))->with('success', __('Supplier created') );
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
                    $query = $this->supplier::where("id", $id);
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
                    $query = $this->supplier::where("id", $id);
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
                    (new $this->supplier())->saveCloneByID($id);
                }
                return redirect()->back()->with('success', __('Clone success!'));
                break;
            default:
                // Change status
                foreach ($ids as $id) {
                    $query = $this->supplier::where("id", $id);
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
        $query = $this->supplier::getForSelect2Query($q);
        $res = $query->orderBy('id', 'desc')->limit(20)->get();

        return response()->json([
            'results' => $res
        ]);
    }


}
