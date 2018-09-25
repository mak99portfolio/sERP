<?php

namespace App\Http\Controllers\Procurement;

use App\ForeignRequisition;
use App\RequisitionPurpose;
use App\RequisitionPriority;
use App\ForeignRequisitionItem;
use App\Product;
use App\ProductGroup;
use App\Http\Requests\ForeignRequisitionRequest;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class ForeignRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/foreign_requisition/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('requisition_list', ForeignRequisition::all());
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
       $view = view($this->view_root.'create');
       $view->with('requisition_purpose_list', RequisitionPurpose::pluck('name', 'id')->prepend('--select purpose--',''));
       $view->with('requisition_priority_list', RequisitionPriority::pluck('name', 'id')->prepend('--select priority--',''));
       $view->with('product_group', ProductGroup::all());
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForeignRequisitionRequest $request)
    {
        if(!$request->item_validate()){
            return redirect()->back();
        }
        $requisition = new ForeignRequisition;
        $requisition->fill($request->input());
        $requisition->creator_user_id = Auth::id();
        $requisition->company_id = 1;
        $requisition->generateRequisitionNumber();
        $requisition->save();
        $items = Array();
        foreach($request->items as $item){
            array_push($items, new ForeignRequisitionItem($item));
        }
        $requisition->items()->saveMany($items);
        Session::put('alert-success', 'Requisition created successfully. <br><strong>Requisition No: ' . $requisition->requisition_no . '</strong>');
        return redirect()->route('foreign-requisition.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ForeignRequisition  $foreignRequisition
     * @return \Illuminate\Http\Response
     */
    public function show(ForeignRequisition $foreignRequisition)
    {
        $view = view($this->view_root.'show');
        $view->with('foreignRequisition', $foreignRequisition);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ForeignRequisition  $foreignRequisition
     * @return \Illuminate\Http\Response
     */
    public function edit(ForeignRequisition $foreignRequisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ForeignRequisition  $foreignRequisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForeignRequisition $foreignRequisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ForeignRequisition  $foreignRequisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForeignRequisition $foreignRequisition)
    {
        //
    }
    
}
