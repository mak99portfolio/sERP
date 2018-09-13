<?php

namespace App\Http\Controllers\Procurement;

use App\RequisitionType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequisitionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/setting/requisition_type/';
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
     * @param  \App\RequisitionType  $requisitionType
     * @return \Illuminate\Http\Response
     */
    public function show(RequisitionType $requisitionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequisitionType  $requisitionType
     * @return \Illuminate\Http\Response
     */
    public function edit(RequisitionType $requisitionType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequisitionType  $requisitionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequisitionType $requisitionType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequisitionType  $requisitionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequisitionType $requisitionType)
    {
        //
    }
}
