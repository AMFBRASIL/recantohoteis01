<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => config('financial.financial_route_prefix')], function () {
    Route::get('/{slug?}', 'BillingTypeController@detail')->name('financial.billingType.detail');// Detail
    Route::get('paymentMethod/{slug?}', 'PaymentMethodController@detail')->name('financial.payment.method.detail');// Detail
    Route::get('bankAccount/{slug?}', 'BankAccountController@detail')->name('financial.bank.account.detail');// Detail
    Route::get('carMachineAccount/{slug?}', 'CardMachineAccountController@detail')->name('financial.card.machine.account.detail');// Detail
    Route::get('costCenter/{slug?}', 'CostCenterController@detail')->name('financial.cost.center.detail');// Detail
    Route::get('revenue/{slug?}', 'RevenueController@detail')->name('financial.revenue.detail');// Detail
});
