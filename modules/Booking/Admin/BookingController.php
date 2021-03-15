<?php

namespace Modules\Booking\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Booking\Models\Booking;
use Modules\Company\Models\Company;
use Modules\Hotel\Models\HotelRoomBooking;
use Modules\Pos\Models\ConsumptionCard;
use Modules\Pos\Models\Sale;
use Modules\Situation\Models\Situation;

class BookingController extends Controller
{
    public function getBooking(Request $request)
    {
        $booking_id = $request->booking_id;

        if (!is_null($booking_id)) {
            $booking = Booking::query()->find($booking_id);

            if (!empty($booking)) {

                $hotel_room_booking = HotelRoomBooking::query()->where('booking_id', $booking->id)->first();
                $hotel_room = $hotel_room_booking->room()->first();
                $room = $hotel_room->room()->first();

                $user = User::query()->where([
                    ['first_name', '=', $booking->first_name],
                    ['last_name', '=', $booking->last_name],
                    ['email', '=', $booking->email],
                ])->first();

                $company_name = '';

                if ($user->company_id) {
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

                $d1 = new Carbon($hotel_room_booking->start_date);
                $d2 = new Carbon($hotel_room_booking->end_date);

                $diff = $d2->diff($d1);
                return response()->json([
                    'success' => true,
                    'data' => [
                        'booking_id' => $booking->id,
                        'booking_detail' => [
                            'checkin' => (new Carbon($hotel_room_booking->start_date))->format('d/m/y  H:m'),
                            'checkout' => (new Carbon($hotel_room_booking->end_date))->format('d/m/y  H:m'),
                            'nights' => $diff->days,
                            'adults' =>  $booking->getMeta('adults'),
                            'children' =>  $booking->getMeta('children'),
                            'status' => [
                                'name' => $booking->situation->name,
                                'label' => $booking->situation->label,
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
                        'room_information' => [
                            'room' => $hotel_room->title . ' - Bloco ' . $room->building->name . ' - Apto ' . $room->number,
                            'persons' => ($booking->getMeta('adults') + $booking->getMeta('children')),
                            'adults' =>  $booking->getMeta('adults'),
                            'total' => $hotel_room_booking->price,
                        ],
                        'itemsSales' => $itemsSales
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

}
