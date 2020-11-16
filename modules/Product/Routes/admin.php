<?php

use \Illuminate\Support\Facades\Route;

Route::get('/load-view',function() {
    return View::make(request()->get('view'))->render();
});

Route::get('/','ProductController@index')->name('product.admin.index');
Route::get('/create','ProductController@create')->name('product.admin.create');
Route::get('/edit/{id}','ProductController@edit')->name('product.admin.edit');
Route::post('/store/{id}','ProductController@store')->name('product.admin.store');
Route::post('/bulkEdit','ProductController@bulkEdit')->name('product.admin.bulkEdit');
Route::get('/recovery','ProductController@recovery')->name('product.admin.recovery');

Route::get('/product-category','ProductCategoryController@index')->name('product_category.admin.index');
Route::get('/product-category/create','ProductCategoryController@create')->name('product_category.admin.create');
Route::get('/product-category/edit/{id}','ProductCategoryController@edit')->name('product_category.admin.edit');
Route::post('/product-category/store/{id}','ProductCategoryController@store')->name('product_category.admin.store');
Route::post('/product-category/bulkEdit','ProductCategoryController@bulkEdit')->name('product_category.admin.bulkEdit');
Route::get('/product-category/recovery','ProductCategoryController@recovery')->name('product_category.admin.recovery');

// Ajax
Route::get('/get-select','ProductController@getForSelect2')->name('product.admin.ajax_get');
// Unidade
Route::get('/product_unity/get-select','ProductUnityController@getForSelect2')->name('product_unity.admin.ajax_get');
Route::post('/product_unity/ajax','ProductUnityController@ajaxStore')->name('product_unity.admin.ajax_store');
// Categoria
Route::get('/product_category/get-select','ProductCategoryController@getForSelect2')->name('product_category.admin.ajax_get');
Route::post('/product_category/ajax','ProductCategoryController@ajaxStore')->name('product_category.admin.ajax_store');
// Sub Categoria
Route::get('/product_subcategory/get-select','ProductSubCategoryController@getForSelect2')->name('product_subcategory.admin.ajax_get');
Route::post('/product_subcategory/ajax','ProductSubCategoryController@ajaxStore')->name('product_subcategory.admin.ajax_store');
// PIS
Route::get('/product_pis/get-select','ProductPISController@getForSelect2')->name('product_pis.admin.ajax_get');
Route::post('/product_pis/ajax','ProductPISController@ajaxStore')->name('product_pis.admin.ajax_store');
// COFINS
Route::get('/product_cofins/get-select','ProductCOFINSController@getForSelect2')->name('product_cofins.admin.ajax_get');
Route::post('/product_cofins/ajax','ProductCOFINSController@ajaxStore')->name('product_cofins.admin.ajax_store');
// IPI
Route::get('/product_ipi/get-select','ProductIPIController@getForSelect2')->name('product_ipi.admin.ajax_get');
Route::post('/product_ipi/ajax','ProductIPIController@ajaxStore')->name('product_ipi.admin.ajax_store');
// NCM
Route::get('/ncm/get-select','NCMController@getForSelect2')->name('ncm.admin.ajax_get');
// CEST
Route::get('/cest/get-select','CESTController@getForSelect2')->name('cest.admin.ajax_get');
// CFOP
Route::get('/cfop/get-select','CFOPController@getForSelect2')->name('cfop.admin.ajax_get');
