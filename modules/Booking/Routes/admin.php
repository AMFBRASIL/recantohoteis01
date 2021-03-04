<?php

use Illuminate\Support\Facades\Route;

Route::get('getBooking/', 'BookingController@getBooking')->name('booking.admin');

