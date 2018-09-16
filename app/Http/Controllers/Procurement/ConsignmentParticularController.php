<?php

namespace App\Http\Controllers\Procurement;

use App\ConsignmentParticular;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ConsignmentParticularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $view_root = 'modules/procurement/setting/consignment_particulars/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        // $view->with('consignment_particulars', ConsignmentParticulars::all());

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
