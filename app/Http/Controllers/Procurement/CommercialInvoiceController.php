<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Model\Pocurement\CommercialInvoice;
use Illuminate\Http\Request;

class CommercialInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/commercial_invoice/';
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
     * @param  \App\Model\Pocurement\CommercialInvoice  $commercialInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(CommercialInvoice $commercialInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Pocurement\CommercialInvoice  $commercialInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(CommercialInvoice $commercialInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Pocurement\CommercialInvoice  $commercialInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommercialInvoice $commercialInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Pocurement\CommercialInvoice  $commercialInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommercialInvoice $commercialInvoice)
    {
        //
    }
}
