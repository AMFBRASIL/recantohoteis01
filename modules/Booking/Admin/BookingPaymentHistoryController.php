<?php

namespace Modules\Booking\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Booking\Models\Booking;
use Modules\Booking\Models\BookingPaymentHistory;
use Modules\Company\Models\Company;
use Modules\Hotel\Models\HotelRoomBooking;
use Modules\Pos\Models\ConsumptionCard;
use Modules\Pos\Models\Sale;
use Modules\Situation\Models\Situation;

class BookingPaymentHistoryController extends Controller
{
    public function getBookingHistory(Request $request){

        $booking_id = $request->booking_id;

        if (!is_null($booking_id)) {
            $bookingPaymentHistory = BookingPaymentHistory::query()->where('booking_id' ,$booking_id)->get();

            if (!empty($bookingPaymentHistory)) {

                foreach($bookingPaymentHistory as $b){
                    $b->paymentMethod;
                    $b->paymentTypeRate;
                }

                return response()->json([
                    'error' => false,
                    'bookingPaymentHistory' => $bookingPaymentHistory,
                ]);
            }else{
                return response()->json([
                    'error' => false,
                    'bookingPaymentHistory' => [],
                ]);
            }
        }
        return response()->json([
            'error' => true,
            'message' => "Falha ao localizar historico de pagamento",
        ]);
    }
}
