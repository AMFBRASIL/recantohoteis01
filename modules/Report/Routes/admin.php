<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/1/2019
 * Time: 10:02 AM
 */

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'booking'], function () {
    Route::get('/', 'BookingController@index')->name('report.admin.booking');
    Route::get('/email_preview/{id}', 'BookingController@email_preview')->name('report.booking.email_preview');
    Route::get('/contract/{id}', 'BookingController@contract')->name('report.booking.contract');
    Route::post('/bulkSituation/{id}', 'BookingController@bulkSituation')->name('report.booking.bulkSituation');
});
