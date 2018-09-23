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

        //dd($request->all());
        \Session::put('vue_inputs', [
            'commercial_invoice_no'=>$request->get('commercial_invoice_no'),
            'letter_of_credit_id'=>$request->get('letter_of_credit_id'),
        ]);

        \Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_receive_id'=>'required',
            'receive_date'=>'required|date',
            'commercial_invoice_no'=>'required|integer',
            'working_unit_id'=>'required|integer',
            'product_status_id'=>'required|integer',
            'product_pattern_id'=>'required|integer',
            'products'=>'required|array'
        ]);

        $inventory_receive=\App\InventoryReceive::create($request->only(
            'inventory_receive_id'
            'working_unit_id',
            'product_status_id',
            'product_pattern_id',
            'remarks'
        ));

        $inventory_receive->receive_date=\Carbon\Carbon::parse($request->get('receive_date'))->toDateString();
        $inventory_receive->receive_type='foreign_purchase';
        $inventory_receive->creator()->associate(\Auth::user());
        $inventory_receive->save();


        $foreign_purchase=new \App\InventoryReceiveForeign;

        $commercial_invoice=\App\CommercialInvoice::where(
            'commercial_invoice_no',
            $request->get('commercial_invoice_no')
        )->first();

        $foreign_purchase->commercial_invoice()->associate($commercial_invoice);
        $foreign_purchase->inventory_receive()->associate($inventory_receive);
        $foreign_purchase->save();

        $products=$request->get('products');

        foreach($products as $product){
            
            \App\Stock::create([
                'working_unit_id'=>$foreign_purchase->working_unit_id,
                'product_id'=>$product['id'],
                'product_status_id'=>$foreign_purchase->product_status_id,
                'product_pattern_id'=>$foreign_purchase->product_pattern_id,
                'inventory_receive_id'=>$inventory_receive->id,
                'receive_quantity'=>$product['quantity'],
                'remarks'=>$foreign_purchase->remarks,
                'creator_user_id'=>\Auth::id()
            ]);

        }

        \Session::forget('vue_products');
        \Session::forget('vue_inputs');

        return back()->with('success', 'Form submitted successfully!.');
        
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
