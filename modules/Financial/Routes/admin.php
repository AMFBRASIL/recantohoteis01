<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/1/2019
 * Time: 10:02 AM
 */

use Illuminate\Support\Facades\Route;

Route::get('/', 'BillingTypeController@index');

Route::get('/billingType', 'BillingTypeController@index')->name('financial.admin.billingType.index');

Route::get('/billingType/edit/{id}', 'BillingTypeController@edit')->name('financial.admin.billingType.edit');

Route::post('/billingType/store/{id}', 'BillingTypeController@store')->name('financial.admin.billingType.store');

Route::get('/paymentMethod', 'PaymentMethodController@index')->name('financial.admin.payment.method.index');

Route::get('/paymentMethod/edit/{id}', 'PaymentMethodController@edit')->name('financial.admin.payment.method.edit');

Route::post('/paymentMethod/store/{id}', 'PaymentMethodController@store')->name('financial.admin.payment.method.store');

Route::get('/bankAccount', 'BankAccountController@index')->name('financial.admin.bank.account.index');

Route::get('/bankAccount/edit/{id}', 'BankAccountController@edit')->name('financial.admin.bank.account.edit');

Route::post('/bankAccount/store/{id}', 'BankAccountController@store')->name('financial.admin.bank.account.store');

Route::post('/bankAccount/banks', 'BankAccountController@banks')->name('financial.admin.bank.account.banks');

Route::get('/carMachineAccount', 'CardMachineAccountController@index')->name('financial.admin.card.machine.account.index');

Route::get('/carMachineAccount/edit/{id}', 'CardMachineAccountController@edit')->name('financial.admin.card.machine.account.edit');

Route::post('/carMachineAccount/store/{id}', 'CardMachineAccountController@store')->name('financial.admin.card.machine.account.store');

Route::get('/carMachineAccount/cardMachines', 'CardMachineAccountController@cardMachines')->name('financial.admin.card.machine.cardMachines');


Route::group(['prefix' => 'costCenter'], function () {

    Route::get('/', 'CostCenterController@index')->name('financial.admin.cost.center.index');

    Route::get('/edit/{id}', 'CostCenterController@edit')->name('financial.admin.cost.center.edit');

    Route::post('/store/{id}', 'CostCenterController@store')->name('financial.admin.cost.center.store');

    Route::get('/{parent}/subCost/get-select', 'SubCostCenterController@getForSelect2')->name('financial.admin.sub.cost.ajax_get');

    Route::get('/{parent}/subCost', 'SubCostCenterController@indexWithParent')->name('financial.admin.sub.cost.index');

    Route::get('/{parent}/subCost/edit/{id}', 'SubCostCenterController@editWithParent')->name('financial.admin.sub.cost.edit');

    Route::post('/{parent}/subCost/store/{id}', 'SubCostCenterController@storeWithParent')->name('financial.admin.sub.cost.store');

    Route::post('/subCost/bulkEdit', 'SubCostCenterController@bulkEdit')->name('financial.admin.sub.cost.bulkEdit');
});

Route::get('/revenue', 'RevenueController@index')->name('financial.admin.revenue.index');

Route::get('/revenue/edit/{id}', 'RevenueController@edit')->name('financial.admin.revenue.edit');

Route::post('/revenue/store/{id}', 'RevenueController@store')->name('financial.admin.revenue.store');

Route::post('/revenue/create', 'RevenueController@create')->name('financial.admin.revenue.create');
