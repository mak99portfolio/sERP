<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Paginate;

class RequisitionTypeController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.requisition_type.{$suffix}";
    }

    public function index(){
        
        $data=[
            'paginate'=>new Paginate('\App\InventoryRequisitionType', ['id'=>'ID', 'name'=>'Name', 'short_name'=>'Short Name']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[

            'model'=>new \App\InventoryRequisitionType,
            'route_name'=>'requisition-type',
            'title'=>'Requisition Type'

        ];

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        $request->validate([
            'name'=>'required|unique:inventory_requisition_types',
            'short_name'=>'required|unique:inventory_requisition_types'
        ]);

        $model=\App\InventoryRequisitionType::create($request->all());
        $model->creator()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');

    }


    public function show(\App\InventoryRequisitionType $requisition_type){

        return back();

    }


    public function edit(\App\InventoryRequisitionType $requisition_type){

        $data=[

            'model'=>$requisition_type,
            'route_name'=>'requisition-type',
            'title'=>'Requisition Type'

        ];

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\InventoryRequisitionType $requisition_type){

        $model=$requisition_type;

        $request->validate([
            'name'=>'required|unique:inventory_requisition_types,name,'.$model->id,
            'short_name'=>'required|unique:inventory_requisition_types,short_name,'.$model->id
        ]);

        $model->fill($request->all());
        $model->editor()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');
        
    }


    public function destroy(\App\InventoryRequisitionType $requisition_type){

        return back();
        
    }


}
