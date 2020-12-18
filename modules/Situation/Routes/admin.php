<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'SituationController@index')->name('situation.admin.index');
Route::get('/create', 'SituationController@create')->name('situation.admin.create');
Route::get('/edit/{id}', 'SituationController@edit')->name('situation.admin.edit');
Route::post('/store/{id}', 'SituationController@store')->name('situation.admin.store');
Route::post('/bulkEdit', 'SituationController@bulkEdit')->name('situation.admin.bulkEdit');
Route::get('/recovery', 'SituationController@recovery')->name('situation.admin.recovery');

Route::group(['prefix' => 'section'],function () {
    Route::get('/', 'SectionController@index')->name('section.admin.index');
    Route::get('/', 'SectionController@index')->name('section.admin.index');
    Route::get('/create', 'SectionController@create')->name('section.admin.create');
    Route::get('/edit/{id}', 'SectionController@edit')->name('section.admin.edit');
    Route::post('/store/{id}', 'SectionController@store')->name('section.admin.store');
    Route::post('/bulkEdit', 'SectionController@bulkEdit')->name('section.admin.bulkEdit');
    Route::get('/recovery', 'SectionController@recovery')->name('section.admin.recovery');

    Route::get('/get-select','SectionController@getForSelect2')->name('section.admin.ajax_get');
    Route::post('/ajax','SectionController@ajaxStore')->name('section.admin.ajax_store');
});
