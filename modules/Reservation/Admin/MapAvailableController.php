<?php

namespace Modules\Reservation\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Characteristic\Models\Characteristic;
use Modules\Classification\Models\Classification;
use Modules\Hotel\Models\Building;
use Modules\Hotel\Models\BuildingFloor;
use Modules\Hotel\Models\HotelRoom;
use Modules\Room\Models\Room;
use Modules\Situation\Models\Situation;

class MapAvailableController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu(route('mapAvailable.admin.index'));
    }

    public function index(Request $request)
    {
        $data = [
            'breadcrumbs' => [
                [
                    'name' => __('Reservas'),
                    'url' => 'admin/module/availability'
                ],
            ],
            'situationList' => Situation::query()->whereHas('section', function ($query) {
                $query->where('name', 'like', '%QUARTO%');
            })->get(),
            'buildingList' => Building::all(),
            'classificationList' => Classification::all(),
            'characteristicList' => Characteristic::all(),
        ];

        return view('Reservation::admin.mapAvailable.index', $data);
    }

    public function findFloorByBuildingID(Request $request)
    {
        $building = Building::query()->where('id', $request->building_id)->first();

        if(!empty($building)){
            $floor = $building->floors()->get();

            return response()->json([
                'results' =>  $floor
            ]);
        }

        return response()->json([
            'results' => []
        ]);
    }

    public function findByFilter(Request $request){
        $situation_id = $request->situation_id;
        $building_id  = $request->building_id ;
        $floor_id = $request->floor_id;
        $classification_id = $request->classification_id;
        $characteristic_id = $request->characteristic_id;

        if(!empty($building_id)){
            $buildings = Building::query()->where('id','=',$building_id)->get();
        }else{
            $buildings = Building::all();
        }

        $hotelRoom = HotelRoom::query();

        if (!empty($floor_id) and $floor_id != 'null') {
            $hotelRoom->join("bravo_room",'bravo_room.id' ,'=',"bravo_hotel_rooms.room_id")
                ->join("bravo_building_floor", "bravo_building_floor.id",'=',"bravo_room.building_floor_id")
                ->where("bravo_building_floor.id",'=',$floor_id);
        }

        if (!empty($situation_id)) {
            $hotelRoom->join("bravo_situation",'bravo_situation.id' ,'=',"bravo_hotel_rooms.situation_id")
                ->where("bravo_situation.id",'=',$situation_id);
        }

        if (!empty($classification_id)) {
            $hotelRoom->join("bravo_classification",'bravo_classification.id' ,'=',"bravo_hotel_rooms.classification_id")
                ->where("bravo_classification.id",'=',$classification_id);
        }

        if (!empty($characteristic_id)) {
            $hotelRoom->join("bravo_characteristic",'bravo_characteristic.id' ,'=',"bravo_hotel_rooms.characteristic_id")
                ->where("bravo_characteristic.id",'=',$characteristic_id);
        }

        $h_rooms = $hotelRoom->get();

        $dashboard = [];
        $totalItems = 0;

        foreach($buildings as $b) {
            $hotel_rooms = [];
            foreach($h_rooms as $h) {
                $room = $h->room;
                $h->characteristic;
                $h->classification;
                $h->situation;
                if(!empty($room) && $room->building_id == $b->id){
                    $h->room->building;
                    $h->room->buildingFloor;
                    array_push($hotel_rooms,$h);
                    ++$totalItems;
                }
            }

            array_push($dashboard,[
                'building_name' => $b->name,
                'hotel_rooms' =>  $hotel_rooms
            ]);
        }

        return response()->json([
            'results' =>  $dashboard,
            'totalItems' => $totalItems,
        ]);
    }
}
