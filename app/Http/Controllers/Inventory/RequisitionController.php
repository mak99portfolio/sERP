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
        ];

        dd($data);

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

}
