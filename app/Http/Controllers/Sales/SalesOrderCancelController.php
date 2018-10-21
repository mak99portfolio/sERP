<?php

namespace App\Http\Controllers\Sales;

use App\SalesOrderCancel;
use App\SalesOrderCancelReason;
use App\SalesOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class SalesOrderCancelController extends Controller
{
    private $view_root = 'modules/sales/sales_order_cancel/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('sales_order_cancel_list', SalesOrderCancel::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('sales_order_list', SalesOrder::pluck('sales_order_no','id')->prepend('', ''));
        $view->with('sales_order_cancel_reason_list', SalesOrderCancelReason::pluck('name','id')->prepend('', ''));
        return $view;
    }

    public function store(Request $request)
    {
        $request->validate([
            'sales_order_id' => 'required',
            'sales_order_cancel_reason_id' => 'required'
        ]);
        $sales_order_cancel_list = new SalesOrderCancel;
        $sales_order_cancel_list->fill($request->input());
        $sales_order_cancel_list->creator_user_id = Auth::id();
        $sales_order_cancel_list->company_id = 1;
        $sales_order_cancel_list->generate_sales_order_cancel_number();
        $sales_order_cancel_list->save();
        Session::put('alert-success', $sales_order_cancel_list->sales_order_cancel_no . ' created successfully');
        return redirect()->route('sales-order-cancel.index');
    }

    public function show(SalesOrderCancel $salesOrderCancel)
    {
        $view = view($this->view_root . 'show');
        $view->with('salesOrderCancel', $salesOrderCancel);
        return $view;
    }

    public function edit(SalesOrderCancel $salesOrderCancel)
    {
        //
    }

    public function update(Request $request, SalesOrderCancel $salesOrderCancel)
    {
        //
    }

    public function destroy(SalesOrderCancel $salesOrderCancel)
    {
        //
    }
}
