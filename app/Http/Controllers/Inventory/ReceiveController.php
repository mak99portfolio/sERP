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

        $working_unit=\Auth::user()->working_unit();
        $inventory_receives=\App\InventoryReceive::where('working_unit_id', $working_unit->id);
        
        $data=[
            'paginate'=>new Paginate($inventory_receives, ['inventory_receive_no'=>'Receive No']),
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

                $temp=[];
                foreach($row as $field=>$value) $temp[$field]=$value;

                $product=\App\Product::find($temp['id']);

                $temp['hs_code']=$product->hs_code;
                $temp['name']=$product->name;
                
                array_push($data, $temp);

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
                'commercial_invoice_no'=>$commercial_invoice->commercial_invoice_no,
                'letter_of_credit_no'=>$commercial_invoice->LetterOfCredit->letter_of_credit_no,
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

        $requisition=$working_unit->outgoing_requisitions()->where('inventory_requisition_no', $slug)->first();

        if($requisition && $requisition->issue()->exists() && $requisition->issue->final_approver()->exists()){

            $items=$requisition->issue->items;

            $products=[];

            foreach($items as $item){

                $return_quantity='';
                $return_status_id=1;

                if($requisition->issue->return_items()->exists()){

                    $return_item=$requisition->issue->return_items()->where('product_id', $item->product_id)->first();

                    if($return_item){
                        $return_quantity=$return_item->return_quantity;
                        $return_status_id=$return_item->product_status_id;
                    }


                }

                array_push($products, [
                    'id'=>$item->product->id,
                    'hs_code'=>$item->product->hs_code,
                    'name'=>$item->product->name,
                    'quantity'=>$item->requested_quantity,
                    'requisition_quantity'=>$requisition->items()->where('product_id', $item->product->id)->first()->requested_quantity,
                    'return_quantity'=>$return_quantity,
                    'return_status_id'=>$return_status_id,
                    'batch_no'=>$item->batch_no,
                    'expiration_date'=>$item->expiration_date
                ]);

                
            }

            return response()->json([
                'requisition'=>[
                    'inventory_requisition_no'=>$requisition->inventory_requisition_no,
                    'receive_from'=>$requisition->requested_to->name,
                    'inventory_issue_id'=>$requisition->issue->id
                ],
                'products'=>$products
            ]);

        }

        return response()->json(null, 404);

    }

    public function product_statuses(){
        return \App\ProductStatus::select('id', 'name')->get();
    }

    public function get_issue_return(\App\WorkingUnit $working_unit, string $slug){

        $issue=\App\InventoryIssue::where('inventory_issue_no', $slug)->first();


        $requisition=NULL;

        if($issue) $requisition=$working_unit->incoming_requisitions()->find($issue->inventory_requisition_id);

        if($requisition && $requisition->issue->final_approver()->exists()){

            $items=$requisition->issue->items;

            $products=[];

            foreach($items as $item){

                $return_quantity=0;
                $return_status_id=1;

                if($requisition->issue->return_items()->exists()){

                    $return_item=$requisition->issue->return_items()->where('product_id', $item->product_id)->first();

                    if($return_item){
                        $return_quantity=$return_item->return_quantity;
                        $return_status_id=$return_item->product_status_id;
                    }


                }

                array_push($products, [
                    'id'=>$item->product->id,
                    'hs_code'=>$item->product->hs_code,
                    'name'=>$item->product->name,
                    'quantity'=>$item->requested_quantity,
                    'return_quantity'=>$return_quantity,
                    'return_status_id'=>$return_status_id
                ]);

                
            }

            return response()->json([
                'issue'=>[
                    'inventory_issue_no'=>$requisition->issue->inventory_issue_no,
                    'inventory_requisition_no'=>$requisition->inventory_requisition_no,
                    'receive_from'=>$requisition->sender->name
                ],
                'products'=>$products
            ]);
        }

        return response()->json(null, 404);

    }

}
