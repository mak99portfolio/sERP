<?php

namespace App\Http\Controllers\Sales;

use App\FreeBonusGeneric;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Auth;
use Session;
use Carbon\Carbon;

class FreeBonusGenericController extends Controller
{
    private $view_root = 'modules/sales/setting/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'free_bonus_generic');
        $view->with('free_bonus_generic', new FreeBonusGeneric);
        $view->with('product_list', Product::pluck('name', 'id')->prepend('', ''));
        $view->with('free_bonus_generic_list', FreeBonusGeneric::orderBy('id', 'desc')->get());
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
        $request->validate([
            'product_id' => 'required|unique:free_bonus_generics',
            'bonus_type' => 'required',
            'bonus_value' => 'required',
        ]);
        $freeBonusCustomerWise = new FreeBonusGeneric;
        $freeBonusCustomerWise->product_id = $request->product_id;
        $freeBonusCustomerWise->bonus_type = $request->bonus_type;
        $freeBonusCustomerWise->bonus_value = $request->bonus_value;
        $freeBonusCustomerWise->active = isset($request->active);
        $freeBonusCustomerWise->creator_user_id = Auth::id();
        $freeBonusCustomerWise->save();
        Session::put('alert-success', 'New Bonus rule added successfully!');
        return redirect()->back();
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
