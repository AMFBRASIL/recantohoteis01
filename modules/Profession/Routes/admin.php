<?php

use Illuminate\Support\Facades\Route;

Route::get('/profession','ProfessionController@index')->name('profession.admin.index');
Route::get('/profession/edit/{id}','ProfessionController@edit')->name('profession.admin.edit');
Route::post('/profession/store/{id}','ProfessionController@store')->name('profession.admin.store');
Route::post('/profession/bulkEdit','ProfessionController@bulkEdit')->name('profession.admin.bulkEdit');

