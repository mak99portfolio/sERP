<?php

namespace App\Http\Controllers\Procurement;

use App\LocalPurchaseOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;

class LocalPurchaseOrderController extends Controller
{
   protected function path(string $suffix){
        return "modules.procurement.local.purchase_order.{$suffix}";
    }
  
    
    public function search_msg(Request $request){
       $purchase_requisition_no = $request->purchase_requisition_no;
      // dd($purchase_requisition_no);
       $data['purchase_requisition_no']=$purchase_requisition_no;
       return response()->json($data);
   }
    public function index()
    {
          return view($this->path('index'));

     }
    public function create()
    {
        $data=[
    		
    		'vendor_list'=> \App\Vendor::pluck('name', 'id'),
    		
    	];

         return view($this->path('create'), $data);
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
           // 'requisition_no'=>'required',
            'vendor_id'=>'required',
          
        ]);
        $local_purchase_order = new LocalPurchaseOrder;
        $local_purchase_order->fill($request->input());
        $local_purchase_order->creator_user_id = Auth::id();
        $local_purchase_order->save();
        Session::put('alert-success', 'Local Purchase order created successfully');
        return redirect()->route('purchase-order.create');
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
