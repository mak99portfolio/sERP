<?php

Route::get('/test', 'TestController@index');
Route::get('/design', 'TestController@design');

Route::namespace('Dev')->prefix('dev')->group(function(){
    Route::resource('access-matrix', 'AccessMatrixController');
});

//Common
Auth::routes();
Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);
Route::get('/get_toaster_notification', ['as' => 'get_toaster_notification', 'uses' => 'HomeController@get_toaster_notification']);
//Core
Route::middleware('auth')->namespace('Core')->prefix('core')->group(function(){
    Route::resource('country', 'CountryController');
    Route::resource('city', 'CityController');
    Route::resource('port', 'PortController');
    Route::resource('product-brand', 'ProductBrandController');
    Route::resource('product-category', 'ProductCategoryController');
    Route::resource('unit-of-measurement', 'UnitOfMeasurementController');
    Route::resource('product', 'ProductController');
    Route::resource('bank', 'BankController');
    Route::resource('enclosure', 'EnclosureController');
    Route::resource('employee-profile', 'EmployeeProfileController');

    Route::get(
        'employee-organizational-info/{organizational_info}',
        'EmployeeProfileController@organizational_info_form'
        )->name('employee-profile.organizational-info');
        Route::put(
            'employee-organizational-info/{organizational_info}',
            'EmployeeProfileController@update_organizational_info'
            )->name('employee-profile.update-organizational-info');
});

//Procurement
Route::middleware('auth')->namespace('Procurement')->prefix('procurement')->group(function(){
    // Foreign
    Route::resource('foreign-requisition', 'ForeignRequisitionController');
    Route::resource('purchase-order', 'PurchaseOrderController');
    Route::resource('proforma-invoice', 'ProformaInvoiceController');
    Route::resource('letter-of-credit', 'LetterOfCreditController');
    Route::resource('cost-sheet', 'CostSheetController');
    Route::resource('insurance-cover-note', 'InsuranceCoverNoteController');
    Route::resource('commercial-invoice', 'CommercialInvoiceController');
    Route::resource('packing-list', 'PackingListController');
    Route::resource('bill-of-lading', 'BillOfLadingController');
    Route::resource('cnf', 'CnfController');
    //Local
    Route::resource('local-requisition', 'LocalRequisitionController');
    Route::resource('local-purchase-order', 'LocalPurchaseOrderController');
    //Procurement Setting
    Route::resource('vendor', 'VendorController');
    Route::resource('vendor-category', 'VendorCategoryController');
    Route::resource('requisition-purpose', 'RequisitionPurposeController');
    Route::resource('cost-particular', 'CostParticularController');
    Route::resource('consignment-particular', 'ConsignmentParticularController');
    //CI Tracking
    Route::get('/commercial-invoice-tracking', ['as' => 'commercial-invoice-tracking.index', 'uses' => 'CommercialInvoiceTrackingController@index']);
    Route::get('/commercial-invoice-tracking/get-ci-with-tracking/{ci_no}', ['as' => 'get-ci-with-tracking', 'uses' => 'CommercialInvoiceTrackingController@getCIWithTracking']);

});

//Inventory
Route::middleware('auth')->namespace('Inventory')->prefix('inventory')->group(function(){
    Route::resource('working-unit', 'WorkingUnitController');
    Route::resource('requisition', 'RequisitionController');
    Route::resource('issue', 'IssueController');

    Route::resource('receive-internal', 'ReceiveInternalController');
    Route::resource('receive-foreign-purchase', 'ReceiveForeignPurchaseController');
    Route::resource('receive-local-purchase', 'ReceiveLocalPurchaseController');
    Route::resource('receive-return', 'ReceiveReturnController');

    Route::resource('status-adjustment', 'StatusAdjustmentController');
    Route::resource('stock-adjustment', 'StockAdjustmentController');
    //Route::resource('item-status', 'ItemStatusController');
    Route::resource('adjustment-purpose', 'AdjustmentPurposeController');
    Route::resource('return-reason', 'ReturnReasonController');
    Route::resource('requisition-type', 'RequisitionTypeController');
    Route::resource('record-type', 'RecordTypeController');
    Route::get('get-product-info/{working_unit}/{slug}', 'RequisitionController@get_product_info');
    Route::get('vue-old-products/{working_unit}', 'RequisitionController@vue_old_products');
});

//Inventory without auth middleware
Route::namespace('Inventory')->prefix('inventory')->group(function(){
    Route::get('get-product-info/{working_unit}/{slug}', 'RequisitionController@get_product_info');
    Route::get('vue-old-products/{working_unit}', 'RequisitionController@vue_old_products');
});

//API
Route::get('/search-product', ['as' => 'search-product', 'uses' => 'ApiController@searchProduct']);
Route::get('/get-product/{id}', ['as' => 'get-product', 'uses' => 'ApiController@getProductByProductId']);
Route::get('/get-foreign-requisition/{id}', ['as' => 'get-foreign-requisition', 'uses' => 'ApiController@getForeignRequisitionByRequisitionId']);
Route::get('/get-local-requisition/{id}', ['as' => 'get-local-requisition', 'uses' => 'ApiController@getLocalRequisitionByRequisitionId']);
Route::get('/get-po/{id}', ['as' => 'get-po', 'uses' => 'ApiController@getPOByPOId']);
Route::get('/get-pi/{id}', ['as' => 'get-pi', 'uses' => 'ApiController@getPiByPiItem']);
Route::get('/get-lc/{id}', ['as' => 'get-lc', 'uses' => 'ApiController@getLcByLcId']);