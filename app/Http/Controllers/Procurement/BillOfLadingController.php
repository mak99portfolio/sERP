<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\BillOfLading;
use App\CommercialInvoice;
use App\Vendor;
use App\ModesOfTransport;
use App\MoveType;
use App\Port;
use Illuminate\Http\Request;
use Auth;
use Session;
class BillOfLadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/bill_of_lading/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('bill_of_lading_list', BillOfLading::all());
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
        $view->with('commercial_invoice_list', CommercialInvoice::pluck('bill_of_lading_no', 'bill_of_lading_no')->prepend('-- Select Bill Number --', ''));
        $view->with('exproter_list', Vendor::pluck('name', 'id')->prepend('-- Select --', ''));
        $view->with('port_list', Port::pluck('name','id')->prepend('-- Select Port --', ''));
        $view->with('modes_of_transport_list', ModesOfTransport::pluck('name','id')->prepend('-- Select Modes Of Transport --', ''));
        $view->with('move_type_list', MoveType::pluck('name','id')->prepend('-- Select Move Type --', ''));
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
        // dd($request->input());
        $bill_of_lading = new BillOfLading;
        $bill_of_lading->fill($request->input());
        $bill_of_lading->creator_user_id = Auth::id();
        // dd($request->input());
        $bill_of_lading->save();
        Session::put('alert-success', 'Bill of lading created successfully');
        return redirect()->route('bill-of-lading.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BillOfLading  $billOfLading
     * @return \Illuminate\Http\Response
     */
    public function show(BillOfLading $billOfLading)
    {
        $view = view($this->view_root . 'show');
        $view->with($billOfLading);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BillOfLading  $billOfLading
     * @return \Illuminate\Http\Response
     */
    public function edit(BillOfLading $billOfLading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BillOfLading  $billOfLading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillOfLading $billOfLading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BillOfLading  $billOfLading
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillOfLading $billOfLading)
    {
        //
    }
}
