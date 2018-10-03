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
        $view->with('bill_of_lading_list', BillOfLading::doesntHave('product_costing')->get());
        $view->with('product_costing_list', ProductCosting::all());
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
        // dd($request->input());
        $productCosting = new ProductCosting;
        $productCosting->fill($request->input());
        $productCosting->creator_user_id = Auth::id();
        $productCosting->save();
        Session::put('alert-success', 'Product Costing saved successfully');
        return redirect()->route('product-costing.index');
    }

    public function show(ProductCosting $productCosting)
    {
        $view = view($this->view_root . 'show');
        $view->with('productCosting', $productCosting);
        return $view;
    }

    public function edit($bill_of_lading_id)
    {
        $productCosting = ProductCosting::where('bill_of_lading_id', $bill_of_lading_id)->first();
        if($productCosting){
            Session::put('alert-success', 'Already costing completed for this BL');
            return redirect()->route('product-costing.index');
        }
        $view = view($this->view_root . 'edit');
        $view->with('bill_of_lading', BillOfLading::findOrFail($bill_of_lading_id));
        return $view;
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
