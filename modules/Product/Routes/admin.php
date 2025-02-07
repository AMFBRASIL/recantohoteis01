<?php

use \Illuminate\Support\Facades\Route;

Route::get('/load-view',function() {
    return View::make(request()->get('view'))->render();
});

Route::get('/','ProductController@index')->name('product.admin.index');
Route::get('/get-product-composition/{id}','ProductController@getComposition')->name('product.admin.get_composition');
Route::get('/create','ProductController@create')->name('product.admin.create');
Route::get('/edit/{id}','ProductController@edit')->name('product.admin.edit');
Route::post('/store/{id}','ProductController@store')->name('product.admin.store');
Route::post('/bulkEdit','ProductController@bulkEdit')->name('product.admin.bulkEdit');
Route::get('/recovery','ProductController@recovery')->name('product.admin.recovery');

Route::get('/product-category/create','ProductCategoryController@create')->name('product_category.admin.create');
Route::get('/product-category/edit/{id}','ProductCategoryController@edit')->name('product_category.admin.edit');
Route::post('/product-category/store/{id}','ProductCategoryController@store')->name('product_category.admin.store');
Route::post('/product-category/bulkEdit','ProductCategoryController@bulkEdit')->name('product_category.admin.bulkEdit');
Route::get('/product-category/recovery','ProductCategoryController@recovery')->name('product_category.admin.recovery');

Route::get('/product-category/{id}/subcategory/create','ProductSubCategoryController@create')->name('product_subcategory.admin.create');
Route::get('/product-category/{id}/subcategory/edit/{sub}','ProductSubCategoryController@edit')->name('product_subcategory.admin.edit');
Route::post('/product-category/{id}/subcategory/store/{sub}','ProductSubCategoryController@store')->name('product_subcategory.admin.store');
Route::post('/product-category/{id}/subcategory/bulkEdit','ProductSubCategoryController@bulkEdit')->name('product_subcategory.admin.bulkEdit');

Route::get('/product-unity','ProductUnityController@index')->name('product_unity.admin.index');
Route::get('/product-unity/create','ProductUnityController@create')->name('product_unity.admin.create');
Route::get('/product-unity/edit/{id}','ProductUnityController@edit')->name('product_unity.admin.edit');
Route::post('/product-unity/store/{id}','ProductUnityController@store')->name('product_unity.admin.store');
Route::post('/product-unity/bulkEdit','ProductUnityController@bulkEdit')->name('product_unity.admin.bulkEdit');
Route::get('/product-unity/recovery','ProductUnityController@recovery')->name('product_unity.admin.recovery');

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
Route::get('/cest/get-select','CestController@getForSelect2')->name('cest.admin.ajax_get');
// CFOP
Route::get('/cfop/get-select','CFOPController@getForSelect2')->name('cfop.admin.ajax_get');
