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
});
