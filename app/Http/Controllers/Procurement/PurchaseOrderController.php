<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\PurchaseOrder;
use App\ForeignRequisition;
use App\Port;
use App\Country;
use App\Vendor;
use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/purchase_order/';
    public function index()
    {
        $view = view($this->view_root . 'index');
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
        $view->with('requisition_list', ForeignRequisition::all());
        $view->with('port_list', Port::pluck('name','id')->prepend('-- Select Port --', ''));
        $view->with('country_list', Country::pluck('name','id')->prepend('-- Select Country --', ''));
        $view->with('vendor_list', Vendor::pluck('name','id')->prepend('-- Select Country --', ''));
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
            'requisition_no'=>'required',
            'purchase_order_no'=>'required',
            'vendor_id'=>'required',
            'requisition_date'=>'required',
            'purchase_order_date'=>'required',
            'port_of_loading_port_id'=>'required',
            'port_of_discharge_port_id'=>'required',
            'country_of_final_destination_countru_id'=>'required',
            'final_destination_countru_id'=>'required',
            'country_of_origin_of_goods_countru_id'=>'required',
            'payment_type'=>'required',
            'pre_carriage_by'=>'required',
            'subject'=>'required',
            'letter_header'=>'required',
            'letter_footer'=>'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
