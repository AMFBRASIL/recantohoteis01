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
    Route::post('/bulkSituation/{id}', 'BookingController@bulkSituation')->name('report.booking.bulkSituation');
    Route::post('/saveValidation', 'BookingController@saveValidation')->name('report.booking.saveValidation');
    Route::get('/saveValidationIndex', 'BookingController@saveValidationIndex')->name('report.admin.saveValidationIndex');
    Route::post('/savePaymentHistory', 'BookingController@savePaymentHistory')->name('report.booking.savePaymentHistory');
    Route::get('/savePaymentHistoryIndex', 'BookingController@savePaymentHistoryIndex')->name('report.admin.savePaymentHistoryIndex');
});


