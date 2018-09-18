<?php

namespace App\Http\Controllers\Inventory;  use App\Http\Controllers\Controller;

use App\Requisition;
use Illuminate\Http\Request;

class RequisitionController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.requisition.{$suffix}";
    }

    public function index(){
        
        $data=[];
        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[
            'inventory_requisition'=>new \App\InventoryRequisition,
            'requisition_no'=>uCode('inventory_requisitions.inventory_requisition_id', 'IR'),
            'inventory_requisition_types'=>\App\InventoryRequisitionType::pluck('name', 'id'),
            'working_units'=>\App\WorkingUnit::pluck('name', 'id'),
            'inventory_item_statuses'=>\App\InventoryItemStatus::pluck('name', 'id'),
        ];

        //dd($data);

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){
        
    }


    public function show(Requisition $requisition){
        
    }


    public function edit(Requisition $requisition){
        
    }


    public function update(Request $request, Requisition $requisition){
        
    }


    public function destroy(Requisition $requisition){
        
    }

    public function get_product_info(string $slug){
        return response()->json($slug);
    }

}
