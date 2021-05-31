<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', 'GarageController@index')->name('garage.admin.index');
Route::get('/create', 'GarageController@create')->name('garage.admin.create');
Route::get('/edit/{id}', 'GarageController@edit')->name('garage.admin.edit');
Route::post('/store/{id}', 'GarageController@store')->name('garage.admin.store');
Route::post('/bulkEdit', 'GarageController@bulkEdit')->name('garage.admin.bulkEdit');
Route::get('/recovery', 'GarageController@recovery')->name('garage.admin.recovery');
Route::get('/garages', 'GarageController@garages')->name('garage.admin.garages');

