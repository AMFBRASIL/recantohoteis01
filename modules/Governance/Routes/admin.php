<?php

use \Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cleaning-checklist'],function () {
    Route::get('/', 'CleaningChecklistController@index')->name('cleaning_checklist.admin.index');
    Route::get('/create', 'CleaningChecklistController@create')->name('cleaning_checklist.admin.create');
    Route::get('/edit/{id}', 'CleaningChecklistController@edit')->name('cleaning_checklist.admin.edit');
    Route::post('/store/{id}', 'CleaningChecklistController@store')->name('cleaning_checklist.admin.store');
    Route::post('/bulkEdit', 'CleaningChecklistController@bulkEdit')->name('cleaning_checklist.admin.bulkEdit');
    Route::get('/recovery', 'CleaningChecklistController@recovery')->name('cleaning_checklist.admin.recovery');
});

Route::group(['prefix' => 'checklist-type'],function () {
    Route::get('/get-select','ChecklistTypeController@getForSelect2')->name('checklist_type.admin.ajax_get');
    Route::post('/ajax','ChecklistTypeController@ajaxStore')->name('checklist_type.admin.ajax_store');
});


