<?php

namespace App\Http\Controllers\Accounts;

use App\ProductCosting;
use App\BillOfLading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class ProductCostingController extends Controller
{
    private $view_root = 'modules/accounts/product_costing/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('bill_of_lading_list', BillOfLading::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        // $view->with('bank_list', CompanyBank::all());
        return $view;
    }

    public function store(Request $request)
    {
        //
    }

    public function show(BillOfLading $billOfLading)
    {
        $view = view($this->view_root . 'show');
        $view->with('billOfLading', $billOfLading);
        return $view;
    }

    public function edit(ProductCosting $productCosting)
    {
        //
    }

    public function update(Request $request, ProductCosting $productCosting)
    {
        //
    }

    public function destroy(ProductCosting $productCosting)
    {
        //
    }
}
