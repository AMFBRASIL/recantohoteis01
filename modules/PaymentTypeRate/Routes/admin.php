<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', 'PaymentTypeRateController@index')->name('paymentTypeRate.admin.index');
Route::get('/create', 'PaymentTypeRateController@create')->name('paymentTypeRate.admin.create');
Route::get('/edit/{id}', 'PaymentTypeRateController@edit')->name('paymentTypeRate.admin.edit');
Route::post('/store/{id}', 'PaymentTypeRateController@store')->name('paymentTypeRate.admin.store');
Route::post('/bulkEdit', 'PaymentTypeRateController@bulkEdit')->name('paymentTypeRate.admin.bulkEdit');
Route::get('/recovery', 'PaymentTypeRateController@recovery')->name('paymentTypeRate.admin.recovery');

