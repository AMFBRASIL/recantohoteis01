<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', 'CharacteristicController@index')->name('characteristic.admin.index');
Route::get('/create', 'CharacteristicController@create')->name('characteristic.admin.create');
Route::get('/edit/{id}', 'CharacteristicController@edit')->name('characteristic.admin.edit');
Route::post('/store/{id}', 'CharacteristicController@store')->name('characteristic.admin.store');
Route::post('/bulkEdit', 'CharacteristicController@bulkEdit')->name('characteristic.admin.bulkEdit');
Route::get('/recovery', 'CharacteristicController@recovery')->name('characteristic.admin.recovery');

