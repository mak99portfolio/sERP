<?php

namespace App\Http\Controllers\Procurement;

use App\ConsignmentParticular;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class ConsignmentParticularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $view_root = 'modules/procurement/setting/consignment_particular/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('consignment_particular_list', ConsignmentParticular::all());

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
            'name' => 'required|unique:consignment_particulars',
            'short_name' => 'required|unique:consignment_particulars',
        ]);
        $consignment_particular = new ConsignmentParticular;
        $consignment_particular->fill($request->input());
        $consignment_particular->creator_user_id = Auth::id();
        $consignment_particular->save();
        Session::put('alert-success', $consignment_particular->name . ' created successfully');
        return redirect()->route('consignment-particular.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConsignmentParticulars  $consignmentParticulars
     * @return \Illuminate\Http\Response
     */
    public function show(ConsignmentParticulars $consignmentParticulars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConsignmentParticulars  $consignmentParticulars
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsignmentParticulars $consignmentParticulars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConsignmentParticulars  $consignmentParticulars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConsignmentParticulars $consignmentParticulars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConsignmentParticulars  $consignmentParticulars
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsignmentParticulars $consignmentParticulars)
    {
        //
    }
}
