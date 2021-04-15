<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', 'TariffController@index')->name('tariff.admin.index');
Route::get('/create', 'TariffController@create')->name('tariff.admin.create');
Route::get('/edit/{id}', 'TariffController@edit')->name('tariff.admin.edit');
Route::post('/store/{id}', 'TariffController@store')->name('tariff.admin.store');
Route::post('/bulkEdit', 'TariffController@bulkEdit')->name('tariff.admin.bulkEdit');

