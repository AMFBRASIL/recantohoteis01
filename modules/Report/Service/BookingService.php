<?php


namespace Modules\Report\Service;


use App\User;
use Carbon\Carbon;


class BookingService
{
    function getContract($contract, $booking)
    {
        $user = User::query()->find($booking->customer_id)->first();
        $service = $booking->service;

        $contract = str_replace("[name_client]", $user->first_name . ' ' . $user->last_name, $contract);
        $contract = str_replace("[address_client]", $user->address, $contract);
        $contract = str_replace("[complement_address_client]", $user->address2, $contract);
        $contract = str_replace("[zipcode_address_client]", $this->mask("#####-###", $user->zip_code), $contract);
        $contract = str_replace("[phone_client]", $user->phone, $contract);
        $contract = str_replace("[phone_zap_client]", $user->phone2, $contract);
        $contract = str_replace("[cpf_client]", $user->cpf_cnpj, $contract);
        $contract = str_replace("[rg_client]", $user->rg, $contract);
        $contract = str_replace("[id_booking]", $booking->id, $contract);
        $contract = str_replace("[date_start_booking]", Carbon::parse($booking->start_date)->format('d/m/Y H:m'), $contract);
        $contract = str_replace("[date_end_booking]", Carbon::parse($booking->end_date)->format('d/m/Y H:m'), $contract);
        $contract = str_replace("[value_booking]", $booking->pay_now, $contract);
        $contract = str_replace("[value_day]", $service->sale_price, $contract);
        /*$contract = str_replace("[value_signal]", $booking->pay_now, $contract);
        $contract = str_replace("[value_signal]", $booking->pay_now, $contract);*/


        $today = Carbon::now();
        $currentDate = 'São Paulo, ' . $today->day . ' do ' . $today->month . ' de ' . $today->year;

        $contract = str_replace("[date_current]", $currentDate, $contract);

        return $contract;
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


