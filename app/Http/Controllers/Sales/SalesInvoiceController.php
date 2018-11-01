<?php

namespace App\Http\Controllers\Sales;

use App\SalesInvoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesInvoiceController extends Controller{

    protected function path(string $suffix){
        return "modules.sales.invoice.{$suffix}";
    }

    public function index(){

        $data=[
            'sales_invoices'=>\App\SalesInvoice::all()
        ];

        return view($this->path('index'), $data);

    }

    public function create(){

        return view($this->path('create'));

    }

    public function ui(){
        return view($this->path('ui'));
    }

    public function store(Request $request){

        /*
        \Log::info(print_r($request->all(), true));
        die;
        */

        $validation = \Validator::make($request->all(),[ 
            'customer_id'=>'required|integer|exists:customers,id',
            'sales_challan_id'=>'required|integer|exists:sales_challans,id',
            'invoice_date'=>'required|date',
            'invoice_address_id'=>'required|integer|exists:customer_addresses,id',
            'gate_pass_id'=>'required|integer|exists:gate_passes,id',
            'shipping_address_id'=>'required|integer|exists:customer_addresses,id',
            'delivery_person_id'=>'required|integer|exists:employee_profiles,id',
            'delivery_vehicles'=>'required|array',
            'sales_invoice_items'=>'required|array',
            'total_quantity'=>'required|numeric|min:0',
            'total_amount'=>'required|numeric|min:0',
            'total_vat'=>'required|numeric|min:0',
            'total_discount'=>'required|numeric|min:0',
            'grand_total'=>'required|numeric|min:0'
        ]);

        if($validation->fails()){

            return response()->json($validation->errors(), 422);

        }else{

            $sales_invoice=new \App\SalesInvoice;

            $sales_invoice->fill($request->only(
                'customer_id',
                'sales_challan_id',
                'invoice_address_id',
                'gate_pass_id',
                'shipping_address_id',
                'delivery_person_id',
                'total_quantity',
                'total_amount',
                'total_vat',
                'total_discount',
                'extra_discount',
                'grand_total',
                'invoiced_amount'
            ));

            $sales_invoice->sales_invoice_no=uCode('sales_invoices.sales_invoice_no', 'INV00');
            $sales_invoice->sales_invoice_status='in_transit';
            $sales_invoice->sales_invoice_date=\Carbon\Carbon::parse($request->get('invoice_date'));
            $sales_invoice->creator()->associate(\Auth::user());
            $sales_invoice->save();
            $sales_invoice->vehicles()->createMany($request->delivery_vehicles);
            $sales_invoice->save();
            $sales_invoice->items()->createMany($request->sales_invoice_items);
            $sales_invoice->save();

            return response()->json('Sales challan  created successfully!.', 201);

        }

    }

    public function show(\App\SalesInvoice $sales_invoice){

        $data=[
            'sales_invoice'=>$sales_invoice,
            'carbon'=>new \Carbon\Carbon,
            'sales_order_items'=>new \App\SalesOrderItem,
            'sales_challan_items'=>new \App\SalesChallanItem,
            'sales_invoice_items'=>new \App\SalesInvoiceItem,
            'sales_order_ids'=>$sales_invoice->sales_challan->sales_orders->pluck('id')
        ];

        return view($this->path('show'), $data);
        
    }

    public function edit(SalesInvoice $salesInvoice){
        
    }

    public function update(Request $request, SalesInvoice $salesInvoice){
        
    }

    public function destroy(SalesInvoice $salesInvoice){
        
    }

    public function sales_challan_items(\App\SalesChallan $sales_challan){

        $challan_items=\App\SalesChallanItem::with([
            'sales_challan',
            'sales_order',
            'product'=>function($query){
                $query->with('unit_of_measurement');
            }
        ])->where(
            'sales_challan_id',
            $sales_challan->id
        )->get()->toArray();

        //return $challan_items->toArray();

        //$invoiced_items=\App\SalesInvoiceItem::where('sales_challan_id', $sales_challan->id)->get();

        foreach($challan_items as $index=>$row) {

            $sales_order_quantity=\App\SalesOrderItem::whereIn('sales_order_id', $sales_challan->sales_orders->pluck('id'))->where('product_id', $row['product_id'])->sum('quantity');
            
            $bonus_quantity=\App\SalesOrderItem::where(['sales_order_id'=>$row['sales_order_id'], 'product_id'=>$row['product_id']])->sum('bonus_quantity');
            $discount_amount=\App\SalesOrderItem::where(['sales_order_id'=>$row['sales_order_id'], 'product_id'=>$row['product_id']])->sum('discount');
            $unit_price=\App\SalesOrderItem::where(['sales_order_id'=>$row['sales_order_id'], 'product_id'=>$row['product_id']])->first()->unit_price;

            $pending_bonus_quantity=$bonus_quantity - \App\SalesInvoiceItem::where(['sales_challan_id'=>$sales_challan->id, 'product_id'=>$row['product_id']])->sum('bonus_quantity');

            $pending_product_quantity=$row['challan_quantity'] - \App\SalesInvoiceItem::where(['sales_challan_id'=>$sales_challan->id, 'product_id'=>$row['product_id']])->sum('invoice_quantity');

            $challan_items[$index]['sales_order_quantity']=$sales_order_quantity;
            $challan_items[$index]['sales_order_bonus_quantity']=$bonus_quantity;
            $challan_items[$index]['pending_bonus_quantity']=$pending_bonus_quantity; //need to excluding previous allocated bonus quantity
            $challan_items[$index]['bonus_quantity']='';
            $challan_items[$index]['pending_product_quantity']=$pending_product_quantity;
            $challan_items[$index]['sales_order_discount']=$discount_amount;
            $challan_items[$index]['discount_amount']=0;
            $challan_items[$index]['unit_price']=$unit_price;

        }

        return $challan_items;

    }

    public function sales_challan_vehicle(\App\SalesChallan $sales_challan){

        return $sales_challan->vehicles;

    }

    public function invoiced_amount(\App\SalesChallan $sales_challan){

        return $sales_challan->invoices->sum('grand_total');

    }

}
