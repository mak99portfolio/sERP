<?php

Route::get('/test', 'TestController@index');
Route::get('/design', 'TestController@design');

Route::namespace('Dev')->prefix('dev')->group(function(){

});

//Common
Auth::routes();
Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index'])->prefix('home')->middleware('auth');
Route::get('/get_toaster_notification', ['as' => 'get_toaster_notification', 'uses' => 'HomeController@get_toaster_notification']);

//Core
Route::middleware('auth')->namespace('Core')->prefix('core')->group(function(){
    Route::resource('working-unit', 'WorkingUnitController');
    Route::resource('country', 'CountryController');
    Route::resource('division', 'DivisionController');
    Route::resource('district', 'DistrictController');
    Route::resource('city', 'CityController');
    Route::resource('port', 'PortController');
    Route::resource('product-brand', 'ProductBrandController');
    Route::resource('product-category', 'ProductCategoryController');
    Route::resource('unit-of-measurement', 'UnitOfMeasurementController');
    Route::resource('product-model', 'ProductModelController');
    Route::resource('product-size', 'ProductSizeController');
    Route::resource('product', 'ProductController');
    Route::resource('bank', 'BankController');
    Route::resource('enclosure', 'EnclosureController');
    Route::resource('employee-profile', 'EmployeeProfileController');
    Route::resource('payment-type', 'PaymentTypeController');
    Route::resource('terms-and-condition-type', 'TermsAndConditionTypeController');

    Route::get(
        'employee-organizational-info/{organizational_info}', 'EmployeeProfileController@organizational_info_form'
    )->name('employee-profile.organizational-info');

    Route::put(
        'employee-organizational-info/{organizational_info}', 'EmployeeProfileController@update_organizational_info'
    )->name('employee-profile.update-organizational-info');

    Route::resource('employee-user', 'EmployeeUserController');
    Route::get('country-detail', 'CountryController@country_detail');
    Route::resource('designation', 'DesignationController');

});

//Core related API without auth middleware
Route::namespace('Core')->prefix('core')->group(function(){

    Route::get('country-detail', 'CountryController@country_detail');

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
    Route::resource('foreign-payment', 'ForeignPaymentController');
    //Local
    Route::resource('local-requisition', 'LocalRequisitionController');
    Route::resource('local-purchase-order', 'LocalPurchaseOrderController');
    Route::resource('quotation', 'QuotationController');
    Route::resource('quotation-compare', 'QuotationCompareController');
    //Procurement Setting
    Route::resource('vendor', 'VendorController');
    Route::resource('vendor-category', 'VendorCategoryController');
    Route::resource('requisition-purpose', 'RequisitionPurposeController');
    Route::resource('cost-particular', 'CostParticularController');
    Route::resource('consignment-particular', 'ConsignmentParticularController');
    Route::resource('move-type', 'MoveTypeController');
    Route::resource('modes-of-transport', 'ModesOfTransportController');

    //CI Tracking
    Route::get('/commercial-invoice-tracking', ['as' => 'commercial-invoice-tracking.index', 'uses' => 'CommercialInvoiceTrackingController@index']);
    Route::get('/commercial-invoice-tracking/create', ['as' => 'get-ci-with-tracking', 'uses' => 'CommercialInvoiceTrackingController@getCIWithTracking']);
    Route::post('/commercial-invoice-tracking/save-tracking_date', ['as' => 'save-tracking-date', 'uses' => 'CommercialInvoiceTrackingController@saveDate']);

});

//Sales
Route::middleware('auth')->namespace('Sales')->prefix('sales')->group(function(){
    Route::resource('sales-order', 'SalesOrderController');
    Route::resource('sales-order-cancel', 'SalesOrderCancelController');
    Route::resource('sales-challan', 'SalesChallanController');
    Route::resource('sales-invoice', 'SalesInvoiceController');
    Route::resource('sales-invoice-cancel', 'SalesInvoiceCancelController');
    Route::resource('collection-schedule', 'CollectionScheduleController');
    Route::resource('payment-schedule', 'PaymentScheduleController');
    // Setting
    Route::resource('customer', 'CustomerController');
    Route::resource('customer-zone', 'CustomerZoneController');
    Route::resource('rule-setup', 'RuleSetupController');
    Route::resource('credit-rule', 'CreditRuleController');
    Route::resource('discount-customer-wise', 'DiscountCustomerWiseController');
    Route::resource('discount-generic', 'DiscountGenericController');
    Route::resource('free-bonus-customer-wise', 'FreeBonusCustomerWiseController');
    Route::resource('free-bonus-generic', 'FreeBonusGenericController');

});

