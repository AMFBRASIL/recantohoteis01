<?php

namespace Modules\Reservation\Admin;

use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Base\Admin\CrudController;
use Modules\Hotel\Models\Building;
use Modules\Hotel\Models\Hotel;
use Modules\Reservation\Models\ReservationType;

class CheckAvailabilityController extends CrudController
{
    protected $modelName = ReservationType::class;

    public function __construct()
    {
        $this->setActiveMenu(route('reservation.admin.index'));
    }

    protected $titleList = [
        'index'     => 'Verificar disponibilidades',
        'page'      => 'Verificar disponibilidades',
        'create'    => 'Verificar disponibilidade',
        'edit'      => 'Verificar disponibilidade'
    ];

    protected $permissionList = [
        'index'     => 'check_availability_view',
        'manage'    => 'check_availability_manage_others',
        'create'    => 'check_availability_create',
        'update'    => 'check_availability_update',
        'delete'    => 'check_availability_delete',
    ];

    protected $routeList = [
        'index'     => 'check_availability.admin.index',
        'create'    => 'check_availability.admin.create',
        'edit'      => 'check_availability.admin.edit',
        'store'     => 'check_availability.admin.store',
        'bulk'      => 'check_availability.admin.bulkEdit',
        'recovery'  => 'check_availability.admin.recovery',
    ];

    protected $viewList = [
        'index'     => 'Reservation::admin.check_availability.index',
        'edit'      => 'Reservation::admin.check_availability.edit',
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

        $hotel = Hotel::query()->get();

        $now_date = new DateTime();
        $start_date = $request->has('checkin') ? $request->get('checkin') : new DateTime();
        $end_date = $request->has('checkout') ? $request->get('checkout') : new DateTime(' +1 month');

        $period = new DatePeriod(
            $start_date,
            new DateInterval('P1D'),
            $end_date
        );

        $interval = [];

        foreach ($period as $key => $value) {
            array_push($interval,[
                'day' => strtoupper(strftime("%a",$value->getTimestamp())),
                'date' => $value,
            ]);
        }

        $data_hotel = [];

        foreach ($hotel as $h){
            $data_rooms = [];

            foreach ($h->rooms()->get() as $r){
                array_push($data_rooms,[
                   'room' => $r,
                   'bookings' => $r->getBookingsInRange($start_date,$end_date),
                ]);
            }

            array_push($data_hotel,[
               'hotel' => $h,
               'rooms' => $data_rooms,
            ]);
        }

        $data = [
            'hotels' => $data_hotel,
            'interval'  => $interval,
            'now' => $now_date,
        ];

        $data = [
            'data'               => $data,
            'hotel_manage_others' => $this->hasPermission('check_availability_manage_others'),
            'breadcrumbs'        => [
                [
                    'name' => __('Reservas'),
                    'url'  => 'admin/module/availability'
                ],
                [
                    'name'  => __(' Verificar disponibilidades'),
                    'class' => 'active'
                ],
            ],
        ];
        return view('Reservation::admin.check_availability.index',$data);
    }
}
