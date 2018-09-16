<?php

namespace App\Http\Controllers\Procurement;

use App\LocalPurchaseOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalPurchaseOrderController extends Controller
{
   protected function path(string $suffix){
        return "modules.procurement.local.purchase_order.{$suffix}";
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
        //
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
