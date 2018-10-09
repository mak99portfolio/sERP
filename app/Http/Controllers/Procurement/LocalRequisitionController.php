<?php

namespace App\Http\Controllers\Procurement;

use App\LocalRequisition;
use App\LocalRequisitionItem;
use App\RequisitionPurpose;
use App\RequisitionPriority;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\ProductCategory;

class LocalRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/local/requisition/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('requisition_list', LocalRequisition::all());
        return $view;

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view($this->view_root.'create');
       $view->with('requisition_purpose_list', RequisitionPurpose::pluck('name', 'id')->prepend('--select purpose--'));
       $view->with('requisition_priority_list', RequisitionPriority::pluck('name', 'id')->prepend('--select priority--'));
       $view->with('product_group', ProductCategory::all());
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //dd($request->all());

        $request->validate([

            'requisition_title'=>'required|string',
            'issued_date'=>'required|date|date_format:d-m-Y',
            'date_expected'=>'required|date|date_format:d-m-Y|after:issued_date',
            'requisition_purpose_id'=>'required|integer',
            'requisition_priority_id'=>'required|integer'

        ]);

        $requisition = new LocalRequisition;
        $requisition->fill($request->input());
        $requisition->creator_user_id = Auth::id();
        $requisition->company_id = 1;
        $requisition->requisition_no = time();
        $requisition->save();
        $requisition->items()->createMany($request->items);

        Session::put('alert-success', 'Requisition created successfully. Requisition No: ' . $requisition->requisition_no);
        return redirect()->route('local-requisition.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LocalRequisition  $localRequisition
     * @return \Illuminate\Http\Response
     */
    public function show(LocalRequisition $localRequisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LocalRequisition  $localRequisition
     * @return \Illuminate\Http\Response
     */
    public function edit(LocalRequisition $localRequisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LocalRequisition  $localRequisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocalRequisition $localRequisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LocalRequisition  $localRequisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocalRequisition $localRequisition)
    {
        //
    }
}
