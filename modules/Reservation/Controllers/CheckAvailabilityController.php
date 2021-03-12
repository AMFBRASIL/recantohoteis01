<?php

namespace Modules\Reservation\Controllers;

use App\Http\Controllers\Controller;

class CheckAvailabilityController extends Controller
{
    public function detalhesreserva()
    {
        return view('Reservation::admin.check_availability.print.detalhesreserva');
    }

    public function ficha()
    {
        return view('Reservation::admin.check_availability.print.ficha');
    }

    public function regras()
    {
        return view('Reservation::admin.check_availability.print.regras');
    }
    public function contrato()
    {
        return view('Reservation::admin.check_availability.print.contrato');
    }
    public function regulamento()
    {
        return view('Reservation::admin.check_availability.print.regulamento');
    }
}
