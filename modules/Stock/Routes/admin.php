<?php

use \Illuminate\Support\Facades\Route;

Route::get('/','StockController@index')->name('stock.admin.index');
Route::get('/create','StockController@create')->name('stock.admin.create');
Route::get('/edit/{id}','StockController@edit')->name('stock.admin.edit');
Route::post('/store/{id}','StockController@store')->name('stock.admin.store');
Route::post('/bulkEdit','StockController@bulkEdit')->name('stock.admin.bulkEdit');
Route::get('/recovery','StockController@recovery')->name('stock.admin.recovery');

// CFOP
Route::get('/get-select','StockController@getForSelect2')->name('stock.admin.ajax_get');
Route::post('/ajax','StockController@ajaxStore')->name('stock.admin.ajax_store');
