<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//Procurement
Route::resource('purchase-requisition', 'PurchaseRequisitionController');
Route::resource('purchase-order', 'PurchaseOrderController');
Route::resource('proforma-invoice', 'ProformaInvoiceController');
Route::resource('letter-of-credit', 'LetterOfCreditController');
Route::resource('cost-sheet', 'CostSheetController');
Route::resource('insurance-cover-note', 'InsuranceCoverNoteController');
Route::resource('commercial-invoice', 'CommercialInvoiceController');
Route::resource('packing-list', 'PackingListController');
Route::resource('bill-of-lading', 'BillOfLadingController');
Route::resource('cnf', 'CnfController');

//Inventory
Route::resource('working-unit', 'WorkingUnitController');

Route::get('/test', 'TestController@index');



Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);


Route::namespace('Core')->prefix('core')->group(function(){

    Route::get('cities', 'CityController@index')->name('core.cities');

});

Route::namespace('Procurement')->prefix('procurement')->group(function(){

    Route::get('packing-list', 'PackingController@index')->name('procurement.packing_list');

});
