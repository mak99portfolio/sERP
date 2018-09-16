<?php

namespace App\Http\Controllers\Procurement;

use App\CostParticular;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CostParticularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $view_root = 'modules/procurement/setting/cost_particulars/';

    public function index()
    {

        $view = view($this->view_root . 'index');
        // // $view->with('cost_particulars', CostParticulars::all());

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
     * @param  \App\CostParticulars  $costParticulars
     * @return \Illuminate\Http\Response
     */
    public function show(CostParticulars $costParticulars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CostParticulars  $costParticulars
     * @return \Illuminate\Http\Response
     */
    public function edit(CostParticulars $costParticulars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CostParticulars  $costParticulars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CostParticulars $costParticulars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CostParticulars  $costParticulars
     * @return \Illuminate\Http\Response
     */
    public function destroy(CostParticulars $costParticulars)
    {
        //
    }
}
