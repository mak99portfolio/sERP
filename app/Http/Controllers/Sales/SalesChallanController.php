<?php

namespace App\Http\Controllers\Sales;

use App\SalesChallan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesChallanController extends Controller{

    protected function path(string $suffix){
        return "modules.sales.challan.{$suffix}";
    }

    public function index(){

        $data=[
            'paginate'=>\App\SalesChallan::all()
        ];

        return view($this->path('index'), $data);

    }

    public function create(){

        return view($this->path('create'));

    }


    public function store(Request $request){

        //\Log::info(print_r($request->all(), true));

        $validation = \Validator::make($request->all(),[ 
            'customer_id'=>'required|integer|exists:customers,id',
            'sales_orders'=>'required|array',
            'challan_date'=>'required|date',
            'mushak_number_id'=>'required|integer|exists:mushak_numbers,id',
            'delivery_person_id'=>'required|integer|exists:employee_profiles,id',
            'delivery_vehicles'=>'required|array',
            'sales_order_items'=>'required|array',
            'shipping_address_id'=>'required|integer|exists:customer_addresses,id',
            'total_challan_quantity'=>'required|numeric|min:1',
            'sales_orders'=>'required|array'
        ]);

        if($validation->fails()){

            return response()->json($validation->errors(), 422);

        }else{

            $sales_challan=new \App\SalesChallan;
            $sales_challan->sales_challan_no=uCode('sales_challans.sales_challan_no', 'SCL00');
            $sales_challan->creator()->associate(\Auth::user());
            $sales_challan->challan_date=\Carbon\Carbon::parse($request->get('challan_date'));
            $sales_challan->sales_challan_status='pending';

            $sales_challan->fill($request->only(
                'customer_id',
                //'challan_date',
                'mushak_number_id',
                'delivery_person_id',
                'shipping_address_id'
            ));

            //dd($request->only('delivery_vehicles'));

            $sales_challan->save();

            $sales_challan->sales_orders()->sync($request->get('sales_orders'));
            $sales_challan->vehicles()->createMany($request->get('delivery_vehicles'));
            $sales_challan->save();

            foreach($request->get('sales_order_items') as $row){

                $sales_challan->items()->createMany($row['items']);
                
            }

            $sales_challan->save();

            return response()->json('Sales challan  created successfully!.', 201);

        }


    }


    public function show(SalesChallan $sales_challan){

        $data=[
            'sales_challan'=>$sales_challan,
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('show'), $data);

    }


    public function edit(SalesChallan $sales_challan){

        return back();

    }

    public function update(Request $request, SalesChallan $sales_challan){

        return back();

    }


    public function destroy(SalesChallan $sales_challan){

        return back();

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
