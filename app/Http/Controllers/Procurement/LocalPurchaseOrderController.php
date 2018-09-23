<?php

namespace App\Http\Controllers\Procurement;

use App\LocalRequisition;
use App\LocalPurchaseOrder;
use App\Vendor;
use App\LocalPurchaseOrderVendor;
use Illuminate\Http\Request;
use App\Helpers\Paginate;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class LocalPurchaseOrderController extends Controller
{
    private $view_root = 'modules/procurement/local/purchase_order/';
    public function search_msg(Request $request){
       $purchase_requisition_no = $request->purchase_requisition_no;
      // dd($purchase_requisition_no);
       $data['purchase_requisition_no']=$purchase_requisition_no;
       return response()->json($data);
   }
   public function index()
   {
       $view = view($this->view_root . 'index');
       $view->with('purchase_order_list', LocalPurchaseOrder::all());
       $view->with('carbon', new \Carbon\Carbon);
       return $view;
   }
   public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('requisition_list', LocalRequisition::all());
        $view->with('vendor_list', Vendor::pluck('name','id')->prepend('-- Select Vendor --', ''));
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
    //    dd($request->input());
         $request->validate([
           // 'requisition_no'=>'required',
          
        ]);
        $local_purchase_order = new LocalPurchaseOrder;
        $local_purchase_order->fill($request->input());
        $local_purchase_order->creator_user_id = Auth::id();
        $local_purchase_order->save();
        $local_purchase_order->vendor()->save(new LocalPurchaseOrderVendor($request->vendor));
        Session::put('alert-success', 'Local Purchase order created successfully');
        return redirect()->route('local-purchase-order.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LocalPurchaseOrder  $localPurchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(LocalPurchaseOrder $localPurchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LocalPurchaseOrder  $localPurchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(LocalPurchaseOrder $localPurchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LocalPurchaseOrder  $localPurchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocalPurchaseOrder $localPurchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LocalPurchaseOrder  $localPurchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocalPurchaseOrder $localPurchaseOrder)
    {
        //
    }
}
