<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/1/2019
 * Time: 10:02 AM
 */

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'consumptionCard'], function () {

    Route::get('/', 'ConsumptionCardController@index')->name('pos.admin.consumption.card.index');

    Route::post('/store/{id}', 'ConsumptionCardController@store')->name('pos.admin.consumption.card.store');

    Route::get('/{parent}/historical', 'HistoricalConsumerCardController@indexWithParent')->name('pos.admin.historical.consumer.card.index');

    Route::get('/{parent}/closed', 'HistoricalConsumerCardController@closed')->name('pos.admin.historical.consumer.card.closed.index');
});

