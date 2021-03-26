<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', 'AgeController@index')->name('age.admin.index');
Route::get('/create', 'AgeController@create')->name('age.admin.create');
Route::get('/edit/{id}', 'AgeController@edit')->name('age.admin.edit');
Route::post('/store/{id}', 'AgeController@store')->name('age.admin.store');
Route::post('/bulkEdit', 'AgeController@bulkEdit')->name('age.admin.bulkEdit');
Route::get('/recovery', 'AgeController@recovery')->name('age.admin.recovery');

