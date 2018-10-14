<?php

namespace App\Http\Controllers\Inventory;  use App\Http\Controllers\Controller;

use App\ReceiveInternal;
use Illuminate\Http\Request;

class ReceiveInternalController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.receive.internal.{$suffix}";
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
            'product_types'=>\App\ProductType::pluck('name', 'id'), //Need to filter in future
        ];
        
        return view($this->path('create'), $data);
        
    }

    public function store(Request $request){

        //dd($request->all());

        \Session::put('vue_inputs', [
            'inventory_requisition_no'=>$request->get('inventory_requisition_no'),
            'receive_from'=>$request->get('receive_from'),
            'inventory_issue_id'=>$request->get('inventory_issue_id'),
        ]);

        \Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_receive_no'=>'required|unique:inventory_receives',
            'receive_date'=>'required|date',
            'working_unit_id'=>'required|integer',
            'product_status_id'=>'required|integer',
            'product_type_id'=>'required|integer',
            'products'=>'required|array',
            'inventory_issue_id'=>'required|integer'
        ]);

        $inventory_receive=\App\InventoryReceive::create($request->only(
            'inventory_receive_no',
            'working_unit_id',
            'product_status_id',
            'product_type_id',
            'remarks'
        ));

        $inventory_receive->receive_date=\Carbon\Carbon::parse($request->get('receive_date'));
        $inventory_receive->receive_type='internal_receive';
        $inventory_receive->creator()->associate(\Auth::user());
        $inventory_receive->save();


        $internal_receive=new \App\InventoryReceiveInternal;
        $inventory_issue=\App\InventoryIssue::find($request->get('inventory_issue_id'));
        $internal_receive->issue()->associate($inventory_issue);
        $internal_receive->inventory_receive()->associate($inventory_receive);
        $internal_receive->challan_no=$request->get('challan_no');
        $internal_receive->save();

        $products=$request->get('products');

        foreach($products as $row){

            $expiration_date=empty($row['expiration_date'])?NULL:\Carbon\Carbon::parse($row['expiration_date']);

            if(empty($row['return_quantity'])){

                \App\Stock::create([
                    'working_unit_id'=>$inventory_receive->working_unit_id,
                    'product_id'=>$row['id'],
                    'product_status_id'=>$inventory_receive->product_status_id,
                    'product_type_id'=>$inventory_receive->product_type_id,
                    'inventory_receive_id'=>$inventory_receive->id,
                    'receive_quantity'=>$row['quantity'],
                    'batch_no'=>$row['batch_no'],
                    'expiration_date'=>$expiration_date,
                    'remarks'=>$inventory_receive->remarks,
                    'creator_user_id'=>\Auth::id()
                ]);

            }else{

                $receive_quantity=$row['quantity']-$row['return_quantity'];
                \App\Stock::create([
                    'working_unit_id'=>$inventory_receive->working_unit_id,
                    'product_id'=>$row['id'],
                    'product_status_id'=>$inventory_receive->product_status_id,
                    'product_type_id'=>$inventory_receive->product_type_id,
                    'inventory_receive_id'=>$inventory_receive->id,
                    'receive_quantity'=>$receive_quantity,
                    'batch_no'=>$row['batch_no'],
                    'expiration_date'=>$expiration_date,
                    'remarks'=>$inventory_receive->remarks,
                    'creator_user_id'=>\Auth::id()
                ]);

                \App\InventoryIssueReturnItem::create([
                    'inventory_issue_id'=>$inventory_issue->id,
                    'product_id'=>$row['id'],
                    'product_status_id'=>$row['return_status_id'],
                    'product_type_id'=>$inventory_receive->product_type_id,
                    'return_quantity'=>$row['return_quantity'],
                    'batch_no'=>$row['batch_no'],
                    'expiration_date'=>$expiration_date
                ]);

            }

        }

        \Session::forget('vue_products');
        \Session::forget('vue_inputs');

        return back()->with('success', 'Form submitted successfully!.');
        
    }

    public function show(\App\InventoryReceive $receive_internal){

        $data=[
            'inventory_receive'=>$receive_internal,
            'carbon'=>new \Carbon\Carbon
        ];
        
        return view($this->path('show'), $data);
        
    }

    public function edit(\App\InventoryReceive $receive_internal){

        $working_unit=\Auth::user()->working_unit();

        $data=[
            'inventory_receive'=>$receive_internal,
            'inventory_receive_no'=>$receive_internal->inventory_receive_no,
            'working_units'=>\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id'), //Need to filter in future
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'), //Need to filter in future
            'product_types'=>\App\ProductType::pluck('name', 'id'), //Need to filter in future
        ];

        //dd($receive_foreign_purchase->stocks);

        $products=[];

        $related_issue=$receive_internal->internal->issue;//To sorten related model

        foreach($receive_internal->stocks as $row){

            $return_quantity=0;
            $return_status_id=1;

            if($related_issue->return_items()->exists()){
                $return_quantity=$related_issue->return_items()->where('product_id', $row->product_id)->first()->return_quantity;
                $return_status_id=$related_issue->return_items()->where('product_id', $row->product_id)->first()->product_status_id;
            }

            array_push($products, [
                'id'=>$row->product_id,
                'quantity'=>$related_issue->items()->where('product_id', $row->product_id)->first()->issued_quantity,
                'requisition_quantity'=>$related_issue->requisition->items()->where('product_id', $row->product_id)->first()->requested_quantity,
                'return_quantity'=>$return_quantity,
                'return_status_id'=>$return_status_id
            ]);

        }

        \Session::put('vue_products', $products);

        \Session::put('vue_inputs', [
            'inventory_requisition_no'=>$receive_internal->internal->issue->requisition->inventory_requisition_no,
            'receive_from'=>$receive_internal->internal->issue->requisition->requested_to->name,
            'inventory_issue_id'=>$receive_internal->internal->issue->id,
        ]);
        
        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\InventoryReceive $receive_internal){

        //dd($request->all());

        $inventory_receive=$receive_internal;

        \Session::put('vue_inputs', [
            'inventory_requisition_no'=>$request->get('inventory_requisition_no'),
            'receive_from'=>$request->get('receive_from'),
            'inventory_issue_id'=>$request->get('inventory_issue_id'),
        ]);

        \Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_receive_no'=>'required|unique:inventory_receives,inventory_receive_no,'.$inventory_receive->id,
            'receive_date'=>'required|date',
            'working_unit_id'=>'required|integer',
            'product_status_id'=>'required|integer',
            'product_type_id'=>'required|integer',
            'products'=>'required|array',
            'inventory_issue_id'=>'required|integer'
        ]);

        $inventory_receive->fill($request->only(
            'inventory_receive_no',
            'working_unit_id',
            'product_status_id',
            'product_type_id',
            'remarks'
        ));

        $inventory_receive->receive_date=\Carbon\Carbon::parse($request->get('receive_date'));
        //$inventory_receive->receive_type='internal_receive';
        $inventory_receive->editor()->associate(\Auth::user());

        $inventory_receive->internal->challan_no=$request->get('challan_no');
        $inventory_receive->internal->save();

        $inventory_receive->stocks()->delete();
        $inventory_receive->internal->issue->return_items()->delete();
        $inventory_receive->save();

        $products=$request->get('products');

        foreach($products as $row){

            if(empty($row['return_quantity'])){

                \App\Stock::create([
                    'working_unit_id'=>$inventory_receive->working_unit_id,
                    'product_id'=>$row['id'],
                    'product_status_id'=>$inventory_receive->product_status_id,
                    'product_type_id'=>$inventory_receive->product_type_id,
                    'inventory_receive_id'=>$inventory_receive->id,
                    'receive_quantity'=>$row['quantity'],
                    'remarks'=>$inventory_receive->remarks,
                    'creator_user_id'=>\Auth::id()
                ]);

            }else{

                $receive_quantity=$row['quantity']-$row['return_quantity'];
                \App\Stock::create([
                    'working_unit_id'=>$inventory_receive->working_unit_id,
                    'product_id'=>$row['id'],
                    'product_status_id'=>$inventory_receive->product_status_id,
                    'product_type_id'=>$inventory_receive->product_type_id,
                    'inventory_receive_id'=>$inventory_receive->id,
                    'receive_quantity'=>$receive_quantity,
                    'remarks'=>$inventory_receive->remarks,
                    'creator_user_id'=>\Auth::id()
                ]);

                \App\InventoryIssueReturnItem::create([
                    'inventory_issue_id'=>$inventory_receive->internal->issue->id,
                    'product_id'=>$row['id'],
                    'product_status_id'=>$row['return_status_id'],
                    'product_type_id'=>$inventory_receive->product_type_id,
                    'return_quantity'=>$row['return_quantity']
                ]);

            }

        }

        \Session::forget('vue_products');
        \Session::forget('vue_inputs');

        return back()->with('success', 'Form submitted successfully!.');

    }

    public function destroy(ReceiveInternal $receiveInternal){
        
    }
}
