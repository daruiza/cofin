<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
    Route::post('signup', 'Auth\AuthController@signup')->name('signup');    

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');    
    });
});

Route::group(['prefix' => 'commerce'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CommerceController@index');
        Route::get('show/{id}', 'Api\CommerceController@show');
        Route::post('store', 'Api\CommerceController@store');
    });
});

Route::group(['prefix' => 'customer'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CustomerController@index');
        Route::get('show/{id}', 'Api\CustomerController@show');
        Route::post('store', 'Api\CustomerController@store');
    });
});

Route::group(['prefix' => 'invoice'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\InvoiceController@index');
        Route::get('show/{id}', 'Api\InvoiceController@show');
        Route::post('store', 'Api\InvoiceController@store');
    });
});