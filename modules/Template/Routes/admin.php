<?php
use Illuminate\Support\Facades\Route;

Route::get('/','TemplateController@index')->name('template.admin.index');

Route::match(['get'],'/create','TemplateController@create')->name('template.admin.create');
Route::match(['get'],'/edit/{id}','TemplateController@edit')->name('template.admin.edit');

Route::post('/store','TemplateController@store')->name('template.admin.store');

Route::get('/getForSelect2','TemplateController@getForSelect2')->name('template.admin.getForSelect2');
Route::get('/getBlocks','TemplateController@getBlocks')->name('template.admin.getBlocks');
Route::post('/bulkEdit','TemplateController@bulkEdit')->name('template.admin.bulkEdit');


//import/export
	Route::match(['get'],'/importTemplate','TemplateController@importTemplate')->name('template.admin.importTemplate');


Route::group(['prefix' => 'content-template'],function () {
    Route::get('/', 'ContentTemplateController@index')->name('content_template.admin.index');
    Route::get('/create', 'ContentTemplateController@create')->name('content_template.admin.create');
    Route::get('/edit/{id}', 'ContentTemplateController@edit')->name('content_template.admin.edit');
    Route::post('/store/{id}', 'ContentTemplateController@store')->name('content_template.admin.store');
    Route::post('/bulkEdit', 'ContentTemplateController@bulkEdit')->name('content_template.admin.bulkEdit');
    Route::get('/recovery', 'ContentTemplateController@recovery')->name('content_template.admin.recovery');
});
