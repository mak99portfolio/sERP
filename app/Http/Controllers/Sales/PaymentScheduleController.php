<?php

namespace App\Http\Controllers\Sales;

use App\PaymentSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentScheduleController extends Controller
{
    private $view_root = 'modules/sales/payment_schedule/';
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
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentSchedule $paymentSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentSchedule $paymentSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentSchedule $paymentSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentSchedule $paymentSchedule)
    {
        //
    }
}
