<?php

namespace App\Http\Controllers\Sales;

use App\FreeBonusGeneric;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreeBonusGenericController extends Controller
{
    private $view_root = 'modules/sales/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'free_bonus_generic');
        return $view;
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FreeBonusGeneric  $freeBonusGeneric
     * @return \Illuminate\Http\Response
     */
    public function show(FreeBonusGeneric $freeBonusGeneric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FreeBonusGeneric  $freeBonusGeneric
     * @return \Illuminate\Http\Response
     */
    public function edit(FreeBonusGeneric $freeBonusGeneric)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FreeBonusGeneric  $freeBonusGeneric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FreeBonusGeneric $freeBonusGeneric)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FreeBonusGeneric  $freeBonusGeneric
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreeBonusGeneric $freeBonusGeneric)
    {
        //
    }
}
