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

        $working_unit=\Auth::user()->working_unit();

        $data=[
            'inventory_receive'=>new \App\InventoryReceive,
            'inventory_receive_no'=>uCode('inventory_receives.inventory_receive_no', 'IR00'),
            'working_units'=>\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id'), //Need to filter in future
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'), //Need to filter in future
            'product_patterns'=>\App\ProductPattern::pluck('name', 'id'), //Need to filter in future
        ];
        
        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        //dd($request->all());

        \Session::put('vue_inputs', [
            'commercial_invoice_no'=>$request->get('commercial_invoice_no'),
            'letter_of_credit_no'=>$request->get('letter_of_credit_no'),
        ]);

        \Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_receive_no'=>'required|unique:inventory_receives',
            'receive_date'=>'required|date',
            'commercial_invoice_no'=>'required|integer|exists:commercial_invoices',
            'working_unit_id'=>'required|integer',
            'product_status_id'=>'required|integer',
            'product_pattern_id'=>'required|integer',
            'products'=>'required|array'
        ]);

        $inventory_receive=\App\InventoryReceive::create($request->only(
            'inventory_receive_no',
            'working_unit_id',
            'product_status_id',
            'product_pattern_id',
            'remarks'
        ));

        $inventory_receive->receive_date=\Carbon\Carbon::parse($request->get('receive_date'));
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

        foreach($products as $row){

            $expiration_date=empty($row['expiration_date'])?NULL:\Carbon\Carbon::parse($row['expiration_date']);
            
            \App\Stock::create([
                'working_unit_id'=>$inventory_receive->working_unit_id,
                'product_id'=>$row['id'],
                'product_status_id'=>$inventory_receive->product_status_id,
                'product_pattern_id'=>$inventory_receive->product_pattern_id,
                'inventory_receive_id'=>$inventory_receive->id,
                'receive_quantity'=>$row['quantity'],
                'batch_no'=>$row['batch_no'],
                'expiration_date'=>$expiration_date,
                'remarks'=>$inventory_receive->remarks,
                'creator_user_id'=>\Auth::id()
            ]);

        }

        \Session::forget('vue_products');
        \Session::forget('vue_inputs');

        return back()->with('success', 'Form submitted successfully!.');
        
    }


    public function show(\App\InventoryReceive $receive_foreign_purchase){

        $data=[
            'inventory_receive'=>$receive_foreign_purchase,
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('show'), $data);
        
    }


    public function edit(\App\InventoryReceive $receive_foreign_purchase){

        $working_unit=\Auth::user()->working_unit();

        $data=[
            'inventory_receive'=>$receive_foreign_purchase,
            'inventory_receive_no'=>$receive_foreign_purchase->inventory_receive_no,
            'working_units'=>\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id'), //Need to filter in future
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'), //Need to filter in future
            'product_patterns'=>\App\ProductPattern::pluck('name', 'id'), //Need to filter in future
        ];

        //dd($receive_foreign_purchase->stocks);

        $products=[];

        foreach($receive_foreign_purchase->stocks as $row){

            array_push($products, [
                'id'=>$row->product_id,
                'quantity'=>$row->receive_quantity,
                'batch_no'=>$row->batch_no,
                'expiration_date'=>$row->expiration_date
            ]);

        }

        \Session::put('vue_products', $products);

        //dd($requisition->requested_items);

        $commercial_invoice=\App\CommercialInvoice::find($receive_foreign_purchase->foreign->commercial_invoice_id);

        \Session::put('vue_inputs', [
            'commercial_invoice_no'=>$commercial_invoice->commercial_invoice_no,
            'letter_of_credit_no'=>$commercial_invoice->LetterOfCredit->letter_of_credit_no
        ]);
        
        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\InventoryReceive $receive_foreign_purchase){

        $inventory_receive=$receive_foreign_purchase;

        \Session::put('vue_inputs', [
            'commercial_invoice_no'=>$request->get('commercial_invoice_no'),
            'letter_of_credit_no'=>$request->get('letter_of_credit_no'),
        ]);

        \Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_receive_no'=>'required|unique:inventory_receives,inventory_receive_no,'.$inventory_receive->id,
            'receive_date'=>'required|date',
            'commercial_invoice_no'=>'required|integer|exists:commercial_invoices',
            'working_unit_id'=>'required|integer',
            'product_status_id'=>'required|integer',
            'product_pattern_id'=>'required|integer',
            'products'=>'required|array'
        ]);

        $inventory_receive->fill($request->only(
            'inventory_receive_no',
            'working_unit_id',
            'product_status_id',
            'product_pattern_id',
            'remarks'
        ));

        $inventory_receive->receive_date=\Carbon\Carbon::parse($request->get('receive_date'));
        //$inventory_receive->receive_type='foreign_purchase';
        $inventory_receive->editor()->associate(\Auth::user());
        $inventory_receive->stocks()->delete();
        $inventory_receive->save();


        $foreign_purchase=$inventory_receive->foreign;

        $commercial_invoice=\App\CommercialInvoice::where(
            'commercial_invoice_no',
            $request->get('commercial_invoice_no')
        )->first();

        $foreign_purchase->commercial_invoice()->associate($commercial_invoice);
        $foreign_purchase->inventory_receive()->associate($inventory_receive);
        $foreign_purchase->save();

        $products=$request->get('products');

        foreach($products as $row){

            $expiration_date=empty($row['expiration_date'])?NULL:\Carbon\Carbon::createFromFormat('m/d/Y', $row['expiration_date']);
            
            \App\Stock::create([
                'working_unit_id'=>$inventory_receive->working_unit_id,
                'product_id'=>$row['id'],
                'product_status_id'=>$inventory_receive->product_status_id,
                'product_pattern_id'=>$inventory_receive->product_pattern_id,
                'inventory_receive_id'=>$inventory_receive->id,
                'receive_quantity'=>$row['quantity'],
                'batch_no'=>$row['batch_no'],
                'expiration_date'=>$expiration_date,
                'remarks'=>$inventory_receive->remarks,
                'creator_user_id'=>\Auth::id()
            ]);

        }

        \Session::forget('vue_products');
        \Session::forget('vue_inputs');

        return back()->with('success', 'Form submitted successfully!.');

    }


    public function destroy(ReceivePurchase $receivePurchase){
        
    }

    public function getCommercialInvoice($ci_no){
        return CommercialInvoice::where('ci_no', $ci_no)->first();
    }
}
