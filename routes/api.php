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

Route::namespace('Api')->group(function(){
	Route::get('resource/{name}','ResourceController@dynamic_resource');
});

Route::namespace('Sales')->prefix('sales')->group(function(){

	Route::prefix('challan')->group(function(){
		Route::get('orders/{customer}', 'SalesChallanController@sales_orders');
		Route::get('delivery-persons', 'SalesChallanController@delivery_persons');
		Route::get('sales-orders-items', 'SalesChallanController@sales_orders_items');
		Route::post('store', 'SalesChallanController@store');

		Route::get('sales-orders-items', 'SalesChallanController@sales_orders_items');
	});

	Route::prefix('invoice')->group(function(){		
		Route::get('sales-challan-items/{sales_challan}', 'SalesInvoiceController@sales_challan_items');
	});

});



// Route::get('get_ci_by_ci_no/{id}', ['as' => 'get_ci_by_ci_no', 'uses' => 'ReceivePurchaseController@getCommercialInvoice']);
