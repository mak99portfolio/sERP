<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;

use App\BusinessType;
use Illuminate\Http\Request;

class BusinessTypeController extends Controller
{
    private $view_root = 'modules/procurement/setting/business_type/';
    public function index()
    {
        $view = view($this->view_root . 'create');
        return $view;
    }

   
    public function create()
    {
        $view = view($this->view_root . 'create');
        return $view;
    }

   
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessType $businessType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessType $businessType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessType $businessType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessType  $businessType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessType $businessType)
    {
        //
    }
}
