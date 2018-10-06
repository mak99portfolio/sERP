<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\PurchaseOrder;
use App\ForeignRequisition;
use App\PurchaseOrderProformaInvoice;
use App\Port;
use App\Country;
use App\City;
use App\Vendor;
use App\PurchaseOrderItem;
use App\Http\Requests\ForeignPurchaseOrderRequest;
use Auth;
use Session;
use DB;
class PurchaseOrderController extends Controller
{

    private $view_root = 'modules/procurement/foreign/purchase_order/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('purchase_order_list', PurchaseOrder::all());
        return $view;
    }

    public function create()
    {

        $view = view($this->view_root . 'create');
        $view->with('requisition_list', ForeignRequisition::all());
        $view->with('port_list', Port::pluck('name','id')->prepend('-- Select Port --', ''));
        $view->with('country_list', Country::pluck('name','id')->prepend('-- Select Country --', ''));
        $view->with('vendor_list', Vendor::pluck('name','id')->prepend('-- Select Vendor --', ''));
        $view->with('city_list', City::pluck('name','id')->prepend('-- Select City --', ''));
        $view->with('last_purchase_order',PurchaseOrder::orderBy('id', 'desc')->first());
        return $view;
    }

    public function store(ForeignPurchaseOrderRequest $request)
    {
        // dd();
        // $request->validate([
            // 'foreign_requisition_id'=>'required',
            // 'purchase_order_no'=>'required',
            // 'vendor_id'=>'required',
            // 'requisition_date'=>'required',
            // 'purchase_order_date'=>'required',
            // 'port_of_loading_port_id'=>'required',
            // 'port_of_discharge_port_id'=>'required',
            // 'final_destination_country_id'=>'required',
            // 'final_destination_city_id'=>'required',
            // 'origin_of_goods_country_id'=>'required',
            // 'payment_type'=>'required',
            // 'pre_carriage_by'=>'required',
            // 'subject'=>'required',
            // 'letter_header'=>'required',
            // 'letter_footer'=>'required',
        // ]);
        $purchase_order = new PurchaseOrder;
        $purchase_order->fill($request->input());
        $purchase_order->creator_user_id = Auth::id();
        // $purchase_order->purchase_order_no = time();
        $purchase_order->generate_purchase_order_number();
        $purchase_order->save();
        $requisitions = Array();


        // foreach($request->foreign_requisition_ids as $foreign_requisition_id){
        //     array_push($requisitions, new ForeignRequisitionPurchaseOrder([
        //         'foreign_requisition_id' => $foreign_requisition_id
        //     ]));
        // }
        $purchase_order->foreign_requisitions()->sync($request->foreign_requisition_ids);
        $items = Array();
        foreach($request->items as $item){
            array_push($items, new PurchaseOrderItem($item));
        }
        $purchase_order->items()->saveMany($items);

        Session::put('alert-success', 'Purchase order created successfully'. '<br><strong>Requisition No: ' . $purchase_order->purchase_order_no . '</strong>');
        return redirect()->route('purchase-order.index');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {

        $view = view($this->view_root . 'show');
        $view->with('purchaseOrder',$purchaseOrder);
        return $view;
    }


    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }


    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }


    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }

}
