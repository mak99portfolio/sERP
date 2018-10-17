<?php

namespace App\Http\Controllers\Sales;

use App\DiscountCustomerWise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountCustomerWiseController extends Controller
{
    private $view_root = 'modules/sales/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'discount_customer_wise');
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
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
     * @param  \App\DiscountCustomerWise  $discountCustomerWise
     * @return \Illuminate\Http\Response
     */
    public function show(DiscountCustomerWise $discountCustomerWise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiscountCustomerWise  $discountCustomerWise
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscountCustomerWise $discountCustomerWise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscountCustomerWise  $discountCustomerWise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscountCustomerWise $discountCustomerWise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscountCustomerWise  $discountCustomerWise
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscountCustomerWise $discountCustomerWise)
    {
        //
    }
}
