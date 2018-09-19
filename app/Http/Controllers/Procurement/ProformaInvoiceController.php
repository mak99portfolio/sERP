<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\ProformaInvoice;
use App\PurchaseOrder;
use App\ProformaInvoiceItem;
use App\Port;
use App\Country;
use App\City;
use App\Vendor;
use Illuminate\Http\Request;
use Auth;
use Session;

class ProformaInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/proforma_invoice/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('proforma_invoice_list', ProformaInvoice::all());
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('purchase_orders', PurchaseOrder::all());
        $view->with('port_list', Port::pluck('name','id')->prepend('-- Select Port --', ''));
        $view->with('country_list', Country::pluck('name','id')->prepend('-- Select Country --', ''));
        $view->with('vendor_list', Vendor::pluck('name','id')->prepend('-- Select Country --', ''));
        $view->with('city_list', City::pluck('name','id')->prepend('-- Select City --', ''));
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'purchase_order_no'=>'required',
            'purchase_order_date'=>'required',
            // 'proforma_invoice_no'=>'required',
            'proforma_invoice_date'=>'required',
            // 'proforma_invoice_receive_date'=>'required',
            // 'vendor_id'=>'required',
            // 'port_of_loading_port_id'=>'required',
            // 'port_of_discharge_port_id'=>'required',
            // 'country_of_final_destination_country_id'=>'required',
            // 'final_destination_country_id'=>'required',
            // 'country_of_origin_of_goods_country_id'=>'required',
            // 'shipment_allow'=>'required',
            // 'payment_type'=>'required',
            // 'pre_carriage_by'=>'required',
            // 'customer_code'=>'required',
            // 'consignee'=>'required',
            // 'beneficiary_bank_info'=>'required',
            // 'notes'=>'required',
        ]);
        $proforma_invoice = new ProformaInvoice;
        $proforma_invoice->fill($request->input());
        $proforma_invoice->creator_user_id = Auth::id();
        $proforma_invoice->proforma_invoice_no = time();
        // dd($request->input());
        $proforma_invoice->save();
        $items = Array();
        foreach($request->items as $item){
            array_push($items, new ProformaInvoiceItem($item));
        }
        $proforma_invoice->items()->saveMany($items);
        Session::put('alert-success', 'Proforma invoice created successfully');
        return redirect()->route('proforma-invoice.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProformaInvoice  $proformaInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(ProformaInvoice $proformaInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProformaInvoice  $proformaInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(ProformaInvoice $proformaInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProformaInvoice  $proformaInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProformaInvoice $proformaInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProformaInvoice  $proformaInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProformaInvoice $proformaInvoice)
    {
        //
    }
    public function getPOByPOId($id){
        $po = PurchaseOrder::find($id);
        // dd($po);
        $items = $po->items;
        foreach($items as $item){
            $data[] = [
                'product_id' => $item->product->id,
                'name' => $item->product->name,
                'hs_code' => $item->product->hs_code,
                'uom' => $item->product->unit_of_measurement->name,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price,
            ];
        }
        return response()->json($data);
    }
}
