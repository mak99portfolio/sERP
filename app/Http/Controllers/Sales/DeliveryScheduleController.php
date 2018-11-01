<?php

namespace App\Http\Controllers\Sales;

use App\DeliverySchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Auth;
use Session;

class DeliveryScheduleController extends Controller
{
    private $view_root = 'modules/sales/delivery_schedule/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        return $view;
    }

    
    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('customer_list', Customer::pluck('name','id')->prepend('-- Select Customer --', '')); 
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
     * @param  \App\DeliverySchedule  $deliverySchedule
     * @return \Illuminate\Http\Response
     */
    public function show(DeliverySchedule $deliverySchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeliverySchedule  $deliverySchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliverySchedule $deliverySchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeliverySchedule  $deliverySchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliverySchedule $deliverySchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliverySchedule  $deliverySchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliverySchedule $deliverySchedule)
    {
        //
    }
}
