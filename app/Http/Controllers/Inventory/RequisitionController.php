<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Requisition;
use Illuminate\Http\Request;
use App\Helpers\Paginate;
use App\Notifications\SimpleNotification;

class RequisitionController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.requisition.{$suffix}";
    }

    public function index(){

        $working_unit=\Auth::user()->working_unit();

        $inventory_requisitions=\App\InventoryRequisition::where('sender_working_unit_id', $working_unit->id);

        $data=[
            'paginate'=>new Paginate($inventory_requisitions, ['inventory_requisition_no'=>'Requisition No']),
            'carbon'=>new \Carbon\Carbon
        ];

        //dd($data['paginate']);

        return view($this->path('index'), $data);

    }

    public function incoming(){

        $working_unit=\Auth::user()->working_unit();

        $incoming_requisitions=\App\InventoryIssueRequest::where('requested_working_unit_id', $working_unit->id);

         $data=[
            'paginate'=>new Paginate($incoming_requisitions, ['inventory_requisition_no'=>'Requisition No']),
            'carbon'=>new \Carbon\Carbon
        ];

        //dd($data['paginate']);

        return view($this->path('incoming'), $data);

    }

    public function show_incoming(\App\InventoryIssueRequest $inventory_issue_request){

        $data=[
            'inventory_issue_request'=>$inventory_issue_request,
            'carbon'=>new \carbon\Carbon
        ];

        return view($this->path('show_incoming'), $data);

    }


    public function create(){

        $working_unit=\Auth::user()->working_unit();
        //$sender_working_units=\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id');
        $sender_unit_is_child=\App\WorkingUnit::where('id', $working_unit->id)->whereHas('type', function($query){
            $query->whereIn('name', ['Depot', 'Warehouse', 'Factory']);
        })->exists();

        if($sender_unit_is_child){

            $requested_working_units=\App\WorkingUnit::where('id', '<>', $working_unit->id)
            ->whereHas('type', function($query){

                $query->where('name', 'Central Depot');

            })->pluck('name', 'id');

        }else $requested_working_units=\App\WorkingUnit::where('id', '<>', $working_unit->id)->pluck('name', 'id');

        $data=[
            'inventory_requisition'=>new \App\InventoryRequisition,
            'requisition_no'=>uCode('inventory_requisitions.inventory_requisition_no', 'IR00'),
            'inventory_requisition_types'=>\App\InventoryRequisitionType::pluck('name', 'id'),
            'sender_working_units'=>\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id'),
            'requested_working_units'=>$requested_working_units,
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'),
            'product_types'=>\App\ProductType::pluck('name', 'id')
        ];

        //dd($data);

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        //dd($request->all());
        
        \Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_requisition_no'=>'required|unique:inventory_requisitions',
            'inventory_requisition_type_id'=>'required|integer',
            'sender_working_unit_id'=>'required|integer',
            'requested_working_unit_id'=>'required|integer|different:sender_working_unit_id',
            'product_status_id'=>'required|integer',
            'product_type_id'=>'required|integer',
            'date'=>'required|date',
            'products'=>'required|array'
        ]);

        if(!\Auth::user()->can('approve_initial_requisition')){
            return back()->withInput()->with('failed', 'Sorry!, you can\'t perform this action.');
        }

        $requisition=\App\InventoryRequisition::create($request->except('products', 'date'));
        $requisition->date=\Carbon\Carbon::parse($request->get('date'));
        $requisition->initial_approver()->associate(\Auth::user());
        $requisition->creator()->associate(\Auth::user());
        $requisition_status=\App\InventoryRequisitionStatus::where('code', 'pending')->first();
        $requisition->status()->associate($requisition_status);
        $requisition->save();

        $products=$request->get('products');

        foreach($products as $row){
            
            $product=\App\Product::find($row['id']);

            \App\InventoryRequisitionItem::create([
                'inventory_requisition_id'=>$requisition->id,
                'product_id'=>$product->id,
                'requested_quantity'=>$row['quantity'],
                'product_status_id'=>$requisition->product_status_id,
                'product_type_id'=>$requisition->product_type_id
            ]);

        }

        \Session::forget('vue_products');
        return redirect()->route('requisition.index')->with('success', 'Form submitted successfully!.');

    }


    public function show(\App\InventoryRequisition $requisition){

        $data=[
            'inventory_requisition'=>$requisition,
            'carbon'=>new \carbon\Carbon
        ];

        return view($this->path('show'), $data);
        
    }


    public function edit(\App\InventoryRequisition $requisition){

        $working_unit=\Auth::user()->working_unit();
        $sender_working_units=\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id');
        $requested_working_units=\App\WorkingUnit::where('id', '<>', $working_unit->id)->pluck('name', 'id');
        $requisition->date=\Carbon\Carbon::parse($requisition->date)->format('d-m-Y');

        $data=[
            'inventory_requisition'=>$requisition,
            'requisition_no'=>$requisition->inventory_requisition_no,
            'inventory_requisition_types'=>\App\InventoryRequisitionType::pluck('name', 'id'),
            'sender_working_units'=>$sender_working_units,
            'requested_working_units'=>$requested_working_units,
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'),
            'product_types'=>\App\ProductType::pluck('name', 'id'),
        ];

        $products=[];

        foreach($requisition->requested_items as $row){

            array_push($products, [
                'id'=>$row->product_id,
                'quantity'=>$row->requested_quantity
            ]);

        }

        //dd($requisition->requested_items);

        \Session::put('vue_products', $products);

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\InventoryRequisition $requisition){

        \Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_requisition_no'=>'required|unique:inventory_requisitions,inventory_requisition_no,'.$requisition->id,
            'inventory_requisition_type_id'=>'required|integer',
            'sender_working_unit_id'=>'required|integer',
            'requested_working_unit_id'=>'required|integer|different:sender_working_unit_id',
            'product_status_id'=>'required|integer',
            'product_type_id'=>'required|integer',
            'date'=>'required|date',
            'products'=>'required|array'
        ]);

        if(!\Auth::user()->can('approve_final_requisition')){
            return back()->withInput()->with('failed', 'Sorry!, you can\'t perform this action.');
        }

        $requisition->fill($request->except('products', 'date'));
        $requisition->date=\Carbon\Carbon::parse($request->get('date'));
        //need to filter according to the user permission
        $requisition->final_approver()->associate(\Auth::user());
        $requisition->creator()->associate(\Auth::user());
        $requisition->requested_items()->delete();

        $requisition_status=\App\InventoryRequisitionStatus::where('code', 'confirmed')->first();
        $requisition->status()->associate($requisition_status);
        $requisition->save();

        $issue_request=new \App\InventoryIssueRequest;
        $issue_request->requisition()->associate($requisition);
        $issue_request->sender()->associate($requisition->sender);
        $issue_request->requested_to()->associate($requisition->requested_to);
        $issue_request->save();

        $products=$request->get('products');

        foreach($products as $row){

            \App\InventoryRequisitionItem::create([
                'inventory_requisition_id'=>$requisition->id,
                'product_id'=>$row['id'],
                'requested_quantity'=>$row['quantity'],
                'product_status_id'=>$requisition->product_status_id,
                'product_type_id'=>$requisition->product_type_id
            ]);

            \App\InventoryIssueRequestItem::create([
                'inventory_issue_request_id'=>$issue_request->id,
                'product_id'=>$row['id'],
                'quantity'=>$row['quantity'],
                'product_status_id'=>$requisition->product_status_id,
                'product_type_id'=>$requisition->product_type_id
            ]);

        }

        $requested_working_unit=\App\WorkingUnit::find($request->get('requested_working_unit_id'));

        foreach($requested_working_unit->employees as $row){

            if(!empty($row->employee_profile->user)){

                $row->employee_profile->user->notify(
                    new SimpleNotification([
                        'subject'=>'Inventory Requisition',
                        'sender_id'=>$requisition->final_approver_id,
                        'url'=>route('requisition.incoming'),
                        'message'=>'An Inventory Requisition Requested To Your Working Unit'
                    ])
                );

            }
            
        }

        \Session::forget('vue_products');
        return redirect()->route('requisition.index')->with('success', 'Form submitted successfully!.');

    }


    public function destroy(Requisition $requisition){

        return back()->route('requisition.index');
        
    }

    public function get_product_info(\App\WorkingUnit $working_unit, \App\ProductStatus $product_status, \App\ProductType $product_type, string $slug){

        $product=\App\Product::where('hs_code', $slug)->orWhere('name', $slug)->first();

        //dd($product);

        if($product){

            return response()->json([
                'id'=>$product->id,
                'hs_code'=>$product->hs_code,
                'name'=>$product->name,
                'stock'=>stock_balance($working_unit, $product, [
                    'product_status_id'=>$product_status->id,
                    'product_type_id'=>$product_type->id
                ])
            ]);
        }

        return response()->json(null, 404);

    }

    public function get_batch_stock(\App\WorkingUnit $working_unit, \App\ProductStatus $product_status, \App\ProductType $product_type, \App\Product $product, string $slug){

        if($slug=='reset'){

            $stock_balance=stock_balance($working_unit, $product, [
                'product_status_id'=>$product_status->id,
                'product_type_id'=>$product_type->id
            ]);

        }else{

            $stock_balance=stock_balance($working_unit, $product, [
                'product_status_id'=>$product_status->id,
                'product_type_id'=>$product_type->id,
                'batch_no'=>$slug
            ]);

        }

        return response()->json($stock_balance);

    }

    public function get_product_info_for_adjustment(\App\WorkingUnit $working_unit, string $slug){

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

    public function vue_old_products(Request $request, \App\WorkingUnit $working_unit, \App\ProductStatus $product_status, \App\ProductType $product_type){

        //dd(Session::get('vue_products'));

        $products=\Session::pull('vue_products');

        //return response()->json($products);

        if($products){

            $data=[];

            foreach($products as $row){
                
                $product=\App\Product::find($row['id']);

                $temp=[
                    'id'=>$product->id,
                    'hs_code'=>$product->hs_code,
                    'name'=>$product->name,
                    'quantity'=>$row['quantity'],
                    'forward'=>empty($row['forward'])?0:$row['forward']
                ];

                if(empty($row['batch_no'])){

                    $temp['stock']=stock_balance($working_unit, $product, [
                        'product_status_id'=>$product_status->id,
                        'product_type_id'=>$product_type->id
                    ]);

                    $temp['batch_no']='';

                }else{

                    $temp['stock']=stock_balance($working_unit, $product, [
                        'product_status_id'=>$product_status->id,
                        'product_type_id'=>$product_type->id,
                        'batch_no'=>$row['batch_no']
                    ]);

                    $temp['batch_no']=$row['batch_no'];
                }

                $temp['expiration_date']=empty($row['expiration_date'])?'':$row['expiration_date'];
                
                array_push($data, $temp);

            }

            return response()->json($data);

        }

        return response()->json(null, 404);

    }

}
