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

Route::group(['prefix' => 'admin', 'where' => ['id' => '\d+']], function() {
    Route::group(['prefix' => 'categories'], function () {
        Route::get('', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
        Route::post('', ['as' => 'category.store', 'uses' => 'CategoryController@store']);
        Route::get('create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);
        Route::get('{id}/destroy', ['as' => 'category.destroy', 'uses' => 'CategoryController@destroy']);
        Route::get('{id}/edit', ['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
        Route::put('{id}/update', ['as' => 'category.update', 'uses' => 'CategoryController@update']);

    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('', ['as' => 'product.index', 'uses' => 'ProductController@index']);
        Route::post('', ['as' => 'product.store', 'uses' => 'ProductController@store']);
        Route::get('create', ['as' => 'product.create', 'uses' => 'ProductController@create']);
        Route::get('{id}/destroy', ['as' => 'product.destroy', 'uses' => 'ProductController@destroy']);
        Route::get('{id}/edit', ['as' => 'product.edit', 'uses' => 'ProductController@edit']);
        Route::put('{id}/update', ['as' => 'product.update', 'uses' => 'ProductController@update']);

    });
});

