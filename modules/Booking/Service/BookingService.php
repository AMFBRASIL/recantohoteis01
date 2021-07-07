<?php

namespace Modules\Booking\Service;


use App\User;
use Carbon\Carbon;


class BookingService
{
    function replaceFile($file, $booking)
    {
        $user = User::query()->find($booking->customer_id);
        $service = $booking->service;
        $file = str_replace("[name_client]", $user->first_name . ' ' . $user->last_name, $file);
        $file = str_replace("[address_client]", $user->address, $file);
        $file = str_replace("[complement_address_client]", $user->address2 ? $user->address2 : '', $file);
        $file = str_replace("[zipcode_address_client]", $this->mask("#####-###", $user->zip_code), $file);
        $file = str_replace("[phone_client]", $user->phone, $file);
        $file = str_replace("[phone_zap_client]", $user->phone2, $file);
        $file = str_replace("[cpf_client]", $user->cpf_cnpj, $file);
        $file = str_replace("[rg_client]", $user->rg, $file);
        $file = str_replace("[id_booking]", $booking->id, $file);
        $file = str_replace("[date_start_booking]", Carbon::parse($booking->start_date)->format('d/m/Y H:m'), $file);
        $file = str_replace("[date_end_booking]", Carbon::parse($booking->end_date)->format('d/m/Y H:m'), $file);
        $file = str_replace("[value_booking]", $booking->pay_now, $file);
        $file = str_replace("[value_day]", $service->sale_price, $file);
        /*$file = str_replace("[value_signal]", $booking->pay_now, $file);
        $file = str_replace("[value_signal]", $booking->pay_now, $file);*/


        $today = Carbon::now();
        $currentDate = 'São Paulo, ' . $today->day . ' do ' . $today->month . ' de ' . $today->year;

        $file = str_replace("[date_current]", $currentDate, $file);

        return $file;
    }

    function mask($mask, $str)
    {
        $str = str_replace(" ", "", $str);

        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }

        return $mask;
    }
}


