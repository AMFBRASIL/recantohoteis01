<?php

use Illuminate\Support\Facades\Route;

Route::get('getBooking/', 'BookingController@getBooking')->name('booking.admin.getBooking');
Route::get('getHotelRoomByUserID/', 'BookingController@getHotelRoomByUserID')->name('booking.admin.getHotelRoomByUserID');
Route::get('getAllSituationBooking/', 'BookingController@getAllSituationBooking')->name('booking.admin.getAllSituationBooking');
Route::get('getUserBooking/', 'BookingController@getUserBooking')->name('booking.admin.getUserBooking');
