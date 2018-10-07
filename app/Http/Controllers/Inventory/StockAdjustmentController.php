<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Paginate;

class StockAdjustmentController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.stock_adjustment.{$suffix}";
    }

    public function index(){

        $working_unit=\Auth::user()->working_unit();
        $stock_adjustments=\App\InventoryStockAdjustment::where('working_unit_id', $working_unit->id);
        
        $data=[
            'paginate'=>new Paginate($stock_adjustments, ['inventory_stock_adjustment_no'=>'Adjustment No', 'adjustment_type'=>'Adjustment Type']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $working_unit=\Auth::user()->working_unit();

        $data=[
            'stock_adjustment'=>new \App\InventoryRequisition,
            'stock_adjustment_no'=>uCode('inventory_stock_adjustments.inventory_stock_adjustment_no', 'ISA00'),
            'working_units'=>\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id'),
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'),
            'product_types'=>\App\ProductType::pluck('name', 'id'),
            'inventory_adjustment_purposes'=>\App\InventoryAdjustmentPurpose::pluck('name', 'id')
        ];

        //dd($data);

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        //dd($request->all());

        \Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_stock_adjustment_no'=>'required|unique:inventory_stock_adjustments',
            'adjustment_type'=>'required|in:stock_in,stock_out',
            'inventory_adjustment_purpose_id'=>'required|integer',
            'working_unit_id'=>'required|integer',
            'product_status_id'=>'required|integer',
            'product_type_id'=>'required|integer',
            'products'=>'required|array'
        ]);

        $stock_adjustment=\App\InventoryStockAdjustment::create($request->except('products'));
        $stock_adjustment->creator()->associate(\Auth::user());
        $stock_adjustment->save();

        $products=$request->get('products');

        foreach($products as $row){
            
            $product=\App\Product::find($row['id']);

            $receive_quantity=0;
            $issue_quantity=0;

            if($stock_adjustment->adjustment_type=='stock_in') $receive_quantity=$row['quantity'];
            elseif($stock_adjustment->adjustment_type=='stock_out') $issue_quantity=$row['quantity'];

            $expiration_date=empty($row['expiration_date'])?NULL:\Carbon\Carbon::parse($row['expiration_date']);

            \App\Stock::create([
                'working_unit_id'=>$stock_adjustment->working_unit_id,
                'stock_adjustment_id'=>$stock_adjustment->id,
                'product_id'=>$product->id,
                'product_status_id'=>$stock_adjustment->product_status_id,
                'product_type_id'=>$stock_adjustment->product_type_id,
                'creator_user_id'=>$stock_adjustment->creator_user_id,
                'receive_quantity'=>$receive_quantity,
                'issue_quantity'=>$issue_quantity,
                'batch_no'=>$row['batch_no'],
                'expiration_date'=>$expiration_date

            ]);

        }

        \Session::forget('vue_products');
        return back()->with('success', 'Form submitted successfully!.');

    }


    public function show($id){
        
    }


    public function edit(\App\InventoryStockAdjustment $stock_adjustment){

        $working_unit=\Auth::user()->working_unit();

        $data=[
            'stock_adjustment'=>$stock_adjustment,
            'stock_adjustment_no'=>$stock_adjustment->inventory_stock_adjustment_no,
            'working_units'=>\App\WorkingUnit::where('id', $working_unit->id)->pluck('name', 'id'),
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id'),
            'product_types'=>\App\ProductType::pluck('name', 'id'),
            'inventory_adjustment_purposes'=>\App\InventoryAdjustmentPurpose::pluck('name', 'id')
        ];

        $products=[];

        //dd($stock_adjustment->stocks);

        foreach($stock_adjustment->stocks as $row){

            if($stock_adjustment->adjustment_type=='stock_in'){

                array_push($products, [
                    'id'=>$row->product_id,
                    'quantity'=>$row->receive_quantity,
                    'batch_no'=>$row->batch_no,
                    'expiration_date'=>$row->expiration_date //\Carbon\Carbon::parse($row->expiration_date)->format('m/d/Y');
                ]);

            }elseif($stock_adjustment->adjustment_type=='stock_out'){

                array_push($products, [
                    'id'=>$row->product_id,
                    'quantity'=>$row->issue_quantity,
                    'batch_no'=>$row->batch_no,
                    'expiration_date'=>$row->expiration_date //\Carbon\Carbon::parse($row->expiration_date)->format('m/d/Y');
                ]);

            }
        }

        //dd($requisition->requested_items);

        \Session::put('vue_products', $products);

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\InventoryStockAdjustment $stock_adjustment){

        \Session::put('vue_products', $request->get('products'));

        $request->validate([
            'inventory_stock_adjustment_no'=>'required|unique:inventory_stock_adjustments,inventory_stock_adjustment_no,'.$stock_adjustment->id,
            'adjustment_type'=>'required|in:stock_in,stock_out',
            'inventory_adjustment_purpose_id'=>'required|integer',
            'working_unit_id'=>'required|integer',
            'product_status_id'=>'required|integer',
            'product_type_id'=>'required|integer',
            'products'=>'required|array'
        ]);

        $stock_adjustment->fill($request->except('products'));
        $stock_adjustment->editor()->associate(\Auth::user());
        $stock_adjustment->stocks()->delete();
        $stock_adjustment->save();

        $products=$request->get('products');

        foreach($products as $row){
            
            $product=\App\Product::find($row['id']);

            $receive_quantity=0;
            $issue_quantity=0;

            if($stock_adjustment->adjustment_type=='stock_in') $receive_quantity=$row['quantity'];
            elseif($stock_adjustment->adjustment_type=='stock_out') $issue_quantity=$row['quantity'];

            $expiration_date=empty($row['expiration_date'])?NULL:\Carbon\Carbon::parse($row['expiration_date']);

            \App\Stock::create([
                'working_unit_id'=>$stock_adjustment->working_unit_id,
                'stock_adjustment_id'=>$stock_adjustment->id,
                'product_id'=>$product->id,
                'product_status_id'=>$stock_adjustment->product_status_id,
                'product_type_id'=>$stock_adjustment->product_type_id,
                'creator_user_id'=>$stock_adjustment->creator_user_id,
                'receive_quantity'=>$receive_quantity,
                'issue_quantity'=>$issue_quantity,
                'batch_no'=>$row['batch_no'],
                'expiration_date'=>$expiration_date,
            ]);

        }

        \Session::forget('vue_products');
        return back()->with('success', 'Form submitted successfully!.');

    }

    public function destroy($id){
        
    }

}
