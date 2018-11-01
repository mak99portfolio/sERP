<?php
namespace App\Http\Controllers\Sales;
use App\Http\Controllers\Controller;
use App\SalesOrderReturn;
use Illuminate\Http\Request;

class SalesOrderReturnController extends Controller
{
    private $view_root = 'modules/sales/sales_order_return/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        // $view->with('sales_order_list', SalesOrder::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        // $view->with('sales_order_list', SalesOrder::all());
        return $view;
    }

    public function store(Request $request)
    {
        //
    }

    public function show(SalesOrderReturn $salesOrderReturn)
    {
        //
    }
    public function edit(SalesOrderReturn $salesOrderReturn)
    {
        //
    }

    public function update(Request $request, SalesOrderReturn $salesOrderReturn)
    {
        //
    }

    public function destroy(SalesOrderReturn $salesOrderReturn)
    {
        //
    }
}
