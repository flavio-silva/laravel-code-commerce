<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::pattern('id', '\d+');

Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'categories'], function() {
        Route::get('', ['as' => 'categories.index', 'uses' => 'AdminCategoriesController@index']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::get('{id}', ['as' => 'categories.show', 'uses' => 'AdminCategoriesController@show']);
        Route::get('edit/{id}', ['as' => 'categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::post('', ['as' => 'categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::put('{id}', ['as' => 'categories.update', 'uses' => 'AdminCategoriesController@update']);
        Route::delete('{id}', ['as' => 'categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
    });

    Route::group(['prefix' => 'products'], function() {
        Route::get('', ['as' => 'products.index', 'uses' => 'AdminProductsController@index']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'AdminProductsController@create']);
        Route::get('{id}', ['as' => 'products.show', 'uses' => 'AdminProductsController@show']);
        Route::get('edit/{id}', ['as' => 'products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::post('', ['as' => 'products.store', 'uses' => 'AdminProductsController@store']);
        Route::put('{id}', ['as' => 'products.update', 'uses' => 'AdminProductsController@update']);
        Route::delete('{id}', ['as' => 'products.destroy', 'uses' => 'AdminProductsController@destroy']);
    });
});

Route::group(['prefix' => 'category'], function () {
   Route::get('', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
    Route::get('create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);
    Route::post('', ['as' => 'category.store', 'uses' => 'CategoryController@store']);
    Route::get('{id}/destroy', ['as' => 'category.destroy', 'uses' => 'CategoryController@destroy']);
    Route::get('{id}/edit', ['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
    Route::put('{id}/update', ['as' => 'category.update', 'uses' => 'CategoryController@update']);

});

Route::group(['prefix' => 'product'], function () {
    Route::get('', ['as' => 'product.index', 'uses' => 'ProductController@index']);
    Route::get('create', ['as' => 'product.create', 'uses' => 'ProductController@create']);
    Route::post('', ['as' => 'product.store', 'uses' => 'ProductController@store']);
    Route::get('{id}/destroy', ['as' => 'product.destroy', 'uses' => 'ProductController@destroy']);
    Route::get('{id}/edit', ['as' => 'product.edit', 'uses' => 'ProductController@edit']);
    Route::put('{id}/update', ['as' => 'product.update', 'uses' => 'ProductController@update']);

});