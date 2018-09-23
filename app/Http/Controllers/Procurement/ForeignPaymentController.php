<?php

namespace App\Http\Controllers\Procurement;

use App\ForeignPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\controller;

class ForeignPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/foreign_payment/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        // $view->with('requisition_list', ForeignPayment::all());
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
     * @param  \App\ForeignPayment  $foreignPayment
     * @return \Illuminate\Http\Response
     */
    public function show(ForeignPayment $foreignPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ForeignPayment  $foreignPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(ForeignPayment $foreignPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ForeignPayment  $foreignPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForeignPayment $foreignPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ForeignPayment  $foreignPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForeignPayment $foreignPayment)
    {
        //
    }
}
