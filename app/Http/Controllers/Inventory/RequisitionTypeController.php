<?php

namespace App\Http\Controllers\Inventory;

use App\InventoryRequisitionType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class RequisitionTypeController extends Controller{

    private $view_root = 'modules/inventory/requisition_type/';

    public function index(){

        $view = view($this->view_root.'index');
        $view->with('requisition_type_list', InventoryRequisitionType::all());
        return $view;

    }


    public function create(){

        $view = view($this->view_root.'create');
        return $view;

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:inventory_requisition_types',
            'short_name' => 'required|unique:inventory_requisition_types',
        ]);
        $requisition_type = new InventoryRequisitionType;
        $requisition_type->fill($request->input());
        $requisition_type->creator_user_id = Auth::id();
        $requisition_type->save();
        Session::put('alert-success', $requisition_type->name . ' created successfully');
        return redirect()->route('requisition-type.index');

    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id){

    }

}
