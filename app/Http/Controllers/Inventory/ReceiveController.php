<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Paginate;

class ReceiveController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.receive.{$suffix}";
    }

    public function index(){
        
        $data=[
            'paginate'=>new Paginate('\App\InventoryReceive', ['inventory_receive_id'=>'Receive No']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[
            'inventory_receive'=>new \App\InventoryReceive,
            'working_units'=>\App\WorkingUnit::pluck('name', 'id') //Need to filter in future
        ];
        
        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){
        
    }


    public function show(\App\InventoryReceive $receive){
        
    }


    public function edit(\App\InventoryReceive $receive){
        
    }


    public function update(Request $request, \App\InventoryReceive $receive){
        
    }


    public function destroy(\App\InventoryReceive $receive){
        
    }

    public function get_product_info(string $slug){

        $product=\App\Product::where('hs_code', $slug)->orWhere('name', $slug)->first();

        //dd($product);

        if($product){

            return response()->json([
                'id'=>$product->id,
                'hs_code'=>$product->hs_code,
                'name'=>$product->name
            ]);
        }

        return response()->json(null, 404);

    }

    public function vue_old_products(Request $request){

        //dd(Session::get('vue_products'));

        $products=\Session::pull('vue_products');

        if($products){

            $data=[];

            foreach($products as $row){
                
                $product=\App\Product::find($row['id']);
                
                array_push($data, [
                    'id'=>$row['id'],
                    'hs_code'=>$product->hs_code,
                    'name'=>$product->name,
                    'quantity'=>$row['quantity']
                ]);

            }

            return response()->json($data);

        }

        return response()->json(null, 404);

    }

    public function vue_old_inputs(){

        $inputs=\Session::pull('vue_inputs');

        if($inputs) return response()->json($inputs);
        return response()->json(null, 404);

    }

    public function get_commercial_invoice(string $slug){

        $commercial_invoice=\App\CommercialInvoice::where('commercial_invoice_no', $slug)->first();

        if($commercial_invoice){

            $items=$commercial_invoice->items;
            $products=[];

            foreach($items as $item){

                array_push($products, [
                    'id'=>$item->product_id,
                    'hs_code'=>$item->product->hs_code,
                    'name'=>$item->product->name,
                    'quantity'=>$item->quantity,
                ]);
                
            }

            return response()->json([
                'commercial_invoice'=>$commercial_invoice,
                'products'=>$products
            ]);

        }

        return response()->json(null, 404);

    }

    public function get_purchase_order(string $slug){

        $local_order=\App\LocalPurchaseOrder::where('purchase_order_no', $slug)->first();

        if($local_order){

            $items=$local_order->items;
            $products=[];

            foreach($items as $item){

                array_push($products, [
                    'id'=>$item->product->id,
                    'hs_code'=>$item->product->hs_code,
                    'name'=>$item->product->name,
                    'quantity'=>$item->quantity,
                ]);
                
            }

            return response()->json([
                'local_order'=>$local_order,
                'products'=>$products
            ]);

        }

        return response()->json(null, 404);

    }

    public function get_inventory_requisition(\App\WorkingUnit $working_unit, string $slug){

        $requisition=$working_unit->outgoing_requisitions()->where('inventory_requisition_id', $slug)->first();

        if($requisition && $requisition->issue()->exists()){

            $items=$requisition->issue->items;

            $products=[];

            foreach($items as $item){

                array_push($products, [
                    'id'=>$item->product->id,
                    'hs_code'=>$item->product->hs_code,
                    'name'=>$item->product->name,
                    'quantity'=>$item->requested_quantity,
                    'requisition_quantity'=>$requisition->items()->where('product_id', $item->product->id)->first()->requested_quantity
                ]);

                
            }

            return response()->json([
                'requisition'=>[
                    'inventory_requisition_id'=>$requisition->inventory_requisition_id,
                    'receive_from'=>$requisition->requested_to->name
                ],
                'products'=>$products
            ]);

        }

        return response()->json(null, 404);

    }

}
