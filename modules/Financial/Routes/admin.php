<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/1/2019
 * Time: 10:02 AM
 */
use Illuminate\Support\Facades\Route;

Route::get('/','BillingTypeController@index');

Route::get('/billingType','BillingTypeController@index')->name('financial.admin.billingType.index');

Route::get('/billingType/edit/{id}','BillingTypeController@edit')->name('financial.admin.billingType.edit');

Route::post('/billingType/store/{id}','BillingTypeController@store')->name('financial.admin.billingType.store');

Route::get('/paymentMethod','PaymentMethodController@index')->name('financial.admin.payment.method.index');

Route::get('/paymentMethod/edit/{id}','PaymentMethodController@edit')->name('financial.admin.payment.method.edit');

Route::post('/paymentMethod/store/{id}','PaymentMethodController@store')->name('financial.admin.payment.method.store');

Route::get('/bankAccount','BankAccountController@index')->name('financial.admin.bank.account.index');

Route::get('/bankAccount/edit/{id}','BankAccountController@edit')->name('financial.admin.bank.account.edit');

Route::post('/bankAccount/store/{id}','BankAccountController@store')->name('financial.admin.bank.account.store');

Route::get('/carMachineAccount','CardMachineAccountController@index')->name('financial.admin.card.machine.account.index');

Route::get('/carMachineAccount/edit/{id}','CardMachineAccountController@edit')->name('financial.admin.card.machine.account.edit');

Route::post('/carMachineAccount/store/{id}','CardMachineAccountController@store')->name('financial.admin.card.machine.account.store');

