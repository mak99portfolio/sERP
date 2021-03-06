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

        $working_unit=\Auth::user()->working_unit();

        $data=[
            'inventory_receive'=>new \App\InventoryReceive,
            'inventory_receive_no'=>uCode('inventory_receives.inventory_receive_no', 'IR00'),
            'working_units'=>\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id'), //Need to filter in future
            'inventory_return_reasons'=>\App\InventoryReturnReason::pluck('name', 'id')
        ];
        
        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        //dd($request->all());

        \Session::put('vue_inputs', [
            'inventory_issue_no'=>$request->get('inventory_issue_no'),
            'inventory_requisition_no'=>$request->get('inventory_requisition_no'),
            'receive_from'=>$request->get('receive_from'),
        ]);

        \Session::put('vue_products', $request->get('products'));

        $request->validate([

            'inventory_receive_no'=>'required|unique:inventory_receives',
            'receive_date'=>'required|date',
            'inventory_return_reason_id'=>'required|integer',
            'working_unit_id'=>'required|integer',
            'inventory_issue_no'=>'required|exists:inventory_issues',
            'inventory_requisition_no'=>'required|exists:inventory_requisitions',
            'products'=>'required|array',
            'remarks'=>'required'

        ]);

        $inventory_issue=\App\InventoryIssue::where('inventory_issue_no', $request->get('inventory_issue_no'))->first();

        if(\App\InventoryReceiveReturn::where('inventory_issue_id', $inventory_issue->id)->exists()){

            return back()->withInput()->with('failed', 'This return product already been listed.');

        }

        $inventory_receive=\App\InventoryReceive::create($request->only(
            'inventory_receive_no',
            'working_unit_id',
            'product_status_id',
            'product_type_id',
            'remarks'
        ));

        $inventory_receive->receive_date=\Carbon\Carbon::parse($request->get('receive_date'));
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

            $expiration_date=empty($row['expiration_date'])?NULL:\Carbon\Carbon::parse($row['expiration_date']);

            \App\Stock::create([
                'working_unit_id'=>$inventory_receive->working_unit_id,
                'product_id'=>$row['id'],
                'product_status_id'=>$row['return_status_id'],
                'product_type_id'=>$inventory_issue->product_type_id,
                'inventory_receive_id'=>$inventory_receive->id,
                'receive_quantity'=>$row['return_quantity'],
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


    public function show(\App\InventoryReceive $receive_return){

        $data=[
            'inventory_receive'=>$receive_return,
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('show'), $data);

    }


    public function edit(\App\InventoryReceive $receive_return){

        $working_unit=\Auth::user()->working_unit();

        $data=[
            'inventory_receive'=>$receive_return,
            'inventory_receive_no'=>$receive_return->inventory_receive_no,
            'working_units'=>\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id'), //Need to filter in future
            'inventory_return_reasons'=>\App\InventoryReturnReason::pluck('name', 'id')
        ];

        //dd($receive_foreign_purchase->stocks);

        $products=[];

        $related_issue=$receive_return->return->issue;//To sorten related model

        foreach($receive_return->stocks as $row){

            array_push($products, [
                'id'=>$row->product_id,
                'quantity'=>$related_issue->items()->where('product_id', $row->product_id)->first()->issued_quantity,
                'return_quantity'=>$row->receive_quantity,
                'batch_no'=>$row->batch_no,
                'expiration_date'=>$row->expiration_date,
                'return_status_id'=>$related_issue->return_items()->where('product_id', $row->product_id)->first()->product_status_id
            ]);

        }

        \Session::put('vue_products', $products);

        \Session::put('vue_inputs', [
            'inventory_issue_no'=>$receive_return->return->issue->inventory_issue_no,
            'inventory_requisition_no'=>$receive_return->return->issue->requisition->inventory_requisition_no,
            'receive_from'=>$receive_return->return->issue->requisition->sender->name
        ]);
        
        return view($this->path('create'), $data);
        
    }


    public function update(Request $request, \App\InventoryReceive $receive_return){

        //dd($request->all());

        $inventory_receive=$receive_return;

        \Session::put('vue_inputs', [
            'inventory_issue_no'=>$request->get('inventory_issue_no'),
            'inventory_requisition_no'=>$request->get('inventory_requisition_no'),
            'receive_from'=>$request->get('receive_from'),
        ]);

        \Session::put('vue_products', $request->get('products'));

        $request->validate([

            'inventory_receive_no'=>'required|unique:inventory_receives,inventory_receive_no,'.$inventory_receive->id,
            'receive_date'=>'required|date',
            'inventory_return_reason_id'=>'required|integer',
            'working_unit_id'=>'required|integer',
            'inventory_issue_no'=>'required|exists:inventory_issues',
            'inventory_requisition_no'=>'required|exists:inventory_requisitions',
            'products'=>'required|array',
            'remarks'=>'required'

        ]);

        $inventory_issue=\App\InventoryIssue::where('inventory_issue_no', $request->get('inventory_issue_no'))->first();

        $inventory_receive->fill($request->only(
            'inventory_receive_no',
            'working_unit_id',
            'product_status_id',
            'product_type_id',
            'remarks'
        ));

        $inventory_receive->receive_date=\Carbon\Carbon::parse($request->get('receive_date'));

        $inventory_receive->editor()->associate(\Auth::user());
        $inventory_receive->save();        
        $inventory_receive->return->inventory_return_reason_id=$request->get('inventory_return_reason_id');
        $inventory_receive->stocks()->delete();
        $inventory_receive->return->save();

        $products=$request->get('products');

        foreach($products as $row){

            $expiration_date=empty($row['expiration_date'])?NULL:\Carbon\Carbon::parse($row['expiration_date']);

            \App\Stock::create([
                'working_unit_id'=>$inventory_receive->working_unit_id,
                'product_id'=>$row['id'],
                'product_status_id'=>$row['return_status_id'],
                'product_type_id'=>$inventory_issue->product_type_id,
                'inventory_receive_id'=>$inventory_receive->id,
                'receive_quantity'=>$row['return_quantity'],
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


    public function destroy(ReceiveReturn $receiveReturn)
    {
        
    }
}
