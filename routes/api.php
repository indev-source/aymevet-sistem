<?php

use Illuminate\Http\Request;

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
Route::group(['prefix'=>'v1','namespace'=>'Api\V1'],function(){
    Route::get('products/{business_id}','ProductController@index');
    Route::get('customers/{seller_id}','CustomerController@index');
    Route::get('products/{empleado?}','ProductController@productsSyncServer');
});

Route::put('sincronizacion/{email}','SalesController@sincronizar');
