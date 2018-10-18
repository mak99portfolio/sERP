<?php

namespace App\Http\Controllers\Sales;

use App\SalesOrder;
use App\ProductCategory;
use App\Currency;
use App\Designation;
use App\Customer;
use App\TermsAndConditionType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class SalesOrderController extends Controller
{
    private $view_root = 'modules/sales/sales_order/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        // $view->with('requisition_purpose_list', RequisitionPurpose::pluck('name', 'id')->prepend('--select purpose--',''));
        $view->with('designations_list', Designation::pluck('name', 'id')->prepend('',''));
        $view->with('currency_list', Currency::pluck('name', 'id')->prepend('',''));
        $view->with('customer_list', Customer::pluck('name', 'id')->prepend('',''));
        $view->with('terms_conditions_type_list', TermsAndConditionType::all());
        $view->with('product_group', ProductCategory::all());
        return $view;
    }

    public function store(Request $request)
    {
        // dd($request->input());


        $sales_order = new SalesOrder;
        $sales_order->fill($request->input());
        $sales_order->creator_user_id = Auth::id();
        $sales_order->generateSalesOrderNumber();
        $sales_order->save();
        Session::put('alert-success', 'Requisition created successfully. <br><strong>Requisition No: ' . $requisition->requisition_no . '</strong>');
        return redirect()->route('sales-order.index');
    }

    public function show(SalesOrder $salesOrder)
    {
        //
    }

    public function edit(SalesOrder $salesOrder)
    {
        //
    }

    public function update(Request $request, SalesOrder $salesOrder)
    {
        //
    }

    public function destroy(SalesOrder $salesOrder)
    {
        //
    }
}
