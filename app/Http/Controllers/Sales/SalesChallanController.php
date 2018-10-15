<?php

namespace App\Http\Controllers\Sales;

use App\SalesChallan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesChallanController extends Controller
{
    private $view_root = 'modules/sales/challan/';
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
     * @param  \App\SalesChallan  $salesChallan
     * @return \Illuminate\Http\Response
     */
    public function show(SalesChallan $salesChallan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesChallan  $salesChallan
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesChallan $salesChallan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesChallan  $salesChallan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesChallan $salesChallan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesChallan  $salesChallan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesChallan $salesChallan)
    {
        //
    }
}
