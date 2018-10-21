<?php

namespace App\Http\Controllers\Sales;

use App\DiscountCustomerWise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Product;
use Auth;
use Session;
use Carbon\Carbon;

class DiscountCustomerWiseController extends Controller
{
    private $view_root = 'modules/sales/setting/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'discount_customer_wise');
        $view->with('discount_customer_wise', new DiscountCustomerWise);
        $view->with('customer_list', Customer::pluck('name', 'id')->prepend('',''));
        $view->with('product_list', Product::all());
        $view->with('discount_customer_wise_list', DiscountCustomerWise::orderBy('id', 'desc')->get());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        return $view;
    }

    public function store(Request $request)
    {
        foreach($request->items as $item){
            $discountCustomerWise = new DiscountCustomerWise;
            $discountCustomerWise->customer_id = $request->customer_id;
            $discountCustomerWise->product_id = $item['product_id'];
            $discountCustomerWise->discount_type = $item['discount_type'];
            $discountCustomerWise->discount_value = $item['discount_value'];
            $discountCustomerWise->active = isset($item['active']);
            $discountCustomerWise->creator_user_id = Auth::id();
            $discountCustomerWise->save();
        }
        Session::put('alert-success', 'New Discount rule added successfully!');
        return redirect()->back();
        
    }

    public function show(DiscountCustomerWise $discountCustomerWise)
    {
        //
    }

    public function edit(DiscountCustomerWise $discountCustomerWise)
    {
        //
    }

    public function update(Request $request, DiscountCustomerWise $discountCustomerWise)
    {
        //
    }

    public function destroy(DiscountCustomerWise $discountCustomerWise)
    {
        //
    }
}
