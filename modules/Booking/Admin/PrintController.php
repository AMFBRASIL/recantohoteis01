<?php

namespace Modules\Booking\Admin;

use App\Http\Controllers\Controller;
use Modules\Booking\Models\Booking;
use Modules\Core\Models\Settings;
use Modules\Booking\Service\BookingService;

class PrintController extends Controller
{
    /**
     * @var BookingService
     */
    private $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }


    public function detalhesreserva()
    {
        return view('Booking::admin.print.detalhesreserva');
    }

    public function ficha()
    {
        return view('Booking::admin.print.ficha');
    }

    public function contract($id)
    {
        $booking = Booking::query()->find($id);
        $settings = Settings::query()->where("name", "space_contract")->first();

        $contract = $this->bookingService->replaceFile($settings->val, $booking);

        $data = [
            'contract' => $contract,
        ];

        return view('Booking::admin.print.contract',$data);
    }


    public function term($id)
    {
        $booking = Booking::query()->find($id);
        $settings = Settings::query()->where("name", "space_inspection_term")->first();

        $term = $this->bookingService->replaceFile($settings->val, $booking);

        $data = [
            'term' => $term,
        ];

        return view('Booking::admin.print.term', $data);
    }

    public function regulation($id)
    {
        $booking = Booking::query()->find($id);
        $settings = Settings::query()->where("name", "space_internal_regime")->first();

        $regulation = $this->bookingService->replaceFile($settings->val, $booking);

        $data = [
            'regulation' => $regulation,
        ];

        return view('Booking::admin.print.regulation', $data);
    }
}
