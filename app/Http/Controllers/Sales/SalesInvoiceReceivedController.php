<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesInvoiceReceivedController extends Controller{

    protected function path(string $suffix){
        return "modules.sales.invoice_received.{$suffix}";
    }

    public function index(){

        $data=[
            'sales_invoice_receiveds'=>\App\SalesInvoiceReceived::all()
        ];

        return view($this->path('index'), $data);
        
    }


    public function create(){

        return view($this->path('create'));
        
    }


    public function store(Request $request){

        /*
        \Log::info(print_r($request->all(), true));
        die;
        */

        $validation = \Validator::make($request->all(),[ 
            'customer_id'=>'required|integer|exists:customers,id',
            'sales_invoice_id'=>'required|integer|exists:sales_invoices,id',
            'sales_invoice_amount'=>'required|numeric|min:1',
            'sales_invoice_received_date'=>'required|date',
            'remarks'=>'required|max:255'
        ]);

        if($validation->fails()){

            return response()->json($validation->errors(), 422);

        }else{

            $sales_invoice_received=new \App\SalesInvoiceReceived;
            $sales_invoice_received->fill($request->all());
            $sales_invoice_received->creator()->associate(\Auth::user());
            $sales_invoice_received->save();

            $sales_invoice=\App\SalesInvoice::find($request->sales_invoice_id);
            $sales_invoice->sales_invoice_status='delivered';
            $sales_invoice->save();

            foreach($sales_invoice->items as $row){

                $sales_challan_booking_distribution=\App\SalesChallanBookingDistribution::where([
                    'product_id'=>$row->product_id,
                    'sales_challan_id'=>$sales_invoice->sales_challan_id
                ])->first();

                \App\Stock::create([

                    'working_unit_id'=>$sales_challan_booking_distribution->working_unit_id,
                    'sales_challan_id'=>$sales_invoice->sales_challan_id,
                    'product_id'=>$row->product_id,
                    'product_status_id'=>1,
                    'product_type_id'=>1,
                    'released_quantity'=>($row->invoice_quantity + $row->bonus_quantity)

                ]);
            }

            return response()->json('Sales invoice status updated successfully!.', 201);

        }
        
    }

    public function show(\App\SalesInvoice $sales_invoice){
        
    }

    public function edit(\App\SalesInvoice $sales_invoice){
        
    }

    public function update(Request $request, \App\SalesInvoice $sales_invoice){
        
    }

    public function destroy(\App\SalesInvoice $sales_invoice){
        
    }
}
