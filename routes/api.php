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
        Route::post('store', 'Api\CommerceController@store');
    });
    Route::get('show', 'Api\CommerceController@show');
});

Route::group(['prefix' => 'customer'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CustomerController@index');
        Route::get('show', 'Api\CustomerController@show');
        Route::post('store', 'Api\CustomerController@store');
    });
    Route::get('showbycommerce', 'Api\CustomerController@showByCommerce');
    Route::get('documenttypes', 'Api\CustomerController@documentTypes');
    Route::get('persontypes', 'Api\CustomerController@personTypes');
});

Route::group(['prefix' => 'invoice'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\InvoiceController@index');
        Route::get('show/{id}', 'Api\InvoiceController@show');
        Route::post('store', 'Api\InvoiceController@store');
    });
});

Route::group(['prefix' => 'payupayment'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
    });
    Route::get('index', 'Api\PayuPaymentController@index');
    Route::get('banklist', 'Api\PayuPaymentController@bankList');
});

Route::group(['prefix' => 'epaycopayment'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
    });
    Route::get('index', 'Api\EPaycoPaymentController@index');
    Route::get('banklist/{id}', 'Api\EPaycoPaymentController@bankList');
    Route::post('store/{id}', 'Api\EPaycoPaymentController@store');
    Route::get('show/{commerceId}/{invoiceId}', 'Api\EPaycoPaymentController@show');
    Route::post('epayco-pse-bank-confirmation', 'Api\EPaycoPaymentController@confirmationPost');
    Route::get('epayco-pse-bank-confirmation/
    {x_cust_id_cliente}/
    {x_ref_payco}/
    {x_id_factura}/
    {x_id_invoice}/
    {x_description}/
    {x_amount}/
    {x_amount_country}/
    {x_amount_ok}/
    {x_tax}/
    {x_amount_base}/
    {x_currency_code}/
    {x_bank_name}/
    {x_cardnumber}/
    {x_quotas}/
    {x_respuesta}/
    {x_response}/
    {x_approval_code}/
    {x_transaction_id}/
    {x_fecha_transaccion}/
    {x_transaction_date}/
    {x_cod_respuesta}/
    {x_cod_response}/
    {x_response_reason_text}/
    {x_errorcode}/
    {x_cod_transaction_state}/
    {x_transaction_state}/
    {x_franchise}/
    {x_business}/
    {x_customer_doctype}/
    {x_customer_document}/
    {x_customer_name}/
    {x_customer_lastname}/
    {x_customer_email}/
    {x_customer_phone}/
    {x_customer_movil}/
    {x_customer_ind_pais}/
    {x_customer_country}/
    {x_customer_city}/
    {x_customer_address}/
    {x_customer_ip}/
    {x_signature}/
    {x_test_request}/
    {x_extra1}/
    {x_extra2}/
    {x_extra3}/
    {x_extra4}/
    {x_extra5}/
    {x_extra6}/
    {x_extra7}/
    {x_extra8}/
    {x_extra9}/
    {x_extra10}/
    ', 'Api\EPaycoPaymentController@confirmationGet');
});


Route::get('/{commerce}', 'Api\CommerceController@display');
