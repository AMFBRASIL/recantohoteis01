<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'print'], function () {
    Route::get('detalhesreserva/', 'CheckAvailabilityController@detalhesreserva')->name('checkAvailability.print.detalhesreserva');
    Route::get('ficha/', 'CheckAvailabilityController@ficha')->name('checkAvailability.print.ficha');
    Route::get('regras/', 'CheckAvailabilityController@regras')->name('checkAvailability.print.regras');
    Route::get('contrato/', 'CheckAvailabilityController@contrato')->name('checkAvailability.print.contrato');
    Route::get('regulamento/', 'CheckAvailabilityController@regulamento')->name('checkAvailability.print.regulamento');
});
