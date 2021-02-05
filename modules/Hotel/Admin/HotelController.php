<?php
namespace Modules\Hotel\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Core\Events\CreatedServicesEvent;
use Modules\Core\Events\UpdatedServiceEvent;
use Modules\Core\Models\Attributes;
use Modules\Hotel\Models\Building;
use Modules\Location\Models\Location;
use Modules\Hotel\Models\Hotel;
use Modules\Hotel\Models\HotelTerm;
use Modules\Hotel\Models\HotelTranslation;
use Modules\Location\Models\LocationCategory;

class HotelController extends AdminController
{
    protected $hotelClass;
    protected $hotelTranslationClass;
    protected $hotelTermClass;
    protected $attributesClass;
    protected $locationClass;
    /**
     * @var string
     */
    private $locationCategoryClass;

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/hotel');
        $this->hotelClass = Hotel::class;
        $this->hotelTranslationClass = HotelTranslation::class;
        $this->hotelTermClass = HotelTerm::class;
        $this->attributesClass = Attributes::class;
        $this->locationClass = Location::class;
        $this->locationCategoryClass = LocationCategory::class;
    }
    public function callAction($method, $parameters)
    {
        if(!Hotel::isEnable())
        {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }

    public function index(Request $request)
    {
        $this->checkPermission('hotel_view');
        $query = $this->hotelClass::query() ;
        $query->orderBy('id', 'desc');
        if (!empty($hotel_name = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $hotel_name . '%');
            $query->orderBy('title', 'asc');
        }

        if ($this->hasPermission('hotel_manage_others')) {
            if (!empty($author = $request->input('vendor_id'))) {
                $query->where('create_user', $author);
            }
        } else {
            $query->where('create_user', Auth::id());
        }
        $data = [
            'rows'               => $query->with(['author'])->paginate(20),
            'hotel_manage_others' => $this->hasPermission('hotel_manage_others'),
            'breadcrumbs'        => [
                [
                    'name' => __('Hotels'),
                    'url'  => 'admin/module/hotel'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Hotel Management"),
            'buildingList' => Building::all(),
        ];
        return view('Hotel::admin.index', $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission('hotel_create');
        $row = new $this->hotelClass();
        $row->fill([
            'status' => 'publish'
        ]);
        $data = [
            'row'            => $row,
            'attributes'     => $this->attributesClass::where('service', 'hotel')->get(),
            'hotel_location' => $this->locationClass::where('status', 'publish')->get()->toTree(),
            'location_category' => $this->locationCategoryClass::where('status', 'publish')->get(),
            'translation'    => new $this->hotelTranslationClass(),
            'breadcrumbs'    => [
                [
                    'name' => __('Hotels'),
                    'url'  => 'admin/module/hotel'
                ],
                [
                    'name'  => __('Add Hotel'),
                    'class' => 'active'
                ],
            ],
            'page_title'     => __("Add new Hotel"),
            'buildingList' => Building::all(),
        ];
        return view('Hotel::admin.detail', $data);
    }

    public function recovery(Request $request)
    {
        $this->checkPermission('hotel_view');
        $query = $this->hotelClass::onlyTrashed() ;
        $query->orderBy('id', 'desc');
        if (!empty($hotel_name = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $hotel_name . '%');
            $query->orderBy('title', 'asc');
        }

        if ($this->hasPermission('hotel_manage_others')) {
            if (!empty($author = $request->input('vendor_id'))) {
                $query->where('create_user', $author);
            }
        } else {
            $query->where('create_user', Auth::id());
        }
        $data = [
            'rows'               => $query->with(['author'])->paginate(20),
            'hotel_manage_others' => $this->hasPermission('hotel_manage_others'),
            'recovery'           => 1,
            'breadcrumbs'        => [
                [
                    'name' => __('Hotels'),
                    'url'  => 'admin/module/hotel'
                ],
                [
                    'name'  => __('Recovery'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Recovery Hotel Management"),
            'buildingList' => Building::all(),
        ];
        return view('Hotel::admin.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('hotel_update');
        $row = $this->hotelClass::find($id);
        if (empty($row)) {
            return redirect(route('hotel.admin.index'));
        }
        $translation = $row->translateOrOrigin($request->query('lang'));
        if (!$this->hasPermission('hotel_manage_others')) {
            if ($row->create_user != Auth::id()) {
                return redirect(route('hotel.admin.index'));
            }
        }
        $data = [
            'row'            => $row,
            'translation'    => $translation,
            "selected_terms" => $row->terms->pluck('term_id'),
            'attributes'     => $this->attributesClass::where('service', 'hotel')->get(),
            'hotel_location'  => $this->locationClass::where('status', 'publish')->get()->toTree(),
            'location_category' => $this->locationCategoryClass::where('status', 'publish')->get(),
            'enable_multi_lang'=>true,
            'breadcrumbs'    => [
                [
                    'name' => __('Hotels'),
                    'url'  => 'admin/module/hotel'
                ],
                [
                    'name'  => __('Edit Hotel'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Edit: :name",['name'=>$row->title]),
            'buildingList' => Building::all(),
        ];
        return view('Hotel::admin.detail', $data);
    }

    public function store( Request $request, $id ){

        if($id>0){
            $this->checkPermission('hotel_update');
            $row = $this->hotelClass::find($id);
            if (empty($row)) {
                return redirect(route('hotel.admin.index'));
            }

            if($row->create_user != Auth::id() and !$this->hasPermission('hotel_manage_others'))
            {
                return redirect(route('hotel.admin.index'));
            }
        }else{
            $this->checkPermission('hotel_create');
            $row = new $this->hotelClass();
            $row->status = "publish";
        }
        $dataKeys = [
            'title',
            'content',
            'video',
            'image_id',
            'banner_image_id',
            'gallery',
            'is_featured',
            'policy',
            'building_id',
            'floor_id',
            'location_id',
            'address',
            'map_lat',
            'map_lng',
            'map_zoom',
            'star_rate',
            'price',
            'sale_price',
            'check_in_time',
            'check_out_time',
            'allow_full_day',
            'enable_extra_price',
            'extra_price',
            'enable_extra_price',
            'extra_price',
            'status',
            'min_day_before_booking',
            'min_day_stays',
            'enable_service_fee',
            'service_fee',
            'surrounding',
        ];
        if($this->hasPermission('hotel_manage_others')){
            $dataKeys[] = 'create_user';
        }

        $row->fillByAttr($dataKeys,$request->input());
        if($request->input('slug')){
            $row->slug = $request->input('slug');
        }

        $res = $row->saveOriginOrTranslation($request->input('lang'),true);

        if ($res) {
            if(!$request->input('lang') or is_default_lang($request->input('lang'))) {
                $this->saveTerms($row, $request);
            }

            if($id > 0 ){
                event(new UpdatedServiceEvent($row));

                return back()->with('success',  __('Hotel updated') );
            }else{
                event(new CreatedServicesEvent($row));

                return redirect(route('hotel.admin.edit',$row->id))->with('success', __('Hotel created') );
            }
        }
    }

    public function saveTerms($row, $request)
    {
        $this->checkPermission('hotel_manage_attributes');
        if (empty($request->input('terms'))) {
            $this->hotelTermClass::where('target_id', $row->id)->delete();
        } else {
            $term_ids = $request->input('terms');
            foreach ($term_ids as $term_id) {
                $this->hotelTermClass::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $row->id
                ]);
            }
            $this->hotelTermClass::where('target_id', $row->id)->whereNotIn('term_id', $term_ids)->delete();
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
                    $query = $this->hotelClass::where("id", $id);
                    if (!$this->hasPermission('hotel_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('hotel_delete');
                    }
                    $row = $query->first();
                    if(!empty($row)){
                        $row->delete();
                        event(new UpdatedServiceEvent($row));

                    }
                }
                return redirect()->back()->with('success', __('Deleted success!'));
                break;
            case "recovery":
                foreach ($ids as $id) {
                    $query = $this->hotelClass::withTrashed()->where("id", $id);
                    if (!$this->hasPermission('hotel_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('hotel_delete');
                    }
                    $row= $query->first();

                    if(!empty($row)){
                        $row->restore();
                        event(new UpdatedServiceEvent($row));
                    }
                }
                return redirect()->back()->with('success', __('Recovery success!'));
                break;
            case "clone":
                $this->checkPermission('hotel_create');
                foreach ($ids as $id) {
                    (new $this->hotelClass())->saveCloneByID($id);
                }
                return redirect()->back()->with('success', __('Clone success!'));
                break;
            default:
                // Change status
                foreach ($ids as $id) {
                    $query = $this->hotelClass::where("id", $id);
                    if (!$this->hasPermission('hotel_manage_others')) {
                        $query->where("create_user", Auth::id());
                        $this->checkPermission('hotel_update');
                    }
                    $row = $query->first();
                    $row->status  = $action;
                    $row->save();
                    event(new UpdatedServiceEvent($row));

//                    $query->update(['status' => $action]);
                }
                return redirect()->back()->with('success', __('Update success!'));
                break;
        }
    }
}
