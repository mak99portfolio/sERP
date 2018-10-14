<?php

namespace App\Http\Controllers\Procurement;

use App\CommercialInvoice;
use App\CommercialInvoiceTracking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CommercialInvoiceTrackingController extends Controller
{
    private $view_root = 'modules/procurement/foreign/commercial_invoice_tracking/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('ci_list', CommercialInvoice::all());
        return $view;
    }

    public function getCIWithTracking(Request $request)
    {
        $view = view($this->view_root . 'index');
        $ci = CommercialInvoice::where('commercial_invoice_no', $request->ci_no)->first();
        $view->with('ci_list', CommercialInvoice::all());
        $view->with('ci', $ci);
        $ci_tracking = null;
        if ($ci) {
            $ci_tracking = CommercialInvoiceTracking::where('commercial_invoice_id', $ci->id)->first();
            $view->with('ci_tracking', $ci_tracking);
        } else {
            Session::put('alert-danger', 'Please insert correct CI no');
        }
        return $view;

    }
    public function saveDate(Request $request)
    {
        // dd($request->commercial_invoice_issue_date);

        $request->commercial_invoice_issue_date
        ? CommercialInvoiceTracking::updateOrCreate([
            'commercial_invoice_id' => $request->commercial_invoice_id], [
            'commercial_invoice_issue_date' => $request->commercial_invoice_issue_date,
        ]) : null;

        $request->bill_of_lading_issue_date
        ? CommercialInvoiceTracking::updateOrCreate([
            'commercial_invoice_id' => $request->commercial_invoice_id], [
            'bill_of_lading_issue_date' => $request->bill_of_lading_issue_date,
        ]) : null;
        
        $request->document_arrived_at_bank_date
        ? CommercialInvoiceTracking::updateOrCreate([
            'commercial_invoice_id' => $request->commercial_invoice_id], [
            'document_arrived_at_bank_date' => $request->document_arrived_at_bank_date,
        ]) : null;

        $request->document_send_at_port_date
        ? CommercialInvoiceTracking::updateOrCreate([
            'commercial_invoice_id' => $request->commercial_invoice_id], [
            'document_send_at_port_date' => $request->document_send_at_port_date,
        ]) : null;

        $request->document_value_payment_date
        ? CommercialInvoiceTracking::updateOrCreate([
            'commercial_invoice_id' => $request->commercial_invoice_id], [
            'document_value_payment_date' => $request->document_value_payment_date,
        ]) : null;

        $request->container_arrived_at_port_date
        ? CommercialInvoiceTracking::updateOrCreate([
            'commercial_invoice_id' => $request->commercial_invoice_id], [
            'container_arrived_at_port_date' => $request->container_arrived_at_port_date,
        ]) : null;

        $request->container_birth_at_port_date
        ? CommercialInvoiceTracking::updateOrCreate([
            'commercial_invoice_id' => $request->commercial_invoice_id], [
            'container_birth_at_port_date' => $request->container_birth_at_port_date,
        ]) : null;
        
        $request->container_delivery_at_port_date
        ? CommercialInvoiceTracking::updateOrCreate([
            'commercial_invoice_id' => $request->commercial_invoice_id], [
            'container_delivery_at_port_date' => $request->container_delivery_at_port_date,
        ]) : null;

        $request->receive_at_warehouse_date
        ? CommercialInvoiceTracking::updateOrCreate([
            'commercial_invoice_id' => $request->commercial_invoice_id], [
            'receive_at_warehouse_date' => $request->receive_at_warehouse_date,
        ]) : null;

        Session::put('alert-success', 'Commercial Invoice Tracking updated');
        return redirect()->back();
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
