<?php

use Illuminate\Support\Facades\Route;

Route::get('getBooking/', 'BookingController@getBooking')->name('booking.admin.getBooking');
Route::get('getHotelRoomByUserID/', 'BookingController@getHotelRoomByUserID')->name('booking.admin.getHotelRoomByUserID');
Route::get('getAllSituationBooking/', 'BookingController@getAllSituationBooking')->name('booking.admin.getAllSituationBooking');
Route::get('getUserBooking/', 'BookingController@getUserBooking')->name('booking.admin.getUserBooking');
Route::get('freeRoomInRange/', 'BookingController@getFreeRoomInRange')->name('booking.admin.freeRoomInRange');
Route::get('freeSpaceInRange/', 'BookingController@getFreeSpaceInRange')->name('booking.admin.freeSpaceInRange');
Route::get('freeDayUserInRange/', 'BookingController@getFreeDayUserInRange')->name('booking.admin.freeDayUserInRange');
Route::get('freeEventInRange/', 'BookingController@getFreeEventInRange')->name('booking.admin.freeEventInRange');


Route::get('getBookingHistory/', 'BookingPaymentHistoryController@getBookingHistory')->name('booking.admin.getBookingHistory');


Route::group(['prefix' => 'print'], function () {
    Route::get('detalhesreserva/', 'PrintController@detalhesreserva')->name('print.detalhesreserva');
    Route::get('ficha/', 'PrintController@ficha')->name('print.ficha');
    Route::get('contract/{id}', 'PrintController@contract')->name('print.contract');
    Route::get('term/{id}', 'PrintController@term')->name('print.term');
    Route::get('regulation/{id}', 'PrintController@regulation')->name('print.regulation');
});

