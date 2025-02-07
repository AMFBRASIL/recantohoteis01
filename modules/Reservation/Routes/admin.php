<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', 'PensionTypeController@index')->name('reservation.admin.index');

Route::group(['prefix' => 'pension-type'],function () {
    Route::get('/', 'PensionTypeController@index')->name('pension_type.admin.index');
    Route::get('/create', 'PensionTypeController@create')->name('pension_type.admin.create');
    Route::get('/edit/{id}', 'PensionTypeController@edit')->name('pension_type.admin.edit');
    Route::post('/store/{id}', 'PensionTypeController@store')->name('pension_type.admin.store');
    Route::post('/bulkEdit', 'PensionTypeController@bulkEdit')->name('pension_type.admin.bulkEdit');
    Route::get('/recovery', 'PensionTypeController@recovery')->name('pension_type.admin.recovery');
});

Route::group(['prefix' => 'reservation-type'],function () {
    Route::get('/', 'ReservationTypeController@index')->name('reservation_type.admin.index');
    Route::get('/create', 'ReservationTypeController@create')->name('reservation_type.admin.create');
    Route::get('/edit/{id}', 'ReservationTypeController@edit')->name('reservation_type.admin.edit');
    Route::post('/store/{id}', 'ReservationTypeController@store')->name('reservation_type.admin.store');
    Route::post('/bulkEdit', 'ReservationTypeController@bulkEdit')->name('reservation_type.admin.bulkEdit');
    Route::get('/recovery', 'ReservationTypeController@recovery')->name('reservation_type.admin.recovery');
    Route::get('/all', 'ReservationTypeController@reservationType')->name('reservation_type.admin.reservationType');
});

Route::group(['prefix' => 'check-availability'],function () {
    Route::get('/', 'CheckAvailabilityController@index')->name('check_availability.admin.index');
    Route::get('/create', 'CheckAvailabilityController@create')->name('check_availability.admin.create');
    Route::get('/edit/{id}', 'CheckAvailabilityController@edit')->name('check_availability.admin.edit');
    Route::post('/store/{id}', 'CheckAvailabilityController@store')->name('check_availability.admin.store');
    Route::post('/bulkEdit', 'CheckAvailabilityController@bulkEdit')->name('check_availability.admin.bulkEdit');
    Route::get('/recovery', 'CheckAvailabilityController@recovery')->name('check_availability.admin.recovery');
});

Route::group(['prefix' => 'mapAvailable'],function () {
    Route::get('/', 'MapAvailableController@index')->name('mapAvailable.admin.index');
    Route::get('findFloorByBuildingID','MapAvailableController@findFloorByBuildingID')->name('mapAvailable.admin.findFloorByBuildingID');
    Route::get('findByFilter','MapAvailableController@findByFilter')->name('mapAvailable.admin.findByFilter');
});

Route::group(['prefix' => 'booking'], function () {
    Route::get('/', 'BookingController@index')->name('reservation.admin.booking');
    Route::get('/email_preview/{id}', 'BookingController@email_preview')->name('reservation.booking.admin.email_preview');
    Route::post('/bulkSituation/{id}', 'BookingController@bulkSituation')->name('reservation.booking.admin.bulkSituation');
    Route::post('/saveValidation', 'BookingController@saveValidation')->name('reservation.booking.admin.saveValidation');
    Route::get('/saveValidationIndex', 'BookingController@saveValidationIndex')->name('reservation.booking.admin.saveValidationIndex');
    Route::post('/savePaymentHistory', 'BookingController@savePaymentHistory')->name('reservation.booking.admin.savePaymentHistory');
    Route::get('/savePaymentHistoryIndex', 'BookingController@savePaymentHistoryIndex')->name('reservation.booking.admin.savePaymentHistoryIndex');
});
