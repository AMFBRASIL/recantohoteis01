<?php

use \Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'point-of-sale'],function () {
    Route::get('/', 'PointOfSaleController@index')->name('point_of_sale.admin.index');
    Route::get('/create', 'PointOfSaleController@create')->name('point_of_sale.admin.create');
    Route::get('/edit/{id}', 'PointOfSaleController@edit')->name('point_of_sale.admin.edit');
    Route::post('/store/{id}', 'PointOfSaleController@store')->name('point_of_sale.admin.store');
    Route::post('/bulkEdit', 'PointOfSaleController@bulkEdit')->name('point_of_sale.admin.bulkEdit');
    Route::get('/recovery', 'PointOfSaleController@recovery')->name('point_of_sale.admin.recovery');
});
