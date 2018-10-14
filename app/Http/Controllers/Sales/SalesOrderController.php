<?php

namespace App\Http\Controllers\Sales;

use App\SalesOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return $view;
    }

    public function store(Request $request)
    {
        //
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
