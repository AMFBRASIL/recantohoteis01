<?php

use \Illuminate\Support\Facades\Route;

Route::get('/','StockController@index')->name('stock.admin.index');
Route::get('/create','StockController@create')->name('stock.admin.create');
Route::get('/edit/{id}','StockController@edit')->name('stock.admin.edit');
Route::post('/store/{id}','StockController@store')->name('stock.admin.store');
Route::post('/bulkEdit','StockController@bulkEdit')->name('stock.admin.bulkEdit');
Route::get('/recovery','StockController@recovery')->name('stock.admin.recovery');

// Ajuste
Route::group(['prefix' => 'adjustment'],function (){
    Route::get('/get-product-composition/{id}','StockAdjustmentController@getComposition')->name('stock_adjustment.admin.get_composition');
    Route::get('/','StockAdjustmentController@index')->name('stock_adjustment.admin.index');
    Route::get('/create','StockAdjustmentController@create')->name('stock_adjustment.admin.create');
    Route::get('/edit/{id}','StockAdjustmentController@edit')->name('stock_adjustment.admin.edit');
    Route::post('/store/{id}','StockAdjustmentController@store')->name('stock_adjustment.admin.store');
    Route::post('/bulkEdit','StockAdjustmentController@bulkEdit')->name('stock_adjustment.admin.bulkEdit');
    Route::get('/recovery','StockAdjustmentController@recovery')->name('stock_adjustment.admin.recovery');
});

// Orçamento
Route::group(['prefix' => 'budget'],function (){
    Route::get('/get-product-composition/{id}','BudgetController@getProductComposition')->name('budget.admin.get_product_composition');
    Route::get('/get-supplier-composition/{id}','BudgetController@getSupplierComposition')->name('budget.admin.get_supplier_composition');
    Route::get('/','BudgetController@index')->name('budget.admin.index');
    Route::get('/create','BudgetController@create')->name('budget.admin.create');
    Route::get('/edit/{id}','BudgetController@edit')->name('budget.admin.edit');
    Route::post('/store/{id}','BudgetController@store')->name('budget.admin.store');
    Route::post('/bulkEdit','BudgetController@bulkEdit')->name('budget.admin.bulkEdit');
    Route::get('/recovery','BudgetController@recovery')->name('budget.admin.recovery');
});

// CFOP
Route::get('/get-select','StockController@getForSelect2')->name('stock.admin.ajax_get');
Route::post('/ajax','StockController@ajaxStore')->name('stock.admin.ajax_store');
