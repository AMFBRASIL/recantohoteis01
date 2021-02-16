<?php

namespace Modules\Reservation\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Hotel\Models\Building;
use Modules\Situation\Models\Situation;

class MapAvailableController extends AdminController
{

    public function __construct()
    {
        $this->setActiveMenu(route('mapAvailable.admin.index'));
    }

    public function index(Request $request)
    {
        $buildding = Building::all();


        $data = [
            '$buildding' => $buildding,
            'breadcrumbs' => [
                [
                    'name' => __('Reservas'),
                    'url' => 'admin/module/availability'
                ],
            ],
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%RESERVA%');
            })->get()
        ];

        return view('Reservation::admin.mapAvailable.index', $data);
    }

}
