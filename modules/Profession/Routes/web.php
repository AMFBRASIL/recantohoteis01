<?php

use Illuminate\Support\Facades\Route;

Route::get('profession/{slug?}', 'ProfessionController@detail')->name('profession.detail');// Detail
