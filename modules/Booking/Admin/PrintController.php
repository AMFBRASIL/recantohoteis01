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

    public function regras()
    {
        return view('Booking::admin.print.regras');
    }
    public function contrato($id)
    {
        $booking = Booking::query()->find($id)->first();
        $settings = Settings::query()->where("name", "space_contract")->first();

        $contract = $this->bookingService->getContract($settings->val, $booking);

        $data = [
            'contract' => $contract,
        ];

        return view('Booking::admin.print.contrato',$data);
    }
    public function regulamento()
    {
        return view('Booking::admin.print.regulamento');
    }
}