//Accounts
Route::middleware('auth')->namespace('Accounts')->prefix('accounts')->group(function(){
    Route::resource('product-costing', 'ProductCostingController');
});

//Company
Route::middleware('auth')->namespace('Company')->prefix('company')->group(function(){
    Route::resource('company-profile', 'CompanyProfileController');
    Route::resource('company-bank', 'CompanyBankController');
    Route::resource('company-license', 'CompanyLicenseController');
    Route::resource('notification', 'NotificationController');
    Route::resource('department', 'DepartmentController');
    Route::resource('own-vehicle', 'OwnVehicleController');
});

//Inventory
Route::middleware(['auth', 'hasPermission:access_to_inventory', 'hasWorkingUnit'])->namespace('Inventory')->prefix('inventory')->group(function(){

    Route::resource('requisition', 'RequisitionController');
    Route::get('incoming/requisition', 'RequisitionController@incoming')->name('requisition.incoming');
    Route::get('incoming/requisition/{inventory_issue_request}', 'RequisitionController@show_incoming')->name('requisition.show_incoming');
    Route::resource('issue', 'IssueController');

    Route::resource('receive', 'ReceiveController');
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
    Route::resource('stock-report', 'StockReportController');
    Route::resource('safety-stock', 'SafetyStockController');

});

Route::middleware(['auth'])->namespace('Inventory')->prefix('inventory')->group(function(){

    Route::resource('stock-report', 'StockReportController');

});

//Inventory Related API without auth middleware
Route::namespace('Inventory')->prefix('inventory')->group(function(){

    Route::get('get-product-info/{working_unit}/{product_status}/{product_type}/{slug}', 'RequisitionController@get_product_info');
    Route::get('get-product-info-for-adjustment/{working_unit}/{slug}', 'RequisitionController@get_product_info_for_adjustment');
    Route::get('vue-old-products/{working_unit}/{product_status}/{product_type}', 'RequisitionController@vue_old_products');
    Route::get('get-batch-stock/{working_unit}/{product_status}/{product_type}/{product}/{slug}', 'RequisitionController@get_batch_stock');

    //routes for receive product info
    Route::prefix('api')->group(function(){

        Route::get('vue-old-products', 'ReceiveController@vue_old_products');
        Route::get('vue-old-inputs', 'ReceiveController@vue_old_inputs');
        Route::get('get-product-info/{slug}', 'ReceiveController@get_product_info');
        Route::get('get-commercial-invoice/{slug}', 'ReceiveController@get_commercial_invoice');
        Route::get('get-purchase-order/{slug}', 'ReceiveController@get_purchase_order');
        Route::get('get-inventory-requisition/{working_unit}/{slug}', 'ReceiveController@get_inventory_requisition');
        Route::get('get-product-statuses', 'ReceiveController@product_statuses');
        Route::get('get-issue-return/{working_unit}/{slug}', 'ReceiveController@get_issue_return');

        //route for status adjustment
        Route::get('product-info-for-adjusment/{working_unit}/{selected_type}/{selected_status}/{slug}', 'StatusAdjustmentController@product_info_for_adjusment');
        Route::get('fetch-requisition/{requested_working_unit}/{slug}', 'IssueController@fetch_requisition');
        Route::get('get-batch-stock/{working_unit}/{product}/{inventory_requisition_no}/{slug}', 'IssueController@get_batch_stock');

        //route to fetch safety stock
        Route::get('fetch-safety-stock/{working_unit}/{product}', 'SafetyStockController@fetch_safety_stock');

    });

});

