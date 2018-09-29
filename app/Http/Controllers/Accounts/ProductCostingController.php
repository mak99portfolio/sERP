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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view($this->view_root . 'create');
        // $view->with('bank_list', CompanyBank::all());
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCosting  $productCosting
     * @return \Illuminate\Http\Response
     */
    public function show(BillOfLading $productCosting)
    {
        $view = view($this->view_root . 'show');
        $view->with('productCosting', $productCosting);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCosting  $productCosting
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCosting $productCosting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCosting  $productCosting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCosting $productCosting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCosting  $productCosting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCosting $productCosting)
    {
        //
    }
}
