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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->prefix('resource')->group(function(){
	Route::get('customers', 'ResourceController@customers');
	Route::get('mushak-numbers', 'ResourceController@mushak_numbers');
});

Route::prefix('sales-challan')->group(function(){
	Route::get('sales-orders/{customer}', 'SalesChallanController@sales_orders');
});



// Route::get('get_ci_by_ci_no/{id}', ['as' => 'get_ci_by_ci_no', 'uses' => 'ReceivePurchaseController@getCommercialInvoice']);
