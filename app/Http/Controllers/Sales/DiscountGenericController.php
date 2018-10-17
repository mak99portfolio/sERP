<?php

namespace App\Http\Controllers\Sales;

use App\DiscountGeneric;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountGenericController extends Controller
{
    private $view_root = 'modules/sales/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'discount_generic');
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
     * @param  \App\DiscountGeneric  $discountGeneric
     * @return \Illuminate\Http\Response
     */
    public function show(DiscountGeneric $discountGeneric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiscountGeneric  $discountGeneric
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscountGeneric $discountGeneric)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscountGeneric  $discountGeneric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscountGeneric $discountGeneric)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscountGeneric  $discountGeneric
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscountGeneric $discountGeneric)
    {
        //
    }
}
