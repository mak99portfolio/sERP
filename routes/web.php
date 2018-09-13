<?php

Route::get('/test', 'TestController@index');

Route::namespace('Dev')->prefix('dev')->group(function(){
    Route::resource('access-matrix', 'AccessMatrixController');
});

//Common
Auth::routes();
Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);

//Core
Route::namespace('Core')->prefix('core')->group(function(){
    Route::get('cities', 'CityController@index')->name('core.cities');
    Route::resource('country', 'CountryController');
    Route::resource('unit-of-measurement', 'UnitOfMeasurementController');
});

//Procurement
Route::namespace('Procurement')->prefix('procurement')->group(function(){
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
    //Procurement Setting
    Route::resource('vendor', 'VendorController');
    Route::resource('vendor-category', 'VendorCategoryController');

});

//Inventory
Route::namespace('Inventory')->prefix('inventory')->group(function(){
    Route::resource('working-unit', 'WorkingUnitController');
});