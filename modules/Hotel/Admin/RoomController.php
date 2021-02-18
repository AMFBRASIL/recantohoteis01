<?php

namespace Modules\Hotel\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Core\Models\Attributes;
use Modules\Hotel\Models\Hotel;
use Modules\Hotel\Models\HotelRoom;
use Modules\Hotel\Models\HotelRoomTerm;
use Modules\Hotel\Models\HotelRoomTranslation;
use Modules\Location\Models\Location;
use Modules\Room\Models\Room;
use Modules\Situation\Models\Situation;

class RoomController extends AdminController
{
    protected $hotelClass;
    protected $roomTermClass;
    protected $attributesClass;
    protected $locationClass;
    /**
     * @var HotelRoom
     */
    protected $roomClass;
    protected $currentHotel;
    protected $roomTranslationClass;

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/hotel');
        $this->hotelClass = Hotel::class;
        $this->roomTermClass = HotelRoomTerm::class;
        $this->attributesClass = Attributes::class;
        $this->locationClass = Location::class;
        $this->roomClass = HotelRoom::class;
        $this->roomTranslationClass = HotelRoomTranslation::class;
    }

    public function callAction($method, $parameters)
    {
        if (!Hotel::isEnable()) {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }

    protected function hasHotelPermission($hotel_id = false)
    {
        if (empty($hotel_id)) return false;

        $hotel = $this->hotelClass::find($hotel_id);
        if (empty($hotel)) return false;

        if (!$this->hasPermission('hotel_manage_others') and $hotel->create_user != Auth::id()) {
            return false;
        }

        $this->currentHotel = $hotel;
        return true;
    }

    public function index(Request $request, $hotel_id)
    {
        $this->checkPermission('hotel_view');

        if (!$this->hasHotelPermission($hotel_id)) {
            abort(403);
        }

        $rooms = Room::query()->where('building_id', '=', $this->currentHotel->building_id)->get();

        $query = $this->roomClass::query();

        $query->orderBy('id', 'desc');
        if (!empty($hotel_name = $request->input('s'))) {
            $query->where('title', 'LIKE', '%' . $hotel_name . '%');
            $query->orderBy('title', 'asc');
        }

        $query->where('parent_id', $hotel_id);
        $data = [
            'rows' => $query->with(['author'])->paginate(20),
            'hotel_manage_others' => $this->hasPermission('hotel_manage_others'),
            'breadcrumbs' => [
                [
                    'name' => __('Hotels'),
                    'url' => 'admin/module/hotel'
                ],
                [
                    'name' => __('Hotel: :name', ['name' => $this->currentHotel->title]),
                    'url' => 'admin/module/hotel/edit/' . $this->currentHotel->id
                ],
                [
                    'name' => __('Room Management'),
                    'class' => 'active'
                ],
            ],
            'page_title' => __("Room Management"),
            'hotel' => $this->currentHotel,
            'rooms' => $rooms,
            'row' => new $this->roomClass(),
            'editMode' => false,
            'translation' => new $this->roomTranslationClass(),
            'attributes' => $this->attributesClass::where('service', 'hotel_room')->get(),
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%QUARTO%');
            })->get()
        ];
        return view('Hotel::admin.room.index', $data);
    }

    public function edit(Request $request, $hotel_id, $id)
    {
        $this->checkPermission('hotel_update');

        if (!$this->hasHotelPermission($hotel_id)) {
            abort(403);
        }

        $row = $this->roomClass::find($id);
        if (empty($row) or $row->parent_id != $hotel_id) {
            return redirect(route('hotel.admin.room.index', ['hotel_id' => $hotel_id]));
        }

        $rooms = Room::query()->where('building_id', '=', $this->currentHotel->building_id)->get();

        $translation = $row->translateOrOrigin($request->query('lang'));
        if (!$this->hasPermission('hotel_manage_others')) {
            if ($row->create_user != Auth::id()) {
                return redirect(route('hotel.admin.room.index'));
            }
        }
        $data = [
            'row' => $row,
            'translation' => $translation,
            "selected_terms" => $row->terms->pluck('term_id'),
            'attributes' => $this->attributesClass::where('service', 'hotel_room')->get(),
            'enable_multi_lang' => true,
            'breadcrumbs' => [
                [
                    'name' => __('Hotels'),
                    'url' => 'admin/module/hotel'
                ],
                [
                    'name' => __('Hotel: :name', ['name' => $this->currentHotel->title]),
                    'url' => 'admin/module/hotel/edit/' . $this->currentHotel->id
                ],
                [
                    'name' => __('All Rooms'),
                    'url' => 'admin/module/hotel/room/' . $this->currentHotel->id . '/index'
                ],
                [
                    'name' => __('Edit room: :name', ['name' => $row->title]),
                    'url' => 'admin/module/hotel/room/' . $this->currentHotel->id . '/edit/' . $id
                ],
            ],
            'rooms' => $rooms,
            'editMode' => true,
            'page_title' => __("Edit: :name", ['name' => $row->title]),
            'hotel' => $this->currentHotel,
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%QUARTO%');
            })->get()
        ];
        return view('Hotel::admin.room.detail', $data);
    }

    public function store(Request $request, $hotel_id, $id)
    {
        if (!$this->hasHotelPermission($hotel_id)) {
            abort(403);
        }
        if ($id > 0) {
            $this->checkPermission('hotel_update');
            $row = $this->roomClass::find($id);
            if (empty($row)) {
                return redirect(route('hotel.admin.index'));
            }

            if ($row->create_user != Auth::id() and !$this->hasPermission('hotel_manage_others')) {
                return redirect(route('hotel.admin.room.index'));
            }

            if ($row->parent_id != $hotel_id) {
                return redirect(route('hotel.admin.room.index'));
            }
        } else {
            $this->checkPermission('hotel_create');
            $row = new $this->roomClass();
            $row->status = "publish";
        }
        $dataKeys = [
            'title',
            'content',
            'image_id',
            'gallery',
            'price',
            'room_id',
            'situation_id',
            'number',
            'beds',
            'size',
            'adults',
            'children',
            'status',
        ];

        $row->fillByAttr($dataKeys, $request->input());
        $row->ical_import_url = $request->ical_import_url;

        if ($id < 0) {
            $row->parent_id = $hotel_id;
        }

        $res = $row->saveOriginOrTranslation($request->input('lang'), true);

        if ($res) {
            if (!$request->input('lang') or is_default_lang($request->input('lang'))) {
                $this->saveTerms($row, $request);
            }

            if ($id > 0) {
                return redirect()->back()->with('success', __('Room updated'));
            } else {
                return redirect()->back()->with('success', __('Room created'));
            }
        }
    }

    public function saveTerms($row, $request)
    {
        $this->checkPermission('hotel_manage_attributes');
        if (empty($request->input('terms'))) {
            $this->roomTermClass::where('target_id', $row->id)->delete();
        } else {
            $term_ids = $request->input('terms');
            foreach ($term_ids as $term_id) {
                $this->roomTermClass::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $row->id
                ]);
            }
            $this->roomTermClass::where('target_id', $row->id)->whereNotIn('term_id', $term_ids)->delete();
        }
    }

    public function bulkEdit(Request $request)
    {
        $ids = $request->input('ids');
        $action = $request->input('action');
        $situation = $request->input('situation_id');

        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (!empty($action)) {
            switch ($action) {
                case "delete":
                    foreach ($ids as $id) {
                        $query = $this->roomClass::where("id", $id);
                        if (!$this->hasPermission('hotel_manage_others')) {
                            $query->where("create_user", Auth::id());
                            $this->checkPermission('hotel_delete');
                        }
                        $query->first();
                        if (!empty($query)) {
                            $query->delete();
                        }
                    }
                    return redirect()->back()->with('success', __('Deleted success!'));
                    break;
                case "clone":
                    $this->checkPermission('hotel_create');
                    foreach ($ids as $id) {
                        (new $this->roomClass())->saveCloneByID($id);
                    }
                    return redirect()->back()->with('success', __('Clone success!'));
                    break;
                default:
                    // Change status
                    foreach ($ids as $id) {
                        $query = $this->roomClass::where("id", $id);
                        if (!$this->hasPermission('hotel_manage_others')) {
                            $query->where("create_user", Auth::id());
                            $this->checkPermission('hotel_update');
                        }
                        $query->update(['status' => $action]);
                    }
                    return redirect()->back()->with('success', __('Update success!'));
                    break;
            }
        } else if (!empty($situation)) {
            foreach ($ids as $id) {
                $query = $this->roomClass::query()->find($id);
                if (!empty($query)) {
                    $query->situation_id = $situation;
                    $query->save();
                }
            }
            return redirect()->back()->with('success', __('situation update!'));;
        } else {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
    }


    /*    public function findRoomByFloorID(Request $request)
        {
            $rooms = Room::query()->where('building_floor_id','=' ,$request->floor_id)->get();

            return response()->json([
                'results' => $rooms
            ]);
        }*/
}
