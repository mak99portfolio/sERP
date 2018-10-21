<?php

namespace App\Http\Controllers\Sales;

use App\DiscountGeneric;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use Auth;
use Session;
use Carbon\Carbon;

class DiscountGenericController extends Controller
{
    private $view_root = 'modules/sales/setting/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'discount_generic');
        $view->with('discount_generic', new DiscountGeneric);
        $view->with('product_list', Product::pluck('name', 'id')->prepend('', ''));
        $view->with('discount_generic_list', DiscountGeneric::orderBy('id', 'desc')->get());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        return $view;
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|unique:discount_generics',
            'discount_type' => 'required',
            'discount_value' => 'required',
        ]);
        $discountCustomerWise = new DiscountGeneric;
        $discountCustomerWise->product_id = $request->product_id;
        $discountCustomerWise->discount_type = $request->discount_type;
        $discountCustomerWise->discount_value = $request->discount_value;
        $discountCustomerWise->active = isset($request->active);
        $discountCustomerWise->creator_user_id = Auth::id();
        $discountCustomerWise->save();
        Session::put('alert-success', 'New Discount rule added successfully!');
        return redirect()->back();
        
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
