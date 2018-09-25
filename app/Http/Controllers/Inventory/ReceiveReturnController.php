<?php

namespace App\Http\Controllers\Inventory;  use App\Http\Controllers\Controller;

use App\ReceiveReturn;
use Illuminate\Http\Request;

class ReceiveReturnController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.receive.return.{$suffix}";
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
            'inventory_return_reasons'=>\App\InventoryReturnReason::pluck('name', 'id')
        ];
        
        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        //dd($request->all());

        \Session::put('vue_inputs', [
            'inventory_issue_no'=>$request->get('inventory_issue_no'),
            'inventory_requisition_id'=>$request->get('inventory_requisition_id'),
            'receive_from'=>$request->get('receive_from'),
        ]);

        \Session::put('vue_products', $request->get('products'));

        $request->validate([

            'inventory_receive_id'=>'required|unique:inventory_receives',
            'receive_date'=>'required|date',
            'inventory_return_reason_id'=>'required|integer',
            'working_unit_id'=>'required|integer',
            'inventory_issue_no'=>'required|exists:inventory_issues',
            'inventory_requisition_id'=>'required|exists:inventory_requisitions',
            'products'=>'required|array',
            'remarks'=>'required'

        ]);

        $inventory_issue=\App\InventoryIssue::where('inventory_issue_no', $request->get('inventory_issue_no'))->first();

        if(\App\InventoryReceiveReturn::where('inventory_issue_id', $inventory_issue->id)->exists()){

            return back()->withInput()->with('failed', 'This return product already been listed.');

        }

        $inventory_receive=\App\InventoryReceive::create($request->only(
            'inventory_receive_id',
            'working_unit_id',
            'product_status_id',
            'product_pattern_id',
            'remarks'
        ));

        $inventory_receive->receive_date=\Carbon\Carbon::parse($request->get('receive_date'))->toDateString();
        $inventory_receive->receive_type='receive_return';
        $inventory_receive->creator()->associate(\Auth::user());
        $inventory_receive->save();


        $receive_return=new \App\InventoryReceiveReturn;
        
        $receive_return->issue()->associate($inventory_issue);
        $receive_return->inventory_receive()->associate($inventory_receive);
        $receive_return->inventory_return_reason_id=$request->get('inventory_return_reason_id');
        $receive_return->save();

        $products=$request->get('products');

        foreach($products as $row){

            \App\Stock::create([
                'working_unit_id'=>$inventory_receive->working_unit_id,
                'product_id'=>$row['id'],
                'product_status_id'=>$row['return_status_id'],
                'product_pattern_id'=>$inventory_issue->product_pattern_id,
                'inventory_receive_id'=>$inventory_receive->id,
                'receive_quantity'=>$row['return_quantity'],
                'remarks'=>$inventory_receive->remarks,
                'creator_user_id'=>\Auth::id()
            ]);

        }

        \Session::forget('vue_products');
        \Session::forget('vue_inputs');

        return back()->with('success', 'Form submitted successfully!.');

    }


    public function show(\App\InventoryReceiveReturn $receive_return){
        
    }


    public function edit(\App\InventoryReceive $receive_return){

        $data=[
            'inventory_receive'=>$receive_return,
            'inventory_receive_id'=>$receive_return->inventory_receive_id,
            'working_units'=>\App\WorkingUnit::pluck('name', 'id'), //Need to filter in future
            'inventory_return_reasons'=>\App\InventoryReturnReason::pluck('name', 'id')
        ];

        //dd($receive_foreign_purchase->stocks);

        $products=[];

        $related_issue=$receive_return->return->issue;//To sorten related model

        foreach($receive_return->stocks as $row){

            array_push($products, [
                'id'=>$row->product_id,
                'quantity'=>$related_issue->items()->where('product_id', $row->product_id)->first()->requested_quantity,
                'return_quantity'=>$row->receive_quantity,
                'return_status_id'=>$related_issue->return_items()->where('product_id', $row->product_id)->first()->product_status_id
            ]);

        }

        \Session::put('vue_products', $products);

        \Session::put('vue_inputs', [
            'inventory_issue_no'=>$receive_return->return->issue->inventory_issue_no,
            'inventory_requisition_id'=>$receive_return->return->issue->requisition->inventory_requisition_id,
            'receive_from'=>$receive_return->return->issue->requisition->sender->name
        ]);
        
        return view($this->path('create'), $data);
        
    }


    public function update(Request $request, \App\InventoryReceive $receive_return){

        //dd($request->all());

        $inventory_receive=$receive_return;

        \Session::put('vue_inputs', [
            'inventory_issue_no'=>$request->get('inventory_issue_no'),
            'inventory_requisition_id'=>$request->get('inventory_requisition_id'),
            'receive_from'=>$request->get('receive_from'),
        ]);

        \Session::put('vue_products', $request->get('products'));

        $request->validate([

            'inventory_receive_id'=>'required|unique:inventory_receives,inventory_receive_id,'.$inventory_receive->id,
            'receive_date'=>'required|date',
            'inventory_return_reason_id'=>'required|integer',
            'working_unit_id'=>'required|integer',
            'inventory_issue_no'=>'required|exists:inventory_issues',
            'inventory_requisition_id'=>'required|exists:inventory_requisitions',
            'products'=>'required|array',
            'remarks'=>'required'

        ]);

        $inventory_issue=\App\InventoryIssue::where('inventory_issue_no', $request->get('inventory_issue_no'))->first();

        $inventory_receive->fill($request->only(
            'inventory_receive_id',
            'working_unit_id',
            'product_status_id',
            'product_pattern_id',
            'remarks'
        ));

        $inventory_receive->receive_date=\Carbon\Carbon::parse($request->get('receive_date'))->toDateString();

        $inventory_receive->editor()->associate(\Auth::user());
        $inventory_receive->save();        
        $inventory_receive->return->inventory_return_reason_id=$request->get('inventory_return_reason_id');
        $inventory_receive->stocks()->delete();
        $inventory_receive->return->save();

        $products=$request->get('products');

        foreach($products as $row){

            \App\Stock::create([
                'working_unit_id'=>$inventory_receive->working_unit_id,
                'product_id'=>$row['id'],
                'product_status_id'=>$row['return_status_id'],
                'product_pattern_id'=>$inventory_issue->product_pattern_id,
                'inventory_receive_id'=>$inventory_receive->id,
                'receive_quantity'=>$row['return_quantity'],
                'remarks'=>$inventory_receive->remarks,
                'creator_user_id'=>\Auth::id()
            ]);

        }

        \Session::forget('vue_products');
        \Session::forget('vue_inputs');

        return back()->with('success', 'Form submitted successfully!.');

    }


    public function destroy(ReceiveReturn $receiveReturn)
    {
        
    }
}
