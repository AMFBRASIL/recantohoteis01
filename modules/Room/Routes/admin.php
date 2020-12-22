<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', 'RoomController@index')->name('room.admin.index');
Route::get('/create', 'RoomController@create')->name('room.admin.create');
Route::get('/edit/{id}', 'RoomController@edit')->name('room.admin.edit');
Route::post('/store/{id}', 'RoomController@store')->name('room.admin.store');
Route::post('/bulkEdit', 'RoomController@bulkEdit')->name('room.admin.bulkEdit');
Route::get('/recovery', 'RoomController@recovery')->name('room.admin.recovery');

