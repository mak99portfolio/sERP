<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Requisition;
use Illuminate\Http\Request;
use App\Helpers\Paginate;

class RequisitionController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.requisition.{$suffix}";
    }

    public function index(){


        $data=[
            'paginate'=>new Paginate('\App\InventoryRequisition', ['inventory_requisition_id'=>'Requisition No']),
            'carbon'=>new \Carbon\Carbon
        ];

        //dd($data['paginate']);

        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[
            'inventory_requisition'=>new \App\InventoryRequisition,
            'requisition_no'=>uCode('inventory_requisitions.inventory_requisition_id', 'IR'),
            'inventory_requisition_types'=>\App\InventoryRequisitionType::pluck('name', 'id'),
            'working_units'=>\App\WorkingUnit::pluck('name', 'id'),
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'),
            'product_patterns'=>\App\ProductPattern::pluck('name', 'id')
        ];

        //dd($data);

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){
        
        \Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_requisition_id'=>'required|unique:inventory_requisitions',
            'inventory_requisition_type_id'=>'required|integer',
            'sender_depot_id'=>'required|integer',
            'requested_depot_id'=>'required|integer',
            'product_status_id'=>'required|integer',
            'product_pattern_id'=>'required|integer',
            'date'=>'required|date',
            'products'=>'required|array'
        ]);

        $requisition=\App\InventoryRequisition::create($request->except('products', 'date'));
        $requisition->date=\Carbon\Carbon::parse($request->get('date'))->toDateString();
        $requisition->initial_approver()->associate(\Auth::user());
        $requisition->creator()->associate(\Auth::user());
        $requisition->save();

        $products=$request->get('products');

        foreach($products as $id=>$quantity){
            
            $product=\App\Product::find($id);

            \App\InventoryRequisitionItem::create([
                'inventory_requisition_id'=>$requisition->id,
                'product_id'=>$product->id,
                'requested_quantity'=>$quantity,
                'product_status_id'=>$requisition->product_status_id,
                'product_pattern_id'=>$requisition->product_pattern_id
            ]);

        }

        \Session::forget('vue_products');
        return back()->with('success', 'Form submitted successfully!.');

    }


    public function show(\App\InventoryRequisition $requisition){
        
    }


    public function edit(\App\InventoryRequisition $requisition){

        $data=[
            'inventory_requisition'=>$requisition,
            'requisition_no'=>$requisition->inventory_requisition_id,
            'inventory_requisition_types'=>\App\InventoryRequisitionType::pluck('name', 'id'),
            'working_units'=>\App\WorkingUnit::pluck('name', 'id'),
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'),
            'product_patterns'=>\App\ProductPattern::pluck('name', 'id'),
        ];

        $products=[];

        foreach($requisition->requested_items as $row){
            $products[$row->product_id]=$row->requested_quantity;
        }

        //dd($requisition->requested_items);

        \Session::put('vue_products', $products);

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\InventoryRequisition $requisition){

        \Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_requisition_id'=>'required|unique:inventory_requisitions,inventory_requisition_id,'.$requisition->id,
            'inventory_requisition_type_id'=>'required|integer',
            'sender_depot_id'=>'required|integer',
            'requested_depot_id'=>'required|integer',
            'product_status_id'=>'required|integer',
            'product_pattern_id'=>'required|integer',
            'date'=>'required|date',
            'products'=>'required|array'
        ]);

        $requisition->fill($request->except('products', 'date'));
        $requisition->date=\Carbon\Carbon::parse($request->get('date'))->toDateString();
        //need to filter according to the user permission
        $requisition->final_approver()->associate(\Auth::user());
        $requisition->creator()->associate(\Auth::user());
        $requisition->requested_items()->delete();

        $issue=\App\InventoryIssue::create([]);
        $requisition->issue()->save($issue);

        $requisition->save();

        $products=$request->get('products');

        foreach($products as $id=>$quantity){
            
            $product=\App\Product::find($id);

            \App\InventoryRequisitionItem::create([
                'inventory_requisition_id'=>$requisition->id,
                'product_id'=>$product->id,
                'requested_quantity'=>$quantity,
                'product_status_id'=>$requisition->product_status_id,
                'product_pattern_id'=>$requisition->product_pattern_id
            ]);

            \App\InventoryIssueItem::create([
                'inventory_issue_id'=>$issue->id,
                'product_id'=>$product->id,
                'requested_quantity'=>$quantity,
                'product_status_id'=>$requisition->product_status_id,
                'product_pattern_id'=>$requisition->product_pattern_id
            ]);

        }

        \Session::forget('vue_products');
        return redirect()->route('requisition.index')->with('success', 'Form submitted successfully!.');

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

    public function vue_old_products(Request $request, \App\WorkingUnit $working_unit){

        //dd(Session::get('vue_products'));

        $products=\Session::pull('vue_products');

        if($products){

            $data=[];

            foreach($products as $id=>$quantity){
                
                $product=\App\Product::find($id);
                
                array_push($data, [
                    'id'=>$id,
                    'hs_code'=>$product->hs_code,
                    'name'=>$product->name,
                    'stock'=>stock_balance($working_unit, $product),
                    'quantity'=>$quantity
                ]);

            }

            return response()->json($data);

        }

        return response()->json(null, 404);

    }

}
