<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', 'ClassificationController@index')->name('classification.admin.index');
Route::get('/create', 'ClassificationController@create')->name('classification.admin.create');
Route::get('/edit/{id}', 'ClassificationController@edit')->name('classification.admin.edit');
Route::post('/store/{id}', 'ClassificationController@store')->name('classification.admin.store');
Route::post('/bulkEdit', 'ClassificationController@bulkEdit')->name('classification.admin.bulkEdit');
Route::get('/recovery', 'ClassificationController@recovery')->name('classification.admin.recovery');

