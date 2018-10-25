<?php

namespace App\Http\Controllers\Sales;

use App\InvoiceSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceScheduleController extends Controller
{
    private $view_root = 'modules/sales/invoice_schedule/';
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
     * @param  \App\InvoiceSchedule  $invoiceSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceSchedule $invoiceSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvoiceSchedule  $invoiceSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceSchedule $invoiceSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvoiceSchedule  $invoiceSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceSchedule $invoiceSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoiceSchedule  $invoiceSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceSchedule $invoiceSchedule)
    {
        //
    }
}
