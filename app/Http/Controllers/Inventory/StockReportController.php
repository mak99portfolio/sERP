<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class StockReportController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.stock_report.{$suffix}";
    }

    public function index(){

        $physical_quantity=\App\Stock::all()->sum('receive_quantity') - \App\Stock::all()->sum('issue_quantity');

        $intransit_quantity=\App\InventoryIssueItem::whereHas('issue', function($query){

            $query->whereNotNull('final_approver_id')->doesntHave('receive');

        })->get()->sum('requested_quantity');

        $pending_quantity=\App\InventoryIssueItem::whereHas('issue', function($query){

            $query->whereNull('final_approver_id');

        })->get()->sum('requested_quantity');

        $data=[
            'working_units'=>\App\WorkingUnit::pluck('name', 'id')->prepend('All Working Unit', ''),
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id')->prepend('All Status', ''),
            'product_types'=>\App\ProductType::pluck('name', 'id')->prepend('All Type', ''),
            'products'=>\App\Product::pluck('name', 'id')->prepend('All Products', ''),
            'physical_quantity'=>$physical_quantity,
            'intransit_quantity'=>$intransit_quantity,
            'pending_quantity'=>$pending_quantity,
            'total_quantity'=>$physical_quantity+$intransit_quantity+$pending_quantity
        ];

        //dd($data);

        return view($this->path('index'), $data);
        
    }


    public function create(){
        
    }


    public function store(Request $request){

        //dd($request->all());

        $fields=[
            "working_unit_id",
            "product_id",
            "product_status_id",
            "product_type_id"
        ];

        $filters=[];

        foreach($fields as $field){
            
            if(empty($request->get($field))) continue;
            $filters[$field]=$request->get($field);

        }

        //dd($filters);

        if(empty($filters)){

            $physical_quantity=\App\Stock::all()->sum('receive_quantity') - \App\Stock::all()->sum('issue_quantity');

            $intransit_quantity=\App\InventoryIssueItem::whereHas('issue', function($query){

                $query->whereNotNull('final_approver_id')->doesntHave('receive');

            })->get()->sum('requested_quantity');

            $pending_quantity=\App\InventoryIssueItem::whereHas('issue', function($query){

                $query->whereNull('final_approver_id');

            })->get()->sum('requested_quantity');

        }else{

            $physical_quantity=\App\Stock::where($filters)->get()->sum('receive_quantity') - \App\Stock::where($filters)->get()->sum('issue_quantity');

            $intransit_quantity=\App\InventoryIssueItem::whereHas('issue', function($query) use($filters){

                if(empty($filters['working_unit_id'])) $query->whereNotNull('final_approver_id')->doesntHave('receive');
                else{

                    $query->whereNotNull('final_approver_id')->doesntHave('receive')->whereHas('requisition', function($query) use($filters){

                        $query->where('sender_working_unit_id', $filters['working_unit_id']);

                    });

                }

            });

            foreach($filters as $key=>$value){

                if($key=='working_unit_id') continue;
                $intransit_quantity=$intransit_quantity->where($key, $value);
                
            }

            //dd($intransit_quantity->toSql());

            $intransit_quantity=$intransit_quantity->get()->sum('requested_quantity');

            $pending_quantity=\App\InventoryIssueItem::whereHas('issue', function($query) use($filters){

                if(empty($filters['working_unit_id'])) $query->whereNull('final_approver_id');
                else{

                    $query->whereNull('final_approver_id')->whereHas('requisition', function($query) use($filters){

                        $query->where('sender_working_unit_id', $filters['working_unit_id']);

                    });

                }

            });

            foreach($filters as $key=>$value){

                if($key=='working_unit_id') continue;
                $pending_quantity=$pending_quantity->where($key, $value);
                
            }

            $pending_quantity=$pending_quantity->get()->sum('requested_quantity');

        }

        $data=[
            'working_units'=>\App\WorkingUnit::pluck('name', 'id')->prepend('All Working Unit', ''),
            'product_statuses'=>\App\ProductStatus::pluck('name', 'id')->prepend('All Status', ''),
            'product_types'=>\App\ProductType::pluck('name', 'id')->prepend('All Type', ''),
            'products'=>\App\Product::pluck('name', 'id')->prepend('All Products', ''),
            'physical_quantity'=>$physical_quantity,
            'intransit_quantity'=>$intransit_quantity,
            'pending_quantity'=>$pending_quantity,
            'total_quantity'=>$physical_quantity+$intransit_quantity+$pending_quantity
        ];

        Input::flash();
        return view($this->path('index'), $data);
        
    }


    public function show($id){
        
    }


    public function edit($id){
        
    }


    public function update(Request $request, $id){
        
    }


    public function destroy($id){
        
    }
}
