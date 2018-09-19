<?php

namespace App\Http\Controllers\Procurement;

use App\ForeignRequisition;
use App\RequisitionPurpose;
use App\RequisitionPriority;
use App\ForeignRequisitionItem;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class ForeignRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/foreign_requisition/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('requisition_list', ForeignRequisition::all());
        // your code here
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $view = view($this->view_root.'create');
       $view->with('requisition_purpose_list', RequisitionPurpose::pluck('name', 'id')->prepend('--select purpose--'));
       $view->with('requisition_priority_list', RequisitionPriority::pluck('name', 'id')->prepend('--select priority--'));
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
        // dd($request->items);
        $requisition = new ForeignRequisition;
        $requisition->fill($request->input());
        $requisition->creator_user_id = Auth::id();
        $requisition->company_id = 1;
        $requisition->requisition_no = time();
        $requisition->save();
        $items = Array();
        foreach($request->items as $item){
            array_push($items, new ForeignRequisitionItem($item));
        }
        $requisition->items()->saveMany($items);
        Session::put('alert-success', 'Requisition created successfully. Requisition No: ' . $requisition->requisition_no);
        return redirect()->route('foreign-requisition.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ForeignRequisition  $foreignRequisition
     * @return \Illuminate\Http\Response
     */
    public function show(ForeignRequisition $foreignRequisition)
    {
        $view = view($this->view_root.'show');
        $view->with('foreignRequisition', $foreignRequisition);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ForeignRequisition  $foreignRequisition
     * @return \Illuminate\Http\Response
     */
    public function edit(ForeignRequisition $foreignRequisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ForeignRequisition  $foreignRequisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForeignRequisition $foreignRequisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ForeignRequisition  $foreignRequisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForeignRequisition $foreignRequisition)
    {
        //
    }
    public function getProductByProductId($id){
        $product = Product::find($id);
        $physical_stock = 0;
        $goods_in_transit = 0;
        $pending = 0;
        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'hs_code' => $product->hs_code,
            'uom' => $product->unit_of_measurement->name,
            'physical_stock' => $physical_stock,
            'goods_in_transit' => $goods_in_transit,
            'pending' => $pending,
            'total_quantity' => $physical_stock+$goods_in_transit+$pending,
        ];
        return response()->json($data);
    }
}
