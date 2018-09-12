<?php

namespace App\Http\Controllers\Inventory;  use App\Http\Controllers\Controller;

use App\Model\Pocurement\CommercialInvoice;
use App\ReceivePurchase;
use Illuminate\Http\Request;

class ReceivePurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Model\inventory\ReceivePurchase  $receivePurchase
     * @return \Illuminate\Http\Response
     */
    public function show(ReceivePurchase $receivePurchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\inventory\ReceivePurchase  $receivePurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceivePurchase $receivePurchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\inventory\ReceivePurchase  $receivePurchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceivePurchase $receivePurchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\inventory\ReceivePurchase  $receivePurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceivePurchase $receivePurchase)
    {
        //
    }
    public function getCommercialInvoice($ci_no){
        return CommercialInvoice::where('ci_no', $ci_no)->first();
    }
}
