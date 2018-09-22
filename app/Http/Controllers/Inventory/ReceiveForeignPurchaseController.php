<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\ReceivePurchase;
use Illuminate\Http\Request;

class ReceiveForeignPurchaseController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.receive.foreign_purchase.{$suffix}";
    }

    public function index(){
        $data=[
            //'paginate'=>new Paginate('\App\InventoryIssue', ['id'=>'ID']),
            //'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);
    }

    public function create(){

        $data=[
            'inventory_receive'=>new \App\InventoryReceive,
            'inventory_receive_id'=>uCode('inventory_receives.inventory_receive_id', 'IR00'),
            'working_units'=>\App\WorkingUnit::pluck('name', 'id'), //Need to filter in future
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'), //Need to filter in future
            'product_patterns'=>\App\ProductPattern::pluck('name', 'id'), //Need to filter in future
        ];
        
        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){
        
    }


    public function show(ReceivePurchase $receivePurchase){
        
    }


    public function edit(ReceivePurchase $receivePurchase){
        
    }


    public function update(Request $request, ReceivePurchase $receivePurchase){
        
    }


    public function destroy(ReceivePurchase $receivePurchase){
        
    }

    public function getCommercialInvoice($ci_no){
        return CommercialInvoice::where('ci_no', $ci_no)->first();
    }
}
