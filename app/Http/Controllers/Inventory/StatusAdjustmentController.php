<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Paginate;

class StatusAdjustmentController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.status_adjustment.{$suffix}";
    }

    public function index(){
        
        $data=[
            'paginate'=>new Paginate('\App\Stock', ['id'=>'ID', 'product_id'=>'Product ID', 'receive_quantity'=>'Receive Quantity', 'issue_quantity'=>'Issue Quantity']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        return redirect()->route('status-adjustment.index');
        $data=[];
        return view($this->path('create'), $data);
        
    }

    public function store(Request $request){
        return redirect()->route('status-adjustment.index');
    }


    public function show($id){
        return redirect()->route('status-adjustment.index');
    }


    public function edit(\App\Stock $status_adjustment){
        
        $data=[
            'status_adjustment'=>$status_adjustment,
            'working_units'=>\App\WorkingUnit::pluck('name', 'id'),
            'inventory_item_statuses'=>\App\InventoryItemStatus::pluck('name', 'id'),
            'inventory_item_patterns'=>\App\InventoryItemPattern::pluck('name', 'id')
        ];

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\Stock $status_adjustment){

        $request->validate([
            'inventory_item_status_id'=>'required|integer',
            'inventory_item_pattern_id'=>'required|integer',
        ]);

        $status_adjustment->fill($request->only(
            'inventory_item_status_id',
            'inventory_item_pattern_id',
            'remarks'
        ));

        if($status_adjustment->save()) return back()->with('success', 'Status updated successfully!.');      
        return back()->with('danger', 'Sorry, failed to updated status!.');      

    }


    public function destroy($id){
        
    }
}