//Report
Route::middleware('auth')->namespace('Report')->prefix('report')->group(function(){
    Route::get('/foreign-purchase-order', ['as' => 'report-foreign-purchase-order', 'uses' => 'ProcurementReportController@foreign_purchase_order']);
    Route::get('/proforma-invoice', ['as' => 'report-proforma-invoice', 'uses' => 'ProcurementReportController@proforma_invoice']);
    Route::get('/commercial-invoice', ['as' => 'report-commercial-invoice', 'uses' => 'ProcurementReportController@commercial_invoice']);
});

//API

Route::get('/search-product', ['as' => 'search-product', 'uses' => 'ApiController@searchProduct']);
Route::get('/get-product/{id}', ['as' => 'get-product', 'uses' => 'ApiController@getProductByProductId']);
Route::get('/get-foreign-requisition/{ids}', ['as' => 'get-foreign-requisition', 'uses' => 'ApiController@getForeignRequisitionByRequisitionIds']);
Route::get('/get-local-requisition/{ids}', ['as' => 'get-local-requisition', 'uses' => 'ApiController@getLocalRequisitionByRequisitionIds']);
Route::get('/get-po/{ids}', ['as' => 'get-po', 'uses' => 'ApiController@getPOByPOIds']);
Route::get('/get-pi/{id}', ['as' => 'get-pi', 'uses' => 'ApiController@getPiByPiItem']);
Route::get('/get-lc/{id}', ['as' => 'get-lc', 'uses' => 'ApiController@getLcByLcId']);
Route::get('/get-all-product/{product_group_id}', ['as' => 'get-all-product', 'uses' => 'ApiController@getAllProduct']);
Route::get('/get-ci/{id}', ['as' => 'get-ci', 'uses' => 'ApiController@getCiByCiId']);
Route::get('/get-all-by-bl-no/{bl_no}', ['as' => 'get-all-by-bl-no', 'uses' => 'ApiController@getAllByBlNo']);
Route::get('/get-bl-by-bl-id/{id}', ['as' => 'get-bl-by-bl-id', 'uses' => 'ApiController@getBlByBlId']);
Route::get('/get-bank-info/{id}', ['as' => 'get-bank-info', 'uses' => 'ApiController@getBankInfoById']);
Route::get('/get-vendor-bank-info/{id}', ['as' => 'get-vendor-bank-info', 'uses' => 'ApiController@getVendorBankInfoById']);
Route::get('/get-due-amount/{id}/{no}', ['as' => 'et-due-amount', 'uses' => 'ApiController@getDueAmount']);
Route::get('/get-lc-to-ci-list/{id}', ['as' => 'get-lc-to-ci-list', 'uses' => 'ApiController@getLcToCiList']);
Route::get('/get-ci-by-ci-ids/{ids}', ['as' => 'get-ci-by-ci-ids', 'uses' => 'ApiController@getCIByCIIds']);
Route::get('/get-requisition-items-by-requisition-id/{id}', ['as' => 'get-requisition-items-by-requisition-id', 'uses' => 'ApiController@getRequisitionItemsForQuotationByLocalRequisitionId']);
Route::get('/get-vendor-wise-po/{id}', ['as' => 'get-vendor-wise-po', 'uses' => 'ApiController@getVendorWisePo']);
// Sales
Route::get('/get-all-employee-by-designation/{id}', ['as' => 'get-all-employee-by-designation', 'uses' => 'ApiController@getEmployeeByDesignation']);
Route::get('/get-product-for-sales-order/{id}', ['as' => 'get-product-for-sales-order', 'uses' => 'ApiController@getProductForSalesOrder']);
Route::get('/get-product-bonus/{id}', ['as' => 'get-product-bonus', 'uses' => 'ApiController@getBonusByProduct']);


//ACL (Access Control Limit)
Route::middleware(['auth', 'hasPermission:access_to_acl'])
->namespace('AccessControl')
->prefix('access-control')
->group(function(){

    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('matrix', 'AclController');
    Route::get('role-user-matrix', 'AclController@role_user_matrix')->name('role-user-matrix');
    Route::post('role-user-matrix', 'AclController@store_role_user_matrix')->name('role-user-matrix.store');
    Route::get('user-permission-matrix', 'AclController@user_permission_matrix')->name('user-permission-matrix');
    Route::post('user-permission-matrix', 'AclController@store_user_permission_matrix')->name('user-permission-matrix.store');
    Route::resource('user', 'UserController');

});
