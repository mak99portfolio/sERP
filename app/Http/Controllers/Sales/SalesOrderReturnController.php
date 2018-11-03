<?php
namespace App\Http\Controllers\Sales;

use App\EmployeeProfile;
use App\Http\Controllers\Controller;
use App\SalesOrder;
use App\SalesOrderReturn;
use App\SalesReturnReason;
use App\SalesOrderReturnItem;
use Auth;
use Illuminate\Http\Request;
use Session;

class SalesOrderReturnController extends Controller
{
    private $view_root = 'modules/sales/sales_order_return/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('sales_order_return_list', SalesOrderReturn::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('sales_order_list', SalesOrder::pluck('sales_order_no', 'id')->prepend('', ''));
        $view->with('sales_return_reason_list', SalesReturnReason::pluck('reason', 'id')->prepend('', ''));
        $view->with('employee_list', EmployeeProfile::pluck('name', 'id')->prepend('', ''));
        return $view;
    }

    public function store(Request $request)
    {
        // dd($request->input());
        $sales_return = new SalesOrderReturn;
        $sales_return->fill($request->input());
        $sales_return->creator_user_id = Auth::id();
        $sales_return->save();

        // items
        $items = array();
        foreach ($request->items as $item) {
            array_push($items, new SalesOrderReturnItem($item));
        }
        $sales_return->items()->saveMany($items);

        Session::put('alert-success', 'Sales Order return successfully.');
        return redirect()->route('sales-order-return.index');
    }

    public function show(SalesOrderReturn $salesOrderReturn)
    {
        $view = view($this->view_root . 'show');
        $view->with('sales_order_return', $salesOrderReturn);
        return $view;
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
