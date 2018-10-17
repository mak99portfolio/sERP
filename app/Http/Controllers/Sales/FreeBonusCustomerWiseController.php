<?php

namespace App\Http\Controllers\Sales;

use App\FreeBonusCustomerWise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreeBonusCustomerWiseController extends Controller
{
    private $view_root = 'modules/sales/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'free_bonus_customer_wise');
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
     * @param  \App\FreeBonusCustomerWise  $freeBonusCustomerWise
     * @return \Illuminate\Http\Response
     */
    public function show(FreeBonusCustomerWise $freeBonusCustomerWise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FreeBonusCustomerWise  $freeBonusCustomerWise
     * @return \Illuminate\Http\Response
     */
    public function edit(FreeBonusCustomerWise $freeBonusCustomerWise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FreeBonusCustomerWise  $freeBonusCustomerWise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FreeBonusCustomerWise $freeBonusCustomerWise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FreeBonusCustomerWise  $freeBonusCustomerWise
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreeBonusCustomerWise $freeBonusCustomerWise)
    {
        //
    }
}
