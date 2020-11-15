<?php

use \Illuminate\Support\Facades\Route;


Route::get('/','SupplierController@index')->name('supplier.admin.index');
Route::get('/create','SupplierController@create')->name('supplier.admin.create');
Route::get('/edit/{id}','SupplierController@edit')->name('supplier.admin.edit');
Route::post('/store/{id}','SupplierController@store')->name('supplier.admin.store');
Route::post('/bulkEdit','SupplierController@bulkEdit')->name('supplier.admin.bulkEdit');
Route::get('/recovery','SupplierController@recovery')->name('supplier.admin.recovery');

// Ajax
Route::get('/get-select','SupplierController@getForSelect2')->name('supplier.admin.ajax_get');
