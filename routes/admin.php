
<?php

Route::view('admin', 'backend.layouts.master')->middleware('authware');

Route::group(['prefix'=>'admin', 'namespace'=>'Backend', 'middleware'=>'authware'], function(){


//Category Route
Route::get('category', 'CategoryController@index');
Route::get('category/create', 'CategoryController@create');
Route::post('category', 'CategoryController@store');
Route::get('unactive_cat/{id}/', 'CategoryController@unactive_cat');
Route::get('active_cat/{id}', 'CategoryController@active_cat');
Route::get('category/{id}/edit', 'CategoryController@edit');
Route::post('category/{id}/edit', 'CategoryController@update');
Route::get('category/{id}/delete', 'CategoryController@destroy');

//User Route
Route::get('user', 'UserController@index');
Route::get('user/create', 'UserController@create');
Route::post('user', 'UserController@store');
Route::get('user/{id}/edit', 'UserController@edit');
Route::post('user/{id}/edit', 'UserController@update');
Route::post('user/{id}/delete', 'UserController@destroy');

//Manufacture Route
Route::get('manufacture', 'ManufactureController@index');
Route::get('manufacture/create', 'ManufactureController@create');
Route::post('manufacture', 'ManufactureController@store');
Route::get('unactive_manufacture/{id}/', 'ManufactureController@unactive_manufacture');
Route::get('active_manufacture/{id}', 'ManufactureController@active_manufacture');
Route::get('manufacture/{id}/edit', 'ManufactureController@edit');
Route::post('manufacture/{id}/edit', 'ManufactureController@update');
Route::get('manufacture/{id}/delete', 'ManufactureController@destroy');

//Product Routes
Route::get('product', 'ProductController@index');
Route::get('unactive_product/{id}/', 'ProductController@unactive_product');
Route::get('active_product/{id}', 'ProductController@active_product');
Route::get('product/create', 'ProductController@create');
Route::post('product', 'ProductController@store');
Route::get('product/{id}/edit', 'ProductController@edit');
Route::post('product/{id}/edit', 'ProductController@update');
Route::get('product/{id}/delete', 'ProductController@destroy');

//Slider Route
Route::get('slider', 'SliderController@index');
Route::get('unactive_slider/{id}/', 'SliderController@unactive_slider');
Route::get('active_slider/{id}/', 'SliderController@active_slider');
Route::get('slider/create', 'SliderController@create');
Route::post('slider', 'SliderController@store');
Route::get('slider/{id}/edit', 'SliderController@edit');

});
