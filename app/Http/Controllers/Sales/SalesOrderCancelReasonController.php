<?php

namespace App\Http\Controllers\Sales;

use App\SalesOrderCancelReason;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class SalesOrderCancelReasonController extends Controller
{
    private $view_root = 'modules/sales/setting/sales_order_cancel_reason/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('sales_order_cancel_reason_list', SalesOrderCancelReason::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        return $view;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sales_order_cancel_reasons',
            'description' => 'required',
        ]);
        $sales_order_cancel_reason_list = new SalesOrderCancelReason;
        $sales_order_cancel_reason_list->fill($request->input());
        $sales_order_cancel_reason_list->creator_user_id = Auth::id();
        $sales_order_cancel_reason_list->save();
        Session::put('alert-success', $sales_order_cancel_reason_list->name . ' created successfully');
        return redirect()->route('sales-order-cancel-reason.index');
    }

    public function show(SalesOrderCancelReason $salesOrderCancelReason)
    {
        //
    }

    public function edit(SalesOrderCancelReason $salesOrderCancelReason)
    {
        //
    }

    public function update(Request $request, SalesOrderCancelReason $salesOrderCancelReason)
    {
        //
    }

    public function destroy(SalesOrderCancelReason $salesOrderCancelReason)
    {
        //
    }
}
