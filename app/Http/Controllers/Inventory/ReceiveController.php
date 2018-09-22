<?php

namespace App\Http\Controllers\Inventory;  use App\Http\Controllers\Controller;

use App\Receive;
use Illuminate\Http\Request;

class ReceiveController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.receive.{$suffix}";
    }

    public function index(){
        
        $data=[];
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


    public function show(Receive $receive){
        
    }


    public function edit(Receive $receive){
        
    }


    public function update(Request $request, Receive $receive){
        
    }


    public function destroy(Receive $receive){
        
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

            foreach($products as $product){
                
                $product=\App\Product::find($product['id']);
                
                array_push($data, [
                    'id'=>$product['id'],
                    'hs_code'=>$product->hs_code,
                    'name'=>$product->name,
                    'quantity'=>$product['quantity']
                ]);

            }

            return response()->json($data);

        }

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
}
