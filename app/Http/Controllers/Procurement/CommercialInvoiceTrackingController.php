<?php

namespace App\Http\Controllers\Procurement;

use App\CommercialInvoiceTracking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommercialInvoiceTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/commercial_invoice_tracking/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        // $view->with('foo', 'bar');
        // your code here
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
        // $view->with('foo', 'bar');
        // your code here
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
     * @param  \App\CommercialInvoiceTracking  $commercialInvoiceTracking
     * @return \Illuminate\Http\Response
     */
    public function show(CommercialInvoiceTracking $commercialInvoiceTracking)
    {
        $view = view($this->view_root . 'show');
        // $view->with('foo', 'bar');
        // your code here
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommercialInvoiceTracking  $commercialInvoiceTracking
     * @return \Illuminate\Http\Response
     */
    public function edit(CommercialInvoiceTracking $commercialInvoiceTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommercialInvoiceTracking  $commercialInvoiceTracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommercialInvoiceTracking $commercialInvoiceTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommercialInvoiceTracking  $commercialInvoiceTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommercialInvoiceTracking $commercialInvoiceTracking)
    {
        //
    }
}
