<?php
use \Illuminate\Support\Facades\Route;
Route::get('/','HotelController@index')->name('hotel.admin.index');
Route::get('/create','HotelController@create')->name('hotel.admin.create');
Route::get('/edit/{id}','HotelController@edit')->name('hotel.admin.edit');
Route::post('/store/{id}','HotelController@store')->name('hotel.admin.store');
Route::post('/bulkEdit','HotelController@bulkEdit')->name('hotel.admin.bulkEdit');
Route::get('/recovery','HotelController@recovery')->name('hotel.admin.recovery');

Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('hotel.admin.attribute.index');
    Route::get('edit/{id}','AttributeController@edit')->name('hotel.admin.attribute.edit');
    Route::post('store/{id}','AttributeController@store')->name('hotel.admin.attribute.store');

    Route::get('terms/{id}','AttributeController@terms')->name('hotel.admin.attribute.term.index');
    Route::get('term_edit/{id}','AttributeController@term_edit')->name('hotel.admin.attribute.term.edit');
    Route::get('term_store','AttributeController@term_store')->name('hotel.admin.attribute.term.store');

    Route::get('getForSelect2','AttributeController@getForSelect2')->name('hotel.admin.attribute.term.getForSelect2');
    Route::get('getAttributeForSelect2','AttributeController@getAttributeForSelect2')->name('hotel.admin.attribute.getForSelect2');
});

Route::group(['prefix'=>'building'],function (){
    Route::get('/','BuildingController@index')->name('building.admin.index');
    Route::get('/create','BuildingController@create')->name('building.admin.create');
    Route::get('/edit/{id}','BuildingController@edit')->name('building.admin.edit');
    Route::post('/store/{id}','BuildingController@store')->name('building.admin.store');
    Route::post('/bulkEdit','BuildingController@bulkEdit')->name('building.admin.bulkEdit');
    Route::get('/recovery','BuildingController@recovery')->name('building.admin.recovery');
    Route::get('/findFloorByBuildingID','BuildingController@findFloorByBuildingID')->name('building.admin.findFloorByBuildingID');

    Route::get('/get-select','BuildingController@getForSelect2')->name('building.admin.ajax_get');

    Route::get('/{parent}/floor/get-select','BuildingFloorController@getForSelect2')->name('building_floor.admin.ajax_get');

    Route::get('/{parent}/floor','BuildingFloorController@indexWithParent')->name('building_floor.admin.index');
    Route::get('/{parent}/floor/edit/{id}','BuildingFloorController@editWithParent')->name('building_floor.admin.edit');
    Route::post('/{parent}/floor/store/{id}','BuildingFloorController@storeWithParent')->name('building_floor.admin.store');
    Route::post('/floor/bulkEdit','BuildingFloorController@bulkEdit')->name('building_floor.admin.bulkEdit');
    Route::get('/floor/recovery','BuildingFloorController@recovery')->name('building_floor.admin.recovery');
});

Route::group(['prefix'=>'room'],function (){

    Route::group(['prefix'=>'attribute'],function (){
        Route::get('/','RoomAttributeController@index')->name('hotel.admin.room.attribute.index');
        Route::get('edit/{id}','RoomAttributeController@edit')->name('hotel.admin.room.attribute.edit');
        Route::post('store/{id}','RoomAttributeController@store')->name('hotel.admin.room.attribute.store');
        Route::post('editAttrBulk','RoomAttributeController@editAttrBulk')->name('hotel.admin.room.attribute.editAttrBulk');

        Route::get('terms/{id}','RoomAttributeController@terms')->name('hotel.admin.room.attribute.term.index');
        Route::get('term_edit/{id}','RoomAttributeController@term_edit')->name('hotel.admin.room.attribute.term.edit');
        Route::get('term_store','RoomAttributeController@term_store')->name('hotel.admin.room.attribute.term.store');

        Route::get('getForSelect2','RoomAttributeController@getForSelect2')->name('hotel.admin.room.attribute.term.getForSelect2');
    });

    Route::get('{hotel_id}/index','RoomController@index')->name('hotel.admin.room.index');
    Route::get('{hotel_id}/create','RoomController@create')->name('hotel.admin.room.create');
    Route::get('{hotel_id}/edit/{id}','RoomController@edit')->name('hotel.admin.room.edit');
    Route::post('{hotel_id}/store/{id}','RoomController@store')->name('hotel.admin.room.store');

    Route::post('/bulkEdit','RoomController@bulkEdit')->name('hotel.admin.room.bulkEdit');
});

Route::group(['prefix'=>'{hotel_id}/availability'],function(){
    Route::get('/','AvailabilityController@index')->name('hotel.admin.room.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('hotel.admin.room.availability.loadDates');
    Route::post('/store','AvailabilityController@store')->name('hotel.admin.room.availability.store');
});

