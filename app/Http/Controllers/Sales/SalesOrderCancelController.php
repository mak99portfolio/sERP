<?php

namespace App\Http\Controllers\Sales;

use App\SalesOrderCancel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesOrderCancelController extends Controller
{
    private $view_root = 'modules/sales/sales_order_cancel/';
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
     * @param  \App\SalesOrderCancel  $salesOrderCancel
     * @return \Illuminate\Http\Response
     */
    public function show(SalesOrderCancel $salesOrderCancel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesOrderCancel  $salesOrderCancel
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesOrderCancel $salesOrderCancel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesOrderCancel  $salesOrderCancel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesOrderCancel $salesOrderCancel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesOrderCancel  $salesOrderCancel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesOrderCancel $salesOrderCancel)
    {
        //
    }
}
