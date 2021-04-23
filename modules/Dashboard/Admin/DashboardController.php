<?php

namespace Modules\Dashboard\Admin;

use Illuminate\Http\Request;
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
            'recent_bookings'       => Booking::getRecentBookings(8),
            'restaurant_orders'     => $this->restaurantOrders(),
            'top_cards'             => Booking::getTopCardsReport(),
            'earning_chart_data'    => Booking::getDashboardChartData($f, time())
        ];
        return view('Dashboard::index', $data);
    }

    public function reloadChart(Request $request)
    {
        $chart = $request->input('chart');
        switch ($chart) {
            case "earning":
                $from = $request->input('from');
                $to = $request->input('to');
                return $this->sendSuccess([
                    'data' => Booking::getDashboardChartData(strtotime($from), strtotime($to))
                ]);
        }
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
        $released = empty($released) ? 0 : $released->count();

        array_push($statistics, [
            'situation' => ["name" => "Livres"],
            'percentage' => intval(($released * 100) / $totalHotelRoom),
            'label' => 'green',
            'total' => $released,
            'id' => 'situation_liberado'
        ]);


        //OCUPADO
        $busySituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%Quarto%');
        })->where('name', 'like', '%OCUPADO%')->get(['id', 'name', 'label'])->first();

        $busy = HotelRoom::query()
            ->where('situation_id', $busySituation->id)
            ->whereBetween('updated_at', [$start, $end]);;
        $busy = empty($busy) ? 0 : $busy->count();

        array_push($statistics, [
            'situation' => ["name" => "Ocupados"],
            'percentage' => intval(($busy * 100) / $totalHotelRoom),
            'label' => 'red',
            'total' => $busy,
            'id' => 'situation_ocupado'
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
        $inCleaning = empty($inCleaning) ? 0 : $inCleaning->count();

        $inMaintenance = HotelRoom::query()
            ->where('situation_id', $inMaintenanceSituation->id)
            ->whereBetween('updated_at', [$start, $end]);
        $inMaintenance = empty($inCleaning) ? 0 : $inMaintenance->count();

        $totalMaintenanceCleaning = $inCleaning + $inMaintenance;

        array_push($statistics, [
            'situation' => ["name" => "Manu/Limp"],
            'percentage' => intval(($totalMaintenanceCleaning * 100) / $totalHotelRoom),
            'label' => 'red',
            'total' => $totalMaintenanceCleaning,
            'id' => 'situation_maintenance_cleaning'
        ]);

        //DayUser
        $dayUser = Booking::query()
            ->where('object_model', 'tour')
            ->whereBetween('start_date', [$start, $end]);
        $dayUser = empty($dayUser) ? 0 : $dayUser->count();

        array_push($statistics, [
            'situation' => ["name" => "Day Use"],
            'percentage' => 100,
            'label' => 'red',
            'total' => $dayUser,
            'id' => 'situation_day_user'
        ]);

        //CHECK_IN
        $checkInSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%RESERVAS%');
        })->where('name', 'like', '%CHECK-IN%')->get(['id', 'name', 'label'])->first();

        $checkIn = HotelRoom::query()
            ->where('situation_id', $checkInSituation->id)
            ->whereBetween('updated_at', [$start, $end]);
        $checkIn = empty($checkIn) ? 0 : $checkIn->count();

        array_push($statistics, [
            'situation' => ["name" => "Prev. Entrada"],
            'percentage' => intval(($checkIn * 100) / $totalHotelRoom),
            'label' => 'green',
            'total' => $checkIn,
            'id' => 'situation_checkIn'
        ]);

        $checkOutSituation = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%RESERVAS%');
        })->where('name', 'like', '%CHECK-OUT%%')->get(['id', 'name', 'label'])->first();

        $checkout = HotelRoom::query()
            ->where('situation_id', $checkOutSituation->id)
            ->whereBetween('updated_at', [$start, $end]);
        $checkout = empty($checkout) ? 0 : $checkout->count();

        array_push($statistics, [
            'situation' => ["name" => "Prev. Saida"],
            'percentage' => intval(($checkout * 100) / $totalHotelRoom),
            'label' => 'red',
            'total' => $checkout,
            'id' => 'situation_checkout'
        ]);

        return $statistics;
    }


    public function popoverSituation(Request $request)
    {
//        dd($request->all());
//        switch ($request->input('name')) {
//            case 'Livres' :
//                $data = [
//                    'recent_bookings' => "kjkjd"
//                ];
//                return view('Dashboard::Situation.livres', $data);
//        }
    }

    function restaurantOrders()
    {
        $sales = Sale::query()->orderBy('id', 'desc')->limit(8)->get();;
        $orders = [];

        foreach ($sales as $s) {
            foreach ($s->product_composition as $product) {
                $item = [
                    'sale_id' => $s->id,
                    'title' => $product['title'],
                    'requester' => $s->user->getNameAttribute(),
                    'uh_bloc' => empty($s->room) ? '' : $s->room->number . '/' . $s->room->building->name,
                    'situation_name' => $product['situation_name'] ?? '',
                    'situation_label' => $product['situation_label'] ?? '',
                    'created_at' => $s->created_at->format('d/m/Y h:m:s'),
                    'initial_at' => '',
                ];

                array_push($orders, $item);
            }
        }
        return $orders;
    }

}
