<?php

namespace App\Http\Controllers\Sales;

use App\SalesInvoiceCancel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesInvoiceCancelController extends Controller
{
    private $view_root = 'modules/sales/invoice_cancel/';
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
     * @param  \App\SalesInvoiceCancel  $salesInvoiceCancel
     * @return \Illuminate\Http\Response
     */
    public function show(SalesInvoiceCancel $salesInvoiceCancel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesInvoiceCancel  $salesInvoiceCancel
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesInvoiceCancel $salesInvoiceCancel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesInvoiceCancel  $salesInvoiceCancel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesInvoiceCancel $salesInvoiceCancel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesInvoiceCancel  $salesInvoiceCancel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesInvoiceCancel $salesInvoiceCancel)
    {
        //
    }
}
