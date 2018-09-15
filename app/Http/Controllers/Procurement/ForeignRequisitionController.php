<?php

namespace App\Http\Controllers\Procurement;

use App\ForeignRequisition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        // $view->with('foo', 'bar');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ForeignRequisition  $foreignRequisition
     * @return \Illuminate\Http\Response
     */
    public function show(ForeignRequisition $foreignRequisition)
    {
        //
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
}
