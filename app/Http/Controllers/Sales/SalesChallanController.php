<?php

namespace App\Http\Controllers\Sales;

use App\SalesChallan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesChallanController extends Controller
{
    private $view_root = 'modules/sales/challan/';

    public function index(){

        $view = view($this->view_root . 'index');
        return $view;

    }

    public function create(){

        $view = view($this->view_root . 'create');
        return $view;

    }


    public function store(Request $request){

        \Log::info(print_r($request->all(), true));

        $validation = \Validator::make($request->all(),[ 
            'customer_id'=>'required|integer|exists:customers,id',
            'sales_orders'=>'required|array',
            'challan_date'=>'required|date',
            'mushak_number_id'=>'required|integer|exists:mushak_numbers,id',
            'delivery_person_id'=>'required|integer|exists:employee_profiles,id',
            'delivery_vehicles'=>'required|array',
            'sales_order_items'=>'required|array',
            'shipping_address_id'=>'required|integer|exists:customer_addresses,id',
            'total_challan_quantity'=>'required|numeric|min:1'
        ]);

        if($validation->fails()){

            return response()->json($validation->errors(), 422);

        }else{

            $sales_challan=new \App\SalesChallan;
            $sales_challan->sales_challan_no=uCode('sales_challans.sales_challan_no', 'SCLN00');
            $sales_challan->creator()->associate(\Auth::user());
            $sales_challan->challan_date=\Carbon\Carbon::parse($request->get('challan_date'));

            $sales_challan->fill($request->only(
                'customer_id',
                //'challan_date',
                'mushak_id',
                'delivery_person_id',
                'shipping_address_id'
            ));

            //dd($request->only('delivery_vehicles'));

            $sales_challan->save();
            $sales_challan->vehicles()->createMany($request->get('delivery_vehicles'));
            $sales_challan->save();

            foreach($request->get('sales_order_items') as $row){

                $sales_challan->items()->createMany($row['items']);
                
            }

            $sales_challan->save();

            return response()->json('Sales challan  created successfully!.', 201);

        }


    }


    public function show(SalesChallan $salesChallan){

        //

    }


    public function edit(SalesChallan $salesChallan){

        //

    }

    public function update(Request $request, SalesChallan $salesChallan){

        //

    }


    public function destroy(SalesChallan $salesChallan){

        //

    }

    public function sales_orders(\App\Customer $customer){

        return $customer->sales_orders;

    }

    public function delivery_persons(){

        return \App\EmployeeProfile::whereHas('organizational_information', function($query){
            $query->whereHas('designation', function($query){
                $query->whereIn('name', ['Depo Admin', 'Depo User']);
            });
        })->get();

    }

    public function sales_orders_items(){
        return \App\SalesOrder::whereIn('id', request()->all())->with(['items'=>function($query){
            $query->with('product');
        }])->get();
    }

}
