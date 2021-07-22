<?php

namespace Modules\Dashboard\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\AdminController;
use Modules\Booking\Models\Booking;
use Modules\Hotel\Models\HotelRoom;
use Modules\Pos\Models\Sale;
use Modules\Situation\Models\Situation;

class DashboardController extends AdminController
{
    public function index()
    {
        $f = strtotime('monday this week');

        $data = [
            'recent_bookings'               => Booking::getRecentBookings(8),
            'restaurant_orders'             => $this->restaurantOrders(),
            'top_cards'                     => Booking::getTopCardsReport(),
            'earning_chart_data'            => Booking::getDashboardChartData($f, time()),
            'earning_chart_payment_data'    => Booking::getDashboardChartPaymentData($f, time())
        ];
        return view('Dashboard::index', $data);
    }

    public function reloadChart(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        return $this->sendSuccess([
            'data' => [
                'earning_chart_data'            => Booking::getDashboardChartData($from, $to),
                'earning_chart_payment_data'    => Booking::getDashboardChartPaymentData($from, $to)
            ]
        ]);
    }

    public function situations(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');

        $statistics = [];

        $totalHotelRoom = HotelRoom::query()->get()->count();

        //LIBERADO
        $releasedSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%Quarto%');
        })->where('name', 'like', '%LIBERADO%')->get(['id', 'name', 'label'])->first();

        $released = HotelRoom::query()
            ->where('situation_id', $releasedSituation->id)
            ->whereBetween('updated_at', [$start, $end]);
        $value_released = empty($released) ? 0 : $released->count();

        $released = $released->get();

        $data_released = [];

        if(!empty($released)){
            foreach($released as $i){
                $room = $i->room;
                array_push($data_released,[
                    'room_name'         => $i->title,
                    'room_information'  => $room->building->name . "/". $room->buildingFloor->name . "/". $room->number,
                    'room_value'        => "R$". number_format(($i->price), 2, ',', '.'),
                    'room_guest'        => '('.$i->adults.') Ad. ' . '('.$i->children.') Cri.',
                    'room_status'       => $i->situation->name,
                    'room_status_label' => $i->situation->label,
                ]);
            }
        }

        array_push($statistics, [
            'situation' => ["name" => "Livres"],
            'percentage' => intval(($value_released * 100) / $totalHotelRoom),
            'label' => 'green',
            'total' => $value_released,
            'release' => $data_released,
            'id' => 'situation_free'
        ]);


        //OCUPADO
        $busySituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%Quarto%');
        })->where('name', 'like', '%OCUPADO%')->get(['id', 'name', 'label'])->first();

        $busy = HotelRoom::query()
            ->where('situation_id', $busySituation->id)
            ->whereBetween('updated_at', [$start, $end]);
        $value_busy = empty($busy) ? 0 : $busy->count();

        $busy = $busy->get();

        $data_busy = [];

        if(!empty($busy)){
            foreach($busy as $i){
                $room = $i->room;
                array_push($data_busy,[
                    'room_name'         => $i->title,
                    'room_information'  => $room->building->name . "/". $room->buildingFloor->name . "/". $room->number,
                    'room_guest'        => '0 Hóspedes',
                    'room_status'       => $i->situation->name,
                    'room_status_label' => $i->situation->label,
                ]);
            }
        }

        array_push($statistics, [
            'situation' => ["name" => "Ocupados"],
            'percentage' => intval(($value_busy * 100) / $totalHotelRoom),
            'label' => 'red',
            'total' => $value_busy,
            'busy' => $data_busy,
            'id' => 'situation_busy'
        ]);

        //MANUTENÇÃO/EM LIMPEZA
        $inMaintenanceSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%Quarto%');
        })->where('name', 'like', '%MANUTENCAO%')->get(['id', 'name', 'label'])->first();


        $inCleaningSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%Quarto%');
        })->where('name', 'like', '%EM LIMPEZA%')->get(['id', 'name', 'label'])->first();

        $inCleaning = HotelRoom::query()
            ->where('situation_id', $inCleaningSituation->id)
            ->whereBetween('updated_at', [$start, $end]);
        $value_inCleaning = empty($inCleaning) ? 0 : $inCleaning->count();

        $inCleaning = $inCleaning->get();

        $data_inCleaning = [];

        if(!empty($inCleaning)){
            foreach($inCleaning as $i){
                $room = $i->room;
                array_push($data_inCleaning,[
                    'room_name'         => $i->title,
                    'room_information'  => $room->building->name . "/". $room->buildingFloor->name . "/". $room->number,
                    'room_responsible'  => '',
                    'room_init'         => '',
                    'room_finish'       => '',
                    'room_delay'        => '',
                    'room_status'       => $i->situation->name,
                    'room_status_label' => $i->situation->label,
                ]);
            }
        }

        $inMaintenance = HotelRoom::query()
            ->where('situation_id', $inMaintenanceSituation->id)
            ->whereBetween('updated_at', [$start, $end]);
        $value_inMaintenance = empty($inCleaning) ? 0 : $inMaintenance->count();

        $inMaintenance = $inMaintenance->get();

        $data_inMaintenance = [];

        if(!empty($inMaintenance)){
            foreach($inMaintenance as $i){
                $room = $i->room;
                array_push($data_inMaintenance,[
                    'room_name'         => $i->title,
                    'room_information'  => $room->building->name . "/". $room->buildingFloor->name . "/". $room->number,
                    'room_guest'        => '0 Hóspedes',
                    'room_status'       => $i->situation->name,
                    'room_status_label' => $i->situation->label,
                ]);
            }
        }

        $totalMaintenanceCleaning = $value_inCleaning + $value_inMaintenance;

        array_push($statistics, [
            'situation'     => ["name" => "Manu/Limp"],
            'percentage'    => intval(($totalMaintenanceCleaning * 100) / $totalHotelRoom),
            'label'         => 'red',
            'cleaning'      => $data_inCleaning,
            'maintenance'   => $data_inMaintenance,
            'total'         => $totalMaintenanceCleaning,
            'id'            => 'situation_maintenance_cleaning'
        ]);

        //DayUser
        $dayUser = Booking::query()
            ->where('object_model', 'tour')
            ->whereBetween('start_date', [$start, $end]);
        $value_dayUser = empty($dayUser) ? 0 : $dayUser->count();

        $dayUser = $dayUser->get();

        $data_dayUser = [];

        if(!empty($dayUser)){
            foreach($dayUser as $i){
                array_push($data_dayUser,[
                    'room_guest'        => $i->first_name . ' ' . $i->last_name,
                    'room_checkin'      => (new Carbon($i->start_date))->format('d/m/y H:m'),
                    'room_checkout'     => (new Carbon($i->end_date))->format('d/m/y H:m'),
                    'room_created'      => (new Carbon($i->created_at))->format('d/m/y H:m'),
                    'room_status'       => $i->situation->name,
                    'room_status_label' => $i->situation->label,
                ]);
            }
        }

        array_push($statistics, [
            'situation'     => ["name" => "Day Use"],
            'percentage'    => $value_dayUser > 0 ? 100 : 0,
            'dayUser'       => $data_dayUser,
            'label'         => 'orange',
            'total'         => $value_dayUser,
            'id'            => 'situation_day_user'
        ]);

        //CHECK_IN
        $checkInSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%RESERVAS%');
        })->where('name', 'like', '%CHECK-IN%')->get(['id', 'name', 'label'])->first();

        $checkIn = HotelRoom::query()
            ->where('situation_id', $checkInSituation->id)
            ->whereBetween('updated_at', [$start, $end]);
        $value_checkIn = empty($checkIn) ? 0 : $checkIn->count();

        $checkIn = $checkIn->get();

        $data_checkIn = [];

        if(!empty($checkIn)){
            foreach($checkIn as $i){
                $room = $i->room;

                $hotel_room_booking = $i->getBookingsInRange($start, $end);

                foreach($hotel_room_booking as $hrb){
                    array_push($data_checkIn,[
                        'room_name'         => $i->title,
                        'room_information'  => $room->building->name . "/". $room->buildingFloor->name . "/". $room->number,
                        'room_guest'        => $hrb->booking->first_name . ' ' . $hrb->booking->last_name,
                        'room_checkin'      => (new Carbon($hrb->booking->start_date))->format('d/m/y H:m'),
                        'room_checkout'     => (new Carbon($hrb->booking->end_date))->format('d/m/y H:m'),
                        'room_created'      => (new Carbon($hrb->bookingi->created_at))->format('d/m/y H:m'),
                        'room_status'       => $i->situation->name,
                        'room_status_label' => $i->situation->label,
                    ]);
                }
            }
        }

        array_push($statistics, [
            'situation'     => ["name" => "Prev. Entrada"],
            'percentage'    => intval(($value_checkIn * 100) / $totalHotelRoom),
            'label'         => 'green',
            'checkin'       => $data_checkIn,
            'total'         => $value_checkIn,
            'id'            => 'situation_checkin'
        ]);

        //CHECK_OUT

        $checkOutSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%RESERVAS%');
        })->where('name', 'like', '%CHECK-OUT%%')->get(['id', 'name', 'label'])->first();

        $checkout = HotelRoom::query()
            ->where('situation_id', $checkOutSituation->id)
            ->whereBetween('updated_at', [$start, $end]);
        $value_checkout = empty($checkout) ? 0 : $checkout->count();

        $checkout = $checkout->get();

        $data_checkOut = [];

        if(!empty($checkout)){
            foreach($checkout as $i){
                $room = $i->room;

                $hotel_room_booking = $i->getBookingsInRange($start, $end);

                foreach($hotel_room_booking as $hrb){
                    array_push($data_checkOut,[
                        'room_name'         => $i->title,
                        'room_information'  => $room->building->name . "/". $room->buildingFloor->name . "/". $room->number,
                        'room_guest'        => $hrb->booking->first_name . ' ' . $hrb->booking->last_name,
                        'room_checkin'      => (new Carbon($hrb->booking->start_date))->format('d/m/y H:m'),
                        'room_checkout'     => (new Carbon($hrb->booking->end_date))->format('d/m/y H:m'),
                        'room_created'      => (new Carbon($hrb->bookingi->created_at))->format('d/m/y H:m'),
                        'room_status'       => $i->situation->name,
                        'room_status_label' => $i->situation->label,
                    ]);
                }
            }
        }

        array_push($statistics, [
            'situation'     => ["name" => "Prev. Saida"],
            'percentage'    => intval(($value_checkout * 100) / $totalHotelRoom),
            'label'         => 'red',
            'checkout'      => $data_checkOut,
            'total'         => $value_checkout,
            'id'            => 'situation_checkout'
        ]);

        return $statistics;
    }

    function restaurantOrders()
    {
        $sales = Sale::query()->orderBy('id', 'desc')->limit(8)->get();;
        $orders = [];

        foreach ($sales as $s) {
            foreach ($s->product_composition as $product) {
                $item = [
                    'sale_id'           => $s->id,
                    'title'             => $product['title'],
                    'requester'         => $s->user->getNameAttribute(),
                    'uh_bloc'           => empty($s->room) ? '' : $s->room->number . '/' . $s->room->building->name,
                    'situation_name'    => $product['situation_name'] ?? '',
                    'situation_label'   => $product['situation_label'] ?? '',
                    'created_at'        => $s->created_at->format('d/m/Y h:m:s'),
                    'initial_at'        => '',
                ];

                array_push($orders, $item);
            }
        }
        return $orders;
    }

    function popoverSituationFree(Request $request)
    {
        $data = [
            'data'  => $request->all(),
        ];
        return view('Dashboard::popover.free', $data);

    }

    function popoverSituationBusy(Request $request)
    {
        $data = [
            'data'  => $request->all(),
        ];
        return view('Dashboard::popover.busy', $data);

    }

    function popoverSituationCleaningMaintenance(Request $request)
    {
        $data = [
            'data'  => $request->all(),
        ];
        return view('Dashboard::popover.cleaningMaintenance', $data);

    }

    function popoverSituationDayUser(Request $request)
    {
        $data = [
            'data'  => $request->all(),
        ];
        return view('Dashboard::popover.dayUser', $data);

    }

    function popoverSituationCheckin(Request $request)
    {
        $data = [
            'data'  => $request->all(),
        ];
        return view('Dashboard::popover.checkin', $data);

    }

    function popoverSituationCheckout(Request $request)
    {
        $data = [
            'data'  => $request->all(),
        ];
        return view('Dashboard::popover.checkout', $data);

    }
}
