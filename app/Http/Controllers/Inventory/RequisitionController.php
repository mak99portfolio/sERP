<?php

namespace App\Http\Controllers\Inventory;  use App\Http\Controllers\Controller;

use App\Requisition;
use Illuminate\Http\Request;
use Session;

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
            'inventory_item_statuses'=>\App\InventoryItemStatus::pluck('name', 'id')
        ];

        //dd($data);

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){
        
        Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_requisition_id'=>'required|unique:inventory_requisitions',
            'inventory_requisition_type_id'=>'required|integer',
            'sender_depot_id'=>'required|integer',
            'requested_depot_id'=>'required|integer',
            'inventory_item_status_id'=>'required|integer',
            'date'=>'required|date',
            'products'=>'required|array'
        ]);

        $inventory_requisition=\App\InventoryRequisition::create($request->except('products'));

    }


    public function show(Requisition $requisition){
        
    }


    public function edit(Requisition $requisition){
        
    }


    public function update(Request $request, Requisition $requisition){
        
    }


    public function destroy(Requisition $requisition){
        
    }

    public function get_product_info(\App\WorkingUnit $working_unit, string $slug){

        $product=\App\Product::where('hs_code', $slug)->orWhere('name', $slug)->first();

        //dd($product);

        if($product){

            return response()->json([
                'id'=>$product->id,
                'hs_code'=>$product->hs_code,
                'name'=>$product->name,
                'stock'=>stock_balance($working_unit, $product)
            ]);
        }

        return response()->json(null, 404);

    }

    public function vue_old_products(Request $request){

        //dd(Session::get('vue_products'));

        $products=Session::pull('vue_products');

        if($products){

            $data=[];

            foreach($products as $id=>$quantity){
                
                $product=\App\Product::find($id);
                
                array_push($data, [
                    'id'=>$id,
                    'hs_code'=>$product->hs_code,
                    'name'=>$product->name,
                    'stock'=>0,
                    'quantity'=>$quantity
                ]);

            }

            return response()->json($data);

        }

        return response()->json(null, 404);

    }

}
