<?php

namespace App\Http\Controllers\Sales;
use App\Http\Controllers\Controller;

use App\SalesReturnReason;
use Illuminate\Http\Request;
use Auth;
use Session;
class SalesReturnReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/sales/setting/sales_return_reason/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('sales_return_reason_list', SalesReturnReason::all());
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
            'reason' => 'required|unique:sales_return_reasons',
            'description' => 'required',
        ]);
        $sales_return_reason = new SalesReturnReason;
        $sales_return_reason->fill($request->input());
        $sales_return_reason->creator_user_id = Auth::id();
        $sales_return_reason->save();
        Session::put('alert-success', 'Sales Order return rezon successfully.');
        return redirect()->route('sales-return-reason.index');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesReturnReason  $salesReturnReason
     * @return \Illuminate\Http\Response
     */
    public function show(SalesReturnReason $salesReturnReason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesReturnReason  $salesReturnReason
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesReturnReason $salesReturnReason)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesReturnReason  $salesReturnReason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesReturnReason $salesReturnReason)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesReturnReason  $salesReturnReason
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesReturnReason $salesReturnReason)
    {
        //
    }
}
