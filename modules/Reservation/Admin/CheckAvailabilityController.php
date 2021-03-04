<?php

namespace Modules\Reservation\Admin;

use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Modules\Base\Admin\CrudController;
use Modules\Hotel\Models\Building;
use Modules\Hotel\Models\Hotel;
use Modules\Hotel\Models\HotelRoom;
use Modules\Reservation\Models\ReservationType;
use Modules\Situation\Models\Situation;

class CheckAvailabilityController extends CrudController
{
    protected $modelName = ReservationType::class;

    public function __construct()
    {
        $this->setActiveMenu(route('reservation.admin.index'));
    }

    protected $titleList = [
        'index' => 'Verificar disponibilidades',
        'page' => 'Verificar disponibilidades',
        'create' => 'Verificar disponibilidade',
        'edit' => 'Verificar disponibilidade'
    ];

    protected $permissionList = [
        'index' => 'check_availability_view',
        'manage' => 'check_availability_manage_others',
        'create' => 'check_availability_create',
        'update' => 'check_availability_update',
        'delete' => 'check_availability_delete',
    ];

    protected $routeList = [
        'index' => 'check_availability.admin.index',
        'create' => 'check_availability.admin.create',
        'edit' => 'check_availability.admin.edit',
        'store' => 'check_availability.admin.store',
        'bulk' => 'check_availability.admin.bulkEdit',
        'recovery' => 'check_availability.admin.recovery',
    ];

    protected $viewList = [
        'index' => 'Reservation::admin.check_availability.index',
        'edit' => 'Reservation::admin.check_availability.edit',
    ];

    protected $fieldSearchList = [
        'name'
    ];

    protected function redirectUrlAfterStore($model)
    {
        return route($this->routeList['index'], $model->id);
    }

    public function index(Request $request)
    {
        $this->checkPermission('check_availability_view');


        if ($request->has('building_id') && !is_null($request->get('building_id'))){
            $hotel = Hotel::query()->where('building_id',$request->get('building_id'))->get();
        }else{
            $hotel = Hotel::all();
        }

        $now_date = new DateTime();

        try {
            $start_date = $request->has('checkin')
            && !is_null($request->get('checkin')) ? new DateTime($request->get('checkin')) : new DateTime();
            $end_date = $request->has('checkout')
            && !is_null($request->get('checkout')) ? new DateTime($request->get('checkout')) : new DateTime(' +1 month');
        } catch (\Exception $e) {
        }


        $period = new DatePeriod(
            $start_date,
            new DateInterval('P1D'),
            $end_date
        );

        $interval = [];

        foreach ($period as $key => $value) {
            array_push($interval, [
                'day' => strtoupper(strftime("%a", $value->getTimestamp())),
                'date' => $value,
            ]);
        }

        $data_hotel = [];

        foreach ($hotel as $h) {
            $data_rooms = [];
            foreach ($h->rooms()->get() as $r) {
                if ($request->has('floor_id')
                    && $request->get('floor_id') != 'null'
                    && !is_null($r->room_id)){
                        $room = $r->room()->first();
                        if (!empty($room) && $room->building_floor_id == $request->get('floor_id')) {
                            $hotel_bookings = $r->getBookingsInRange($start_date, $end_date);

                            array_push($data_rooms, [
                                'room' => $r,
                                'hotel_bookings' => $hotel_bookings,
                            ]);
                        }
                }else {
                    $hotel_bookings = $r->getBookingsInRange($start_date, $end_date);
                    array_push($data_rooms, [
                        'room' => $r,
                        'hotel_bookings' => $hotel_bookings,
                    ]);
                }
            }
            array_push($data_hotel, [
                'hotel' => $h,
                'rooms' => $data_rooms,
            ]);
        }

        $statistics = $this->getSituations();
        $building = Building::all();

        $data = [
            'statistics' => $statistics,
            'building' => $building,
            'hotels' => $data_hotel,
            'interval' => $interval,
            'now' => $now_date,
        ];

        $data = [
            'data' => $data,
            'hotel_manage_others' => $this->hasPermission('check_availability_manage_others'),
            'breadcrumbs' => [
                [
                    'name' => __('Reservas'),
                    'url' => 'admin/module/availability'
                ],
                [
                    'name' => __(' Verificar disponibilidades'),
                    'class' => 'active'
                ],
            ],
        ];
        return view('Reservation::admin.check_availability.index', $data);
    }

    private function getSituations()
    {
        $statistics = [];

        $totalHotelRoom = HotelRoom::query()->get()->count();

        //OCUPADO
        $busySituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%Quarto%');
        })->where('name', 'like', '%OCUPADO%')->get(['id', 'name', 'label'])->first();

        $busy = HotelRoom::query()->where('situation_id', $busySituation->id);
        $busy = empty($busy) ? 0 : $busy->count();

        array_push($statistics, [
            'situation' => $busySituation,
            'percentage' => intval(($busy * 100) / $totalHotelRoom),
            'label' => 'orange',
            'total' => $busy,
        ]);

        //LIBERADO
        $releasedSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%Quarto%');
        })->where('name', 'like', '%LIBERADO%')->get(['id', 'name', 'label'])->first();

        $released = HotelRoom::query()->where('situation_id', $releasedSituation->id);
        $released = empty($released) ? 0 : $released->count();

        array_push($statistics, [
            'situation' => $releasedSituation,
            'percentage' => intval(($released * 100) / $totalHotelRoom),
            'label' => 'green',
            'total' => $released,
        ]);

        //BLOQUEADO
        $blockedSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%Quarto%');
        })->where('name', 'like', '%BLOQUEADO%')->get(['id', 'name', 'label'])->first();

        $blocked = HotelRoom::query()->where('situation_id', $blockedSituation->id);
        $blocked = empty($blocked) ? 0 : $blocked->count();

        array_push($statistics, [
            'situation' => $blockedSituation,
            'percentage' => intval(($blocked * 100) / $totalHotelRoom),
            'label' => 'red',
            'total' => $blocked
        ]);

        //EM LIMPEZA
        $inCleaningSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%Quarto%');
        })->where('name', 'like', '%EM LIMPEZA%')->get(['id', 'name', 'label'])->first();

        $inCleaning = HotelRoom::query()->where('situation_id', $inCleaningSituation->id);
        $inCleaning = empty($inCleaning) ? 0 : $inCleaning->count();

        array_push($statistics, [
            'situation' => $inCleaningSituation,
            'percentage' => intval(($inCleaning * 100) / $totalHotelRoom),
            'label' => 'orange',
            'total' => $inCleaning
        ]);

        //CHECK_IN
        $checkInSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%RESERVAS%');
        })->where('name', 'like', '%CHECK-IN%')->get(['id', 'name', 'label'])->first();

        $checkIn = HotelRoom::query()->where('situation_id', $checkInSituation->id);
        $checkIn = empty($checkIn) ? 0 : $checkIn->count();

        array_push($statistics, [
            'situation' => $checkInSituation,
            'percentage' => intval(($checkIn * 100) / $totalHotelRoom),
            'label' => 'green',
            'total' => $checkIn,
        ]);

        $checkOutSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%RESERVAS%');
        })->where('name', 'like', '%CHECK-OUT%%')->get(['id', 'name', 'label'])->first();

        $checkout = HotelRoom::query()->where('situation_id', $checkOutSituation->id);
        $checkout = empty($checkout) ? 0 : $checkout->count();

        array_push($statistics, [
            'situation' => $checkOutSituation,
            'percentage' => intval(($checkout * 100) / $totalHotelRoom),
            'label' => 'red',
            'total' => $checkout
        ]);

        return $statistics;
    }
}
