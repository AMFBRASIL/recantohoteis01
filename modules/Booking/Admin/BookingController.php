<?php

namespace Modules\Booking\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Booking\Models\Booking;
use Modules\Company\Models\Company;
use Modules\Event\Models\Event;
use Modules\Hotel\Models\HotelRoom;
use Modules\Hotel\Models\HotelRoomBooking;
use Modules\Pos\Models\ConsumptionCard;
use Modules\Pos\Models\Sale;
use Modules\Situation\Models\Situation;
use Modules\Space\Models\Space;
use Modules\Tour\Models\Tour;

class BookingController extends Controller
{
    public function getBooking(Request $request)
    {
        $booking_id = $request->booking_id;

        try {

            if (!is_null($booking_id)) {
                $booking = Booking::query()->find($booking_id);

                if (!empty($booking)) {

                    $hotel_room_booking = HotelRoomBooking::query()->where('booking_id', $booking->id)->first();
                    $room_description = '';

                    if (!empty($hotel_room_booking)) {
                        $hotel_room = $hotel_room_booking->room()->first();
                        $room = $hotel_room->room()->first();
                        if (!empty($room->building)) {
                            $room_description = $hotel_room->title . ' - Bloco ' . $room->building->name . ' - Apto ' . $room->number;
                        }
                    }

                    $room_information = [
                        'room' => $room_description,
                        'persons' => (intval($booking->getMeta('adults')) + intval($booking->getMeta('children'))),
                        'adults' => $booking->getMeta('adults'),
                        'total' => $booking->total,
                    ];

                    // $user = User::query()->where([
                    //     ['first_name', '=', $booking->first_name],
                    //     ['last_name', '=', $booking->last_name],
                    //     ['email', '=', $booking->email],
                    // ])->first();

                    $booking->load('customer');
                    $user = $booking->customer;

                    $company_name = '';

                    if (isset($user->company_id)) {
                        $company_name = Company::query()->find($user->company_id)->titile;
                    }

                    $card = ConsumptionCard::query()->where('user_id', $user->id)->first();
                    $itemsSales = [];
                    if (!empty($card)) {
                        $sales = Sale::query()->where('card_number', '=', $card->card_number)->get();

                        foreach ($sales as $s) {
                            foreach ($s->product_composition as $product) {
                                $item = [
                                    'sale_id' => $s->id,
                                    'title' => $product['title'],
                                    'price' => $product['price'],
                                    'quantity' => $product['quantity'],
                                    'created_at' => $s->created_at->format('d/m/y h:m:s'),
                                ];

                                array_push($itemsSales, $item);
                            }
                        }
                    }

                    $d1 = new Carbon($booking->start_date);
                    $d2 = new Carbon($booking->end_date);

                    $diff = $d2->diff($d1);
                    return response()->json([
                        'success' => true,
                        'data' => [
                            'booking_id' => $booking->id,
                            'booking_type' => $booking->object_model,
                            'booking_detail' => [
                                'checkin' => (new Carbon($booking->start_date))->format('d/m/y  H:m'),
                                'checkout' => (new Carbon($booking->end_date))->format('d/m/y  H:m'),
                                'nights' => $diff->days,
                                'adults' => $booking->getMeta('adults'),
                                'children' => $booking->getMeta('children'),
                                'status' => [
                                    'name' => empty($booking->situation) ? '' : $booking->situation->name,
                                    'label' => empty($booking->situation) ? '' : $booking->situation->label,
                                ]
                            ],
                            'billing' => [
                                'name' => $user->first_name . ' ' . $user->last_name,
                                'company' => $company_name,
                                'address' => $booking->address . ', ' . $booking->address2,
                                'complement' => $booking->city . ' - ' . $booking->state . ' - CEP: ' . $booking->zip_code,
                                'phone' => $booking->phone,
                                'email' => $booking->email,
                            ],
                            'room_information' => $room_information,
                            'itemsSales' => $itemsSales,
                        ]
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => "Reserva não encontrado"
                    ], 200);
                }
            }
            return response()->json([
                'success' => false,
                'message' => "Reserva não encontrado"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Reserva não encontrado",
                'error' => $e->getMessage(),
            ], 200);
        }
    }

    public function getHotelRoomByUserID(Request $request)
    {
        $user = User::query()->find($request->user_id);
        $consumptionCard = ConsumptionCard::query()
            ->where('user_id', $user->id)
            ->whereHas('situation', function ($query) {
                $query->where('name', 'like', '%EM ABERTO%');
            })->get()->first();

        if (isset($user)) {
            $hotel_room_booking = HotelRoomBooking::query()->whereHas('booking', function ($query) use ($user) {
                $query->where([
                    ['first_name', '=', $user->first_name],
                    ['last_name', '=', $user->last_name],
                    ['email', '=', $user->email],
                ])
                    ->whereHas('situation', function ($query) {
                        $query->where('name', 'like', '%EM USO%');
                    });
            })->get();

            $room = [];

            if (!empty($hotel_room_booking)) {
                foreach ($hotel_room_booking as $a) {
                    $a->room->room;
                    array_push($room, $a->room);
                }
            }

            return response()->json([
                'room' => $room,
                'consumptionCard' => $consumptionCard
            ]);
        } else {
            return response()->json([
                'room' => [],
                'consumptionCard' => ''
            ]);
        }
    }

    public function getAllSituationBooking()
    {
        $situationList = Situation::query()->whereHas('section', function ($query) {
            $query->where('name', 'like', '%RESERVAS%');
        })->get();

        return response()->json([
            'situationList' => $situationList,
        ]);
    }

    public function getUserBooking(Request $request)
    {
        $booking_id = $request->booking_id;

        if (!is_null($booking_id)) {
            $booking = Booking::query()->find($booking_id);

            if (!empty($booking)) {
                return response()->json([
                    'error' => false,
                    'booking' => $booking,
                ]);
            }
        }
        return response()->json([
            'error' => true,
            'message' => "Falha ao localizar usuario",
        ]);
    }

    public function getFreeRoomInRange(Request $request){

        $rooms = (new HotelRoom())->getFreeRoomInRange($request->start, $request->end);

        $data = [
            'rooms' => $rooms
        ];

        $uh = view('Booking::admin.modal.uh.hotel', $data)->render();

        return response()->json([
            'error' => false,
            'rooms' => $rooms,
            'view'  => $uh
        ]);
    }

    public function getFreeSpaceInRange(Request $request){

        $spaces = (new Space())->getFreeSpaceInRange($request->start, $request->end);

        $data = [
            'spaces' => $spaces
        ];

        $uh = view('Booking::admin.modal.uh.space', $data)->render();

        return response()->json([
            'error' => false,
            'spaces' => $spaces,
            'view'  => $uh
        ]);
    }

    public function getFreeDayUserInRange(Request $request){

        $tours = (new Tour())->getFreeDayUserInRange($request->start, $request->end);

        $data = [
            'tours' => $tours
        ];

        $uh = view('Booking::admin.modal.uh.tour', $data)->render();

        return response()->json([
            'error' => false,
            'tours' => $tours,
            'view'  => $uh
        ]);
    }

    public function getFreeEventInRange(Request $request){

        $events = (new Event())->getFreeEventInRange($request->start, $request->end);

        return response()->json([
            'error' => false,
            'events' => $events,
        ]);
    }
}
