<?php

namespace App\Http\Controllers\Procurement;

use App\LocalRequisition;
use App\LocalRequisitionItem;
use App\RequisitionPurpose;
use App\RequisitionPriority;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Requests\LocalRequisitionRequest;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class LocalRequisitionController extends Controller
{
    private $view_root = 'modules/procurement/local/requisition/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('requisition_list', LocalRequisition::all());
        return $view;

     }

    public function create()
    {
        $view = view($this->view_root.'create');
        $view->with('requisition_purpose_list', RequisitionPurpose::pluck('name', 'id')->prepend('', ''));
        $view->with('requisition_priority_list', RequisitionPriority::pluck('name', 'id')->prepend('', ''));
        $view->with('product_group', ProductCategory::all());
        return $view;
    }

    public function store(LocalRequisitionRequest $request){

        //dd($request->all());
        if(!$request->item_validate()){
            return redirect()->back();
        }

        $requisition = new LocalRequisition;
        $requisition->fill($request->input());
        $requisition->creator_user_id = Auth::id();
        $requisition->company_id = 1;
        $requisition->issued_date = \Carbon\Carbon::parse($request->issued_date)->format('Y-m-d');
        $requisition->date_expected = \Carbon\Carbon::parse($request->date_expected)->format('Y-m-d');
        $requisition->generateRequisitionNumber();
        $requisition->save();
        // $requisition->items()->createMany($request->items);
        $items = Array();
        foreach($request->items as $item){
            array_push($items, new LocalRequisitionItem($item));
        }
        $requisition->items()->saveMany($items);

        Session::put('alert-success', 'Requisition created successfully. Requisition No: ' . $requisition->requisition_no);
        return redirect()->route('local-requisition.index');

    }

    public function show(LocalRequisition $localRequisition)
    {
        $view = view($this->view_root.'show');
        $view->with('localRequisition', $localRequisition);
        return $view;
    }

    public function edit(LocalRequisition $localRequisition)
    {
        //
    }

    public function update(Request $request, LocalRequisition $localRequisition)
    {
        //
    }

    public function destroy(LocalRequisition $localRequisition)
    {
        //
    }
}
