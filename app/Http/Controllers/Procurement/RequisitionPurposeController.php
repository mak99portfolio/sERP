<?php

namespace App\Http\Controllers\Procurement;

use App\RequisitionPurpose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Paginate;

class RequisitionPurposeController extends Controller{

    protected function path(string $suffix){
        return "modules/procurement/setting/requisition_purpose/.{$suffix}";
    }

    public function index(){

        $data=[
    		'paginate'=>new Paginate('\App\RequisitionPurpose', ['name'=>'Name', 'short_name'=>'Short Name']),
    		'carbon'=>new \Carbon\Carbon
    	];

    	//dd($data['paginate']);

    	return view($this->path('index'), $data);

    }


    public function create(){

        $data=[
            'requisitionPurpose'=>new RequisitionPurpose
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

    	$requisitionPurpose=RequisitionPurpose::create($request->all());
        $requisitionPurpose->creator()->associate(auth()->user());
        $requisitionPurpose->save();

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

    public function update(Request $request, RequisitionPurpose $requisitionPurpose)
    {
        $request->validate([
            'name'=>'required|unique:requisition_purposes,name,'.$requisitionPurpose->id,
            'short_name'=>'required|unique:requisition_purposes,short_name,'.$requisitionPurpose->id,
           
        ]);

        $requisitionPurpose->fill($request->all());
        if($requisitionPurpose->save()) return back()->with('success', 'Form edited successfully');
        return back()->with('danger', 'Form Submission failed!.');
    }

    public function destroy(RequisitionPurpose $requisitionPurpose)
    {
        if($requisitionPurpose->delete()) return back()->with('success', 'Form submitted successfully');
        return back()->with('danger', 'Form Submission failed!.');
    }
}
