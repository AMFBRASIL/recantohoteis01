<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/1/2019
 * Time: 10:02 AM
 */

use Illuminate\Support\Facades\Route;

Route::get('/', 'ConsumptionCardController@index');

Route::group(['prefix' => 'consumptionCard'], function () {

    Route::get('/', 'ConsumptionCardController@index')->name('pos.admin.consumption.card.index');

    Route::post('/store/{id}', 'ConsumptionCardController@store')->name('pos.admin.consumption.card.store');

    Route::get('/{parent?}/historical', 'HistoricalConsumerCardController@indexWithParent')->name('pos.admin.historical.consumer.card.index');

    Route::get('/{parent?}/closed', 'HistoricalConsumerCardController@closed')->name('pos.admin.historical.consumer.card.closed.index');

    Route::get('/findCard', 'ConsumptionCardController@findCard')->name('pos.admin.historical.consumer.card.findCard.index');

    Route::get('/findHistoricalCard', 'HistoricalConsumerCardController@findHistoricalCard')->name('pos.admin.historical.consumer.card.findHistoricalCard.index');
});

Route::group(['prefix' => 'authorizationPassword'], function () {

    Route::get('/', 'AuthorizationPasswordController@index')->name('pos.admin.authorization.password.index');

    Route::post('/store/{id}', 'AuthorizationPasswordController@store')->name('pos.admin.authorization.password.store');

    Route::post('renovation', 'AuthorizationPasswordController@renovation')->name('pos.admin.authorization.password.renovation');

    Route::post('expiration', 'AuthorizationPasswordController@expiration')->name('pos.admin.authorization.password.expiration');

    Route::get('/check', 'AuthorizationPasswordController@check')->name('pos.admin.authorization.password.check');
});

Route::group(['prefix' => 'sale'], function () {

    Route::get('/', 'SaleController@index')->name('pos.admin.sale.index');

    Route::get('/create', 'SaleController@create')->name('pos.admin.sale.create');

    Route::post('/store/{id}', 'SaleController@store')->name('pos.admin.sale.store');

    Route::get('getSales/', 'SaleController@getSales')->name('pos.admin.sale.getSales');

    Route::get('getSalesCard/', 'SaleController@getSalesCard')->name('pos.admin.sale.getSalesCard');

    Route::post('/bulkSituation/{id}', 'SaleController@bulkSituation')->name('pos.admin.sale.bulkSituation');
});

