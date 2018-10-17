<?php

namespace App\Http\Controllers\Sales;

use App\SalesOrder;
use App\ProductCategory;
use App\TermsAndConditionType;
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
        // $view->with('requisition_purpose_list', RequisitionPurpose::pluck('name', 'id')->prepend('--select purpose--',''));
        // $view->with('requisition_priority_list', RequisitionPriority::pluck('name', 'id')->prepend('--select priority--',''));
        $view->with('terms_conditions_type_list', TermsAndConditionType::all());
        $view->with('product_group', ProductCategory::all());
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
