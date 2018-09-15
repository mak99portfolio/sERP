<?php

namespace App\Http\Controllers\Procurement;

use App\RequisitionPurpose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequisitionPurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/setting/requisition_purpose/';
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
        $data=[
            'requisitionPurpose'=>RequisitionPurpose
        ];

        return view($this->path('create'), $data);
       
  
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
    		'name'=>'required|unique:requisition_purposes,name',
    		'short_name'=>'required|unique:requisition_purposes,short_name',
    		
    	]);

    	\App\WorkingUnit::create($request->all());
        return back()->with('success', 'Form submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequisitionPurpose  $requisitionPurpose
     * @return \Illuminate\Http\Response
     */
    public function show(RequisitionPurpose $requisitionPurpose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequisitionPurpose  $requisitionPurpose
     * @return \Illuminate\Http\Response
     */
    public function edit(RequisitionPurpose $requisitionPurpose)
    {
        $data=[
            'requisitionPurpose'=>$requisitionPurpose
        ];

        return view($this->path('create'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequisitionPurpose  $requisitionPurpose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequisitionPurpose $requisitionPurpose)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequisitionPurpose  $requisitionPurpose
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequisitionPurpose $requisitionPurpose)
    {
        //
    }
}
