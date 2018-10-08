<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Paginate;

class StatusAdjustmentController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.status_adjustment.{$suffix}";
    }

    public function index(){

        $working_unit=\Auth::user()->working_unit();
        $status_adjustments=\App\InventoryStatusAdjustment::where('working_unit_id', $working_unit->id);
        
        $data=[
            'paginate'=>new Paginate($status_adjustments, ['inventory_status_adjustment_no'=>'Adjustment No', 'product_id'=>'Product ID', 'quantity'=>'Quantity', 'date'=>'Date']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $working_unit=\Auth::user()->working_unit();

        $data=[
            'status_adjustment'=>new \App\InventoryStatusAdjustment,
            'inventory_status_adjustment_no'=>uCode('inventory_status_adjustments.inventory_status_adjustment_no', 'ISA00'),
            'working_units'=>\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id'),
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'),
            'product_types'=>\App\ProductType::pluck('name', 'id')
        ];

        return view($this->path('create'), $data);
        
    }

    public function store(Request $request){

        \Session::put('vue_inputs', [
            'id'=>$request->get('product_id'),
            'name'=>$request->get('name'),
            'stock'=>$request->get('stock'),
            'quantity'=>$request->get('quantity')
        ]);

        $request->validate([

            'inventory_status_adjustment_no'=>'required|unique:inventory_status_adjustments,inventory_status_adjustment_no',
            'date'=>'required|date',
            'working_unit_id'=>'required|integer',
            'selected_type_id'=>'required|integer',
            'selected_status_id'=>'required|integer',
            'name'=>'required',
            'product_id'=>'required|integer',
            'stock'=>'required|integer',
            'adjusted_status_id'=>'required|integer|different:selected_status_id',
            'quantity'=>'required|integer',
            'remarks'=>'required',

        ]);

        $status_adjustment=\App\InventoryStatusAdjustment::create($request->except('name', 'stock', 'date'));
        $status_adjustment->date=\Carbon\Carbon::parse($request->get('date'));
        $status_adjustment->creator()->associate(\Auth::user());
        $status_adjustment->save();

        \App\Stock::create([
            'status_adjustment_id'=>$status_adjustment->id,
            'working_unit_id'=>$status_adjustment->working_unit_id,
            'product_id'=>$status_adjustment->product_id,
            'product_status_id'=>$status_adjustment->selected_status_id,
            'product_type_id'=>$status_adjustment->selected_type_id,
            'issue_quantity'=>$status_adjustment->quantity,
            'remarks'=>$status_adjustment->remarks,
            'creator_user_id'=>\Auth::id()
        ]);

        \App\Stock::create([
            'status_adjustment_id'=>$status_adjustment->id,
            'working_unit_id'=>$status_adjustment->working_unit_id,
            'product_id'=>$status_adjustment->product_id,
            'product_status_id'=>$status_adjustment->adjusted_status_id,
            'product_type_id'=>$status_adjustment->selected_type_id,
            'receive_quantity'=>$status_adjustment->quantity,
            'remarks'=>$status_adjustment->remarks,
            'creator_user_id'=>\Auth::id()
        ]);

        \Session::forget('vue_inputs');
        return back()->with('success', 'Form submitted successfully!.');
  
    }


    public function show(\App\InventoryStatusAdjustment $status_adjustment){

        $data=[
            'status_adjustment'=>$status_adjustment,
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('show'), $data);

    }


    public function edit(\App\InventoryStatusAdjustment $status_adjustment){

        return redirect()->route('status-adjustment.index');
        
        $data=[
            'status_adjustment'=>$status_adjustment,
            'inventory_status_adjustment_no'=>$status_adjustment->inventory_status_adjustment_no,
            'working_units'=>\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id'),
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'),
            'product_types'=>\App\ProductType::pluck('name', 'id')
        ];

        \Session::put('vue_inputs', [
            'id'=>$status_adjustment->product_id,
            'name'=>$status_adjustment->product->name,
            'stock'=>0,
            'quantity'=>$request->get('quantity')
        ]);

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\InventoryStatusAdjustment $status_adjustment){

        return redirect()->route('status-adjustment.index');

    }


    public function destroy($id){
        
    }

    public function product_info_for_adjusment(
        \App\WorkingUnit $working_unit,
        \App\ProductType $selected_type,
        \App\ProductStatus $selected_status,
        string $slug
    ){

        $product=\App\Product::where('hs_code', $slug)->orWhere('name', $slug)->first();

        if($product){

            $receive_quantity=\App\Stock::where([
                'working_unit_id'=>$working_unit->id,
                'product_id'=>$product->id,
                'product_status_id'=>$selected_status->id,
                'product_type_id'=>$selected_type->id
            ])->sum('receive_quantity');

            $issue_quantity=\App\Stock::where([
                'working_unit_id'=>$working_unit->id,
                'product_id'=>$product->id,
                'product_status_id'=>$selected_status->id,
                'product_type_id'=>$selected_type->id
            ])->sum('issue_quantity');

            return response()->json([
                'id'=>$product->id,
                'name'=>$product->name,
                'stock'=>($receive_quantity - $issue_quantity),
                'quantity'=>''
            ]);

        }

        return response()->json(null, 404);

    }

}
