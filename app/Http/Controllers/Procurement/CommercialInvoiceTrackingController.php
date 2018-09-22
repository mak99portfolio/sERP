<?php

namespace App\Http\Controllers\Procurement;

use App\CommercialInvoiceTracking;
use App\CommercialInvoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;


class CommercialInvoiceTrackingController extends Controller
{
    private $view_root = 'modules/procurement/foreign/commercial_invoice_tracking/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        return $view;
    }

    public function getCIWithTracking($ci_no){
        $ci = CommercialInvoice::where('commercial_invoice_no', $ci_no)->first();
        $ci_tracking = null;
        if($ci){
            $ci_tracking = CommercialInvoiceTracking::where('commercial_invoice_id', $ci->id)->first();
            // Session::put('alert-success', 'CI Found');
        }else{
            Session::put('alert-danger', 'Please insert correct CI no');
        }
        $data = [
            'ci' => $ci, 
            'ci_tracking' => $ci_tracking
        ];
        return response()->json($data);
        
    }

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
        $request->validate([
            'bl_issue_date' => 'required',
            'bl_issue_date' => 'required',
            'document_arrived_at_bank_date' => 'required',
            'document_send_at_port_date' => 'required',
            'document_value_payment_date' => 'required',
            'document_value_payment_date' => 'required',
        ]);
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
