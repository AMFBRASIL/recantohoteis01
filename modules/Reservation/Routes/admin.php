<?php

use \Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pension-type'],function () {
    Route::get('/', 'PensionTypeController@index')->name('pension_type.admin.index');
    Route::get('/create', 'PensionTypeController@create')->name('pension_type.admin.create');
    Route::get('/edit/{id}', 'PensionTypeController@edit')->name('pension_type.admin.edit');
    Route::post('/store/{id}', 'PensionTypeController@store')->name('pension_type.admin.store');
    Route::post('/bulkEdit', 'PensionTypeController@bulkEdit')->name('pension_type.admin.bulkEdit');
    Route::get('/recovery', 'PensionTypeController@recovery')->name('pension_type.admin.recovery');
});
