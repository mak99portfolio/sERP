<?php

namespace App\Http\Controllers\Sales;

use App\FreeBonusCustomerWise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Product;
use Auth;
use Session;
use Carbon\Carbon;

class FreeBonusCustomerWiseController extends Controller
{
    private $view_root = 'modules/sales/setting/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'free_bonus_customer_wise');
        $view->with('free_bonus_customer_wise', new FreeBonusCustomerWise);
        $view->with('customer_list', Customer::pluck('name', 'id')->prepend('',''));
        $view->with('product_list', Product::all());
        $view->with('free_bonus_customer_wise_list', FreeBonusCustomerWise::orderBy('id', 'desc')->get());
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
            $discountCustomerWise = new FreeBonusCustomerWise;
            $discountCustomerWise->customer_id = $request->customer_id;
            $discountCustomerWise->product_id = $item['product_id'];
            $discountCustomerWise->bonus_type = $item['bonus_type'];
            $discountCustomerWise->bonus_value = $item['bonus_value'];
            $discountCustomerWise->active = isset($item['active']);
            $discountCustomerWise->creator_user_id = Auth::id();
            $discountCustomerWise->save();
        }
        Session::put('alert-success', 'New Bonus rule added successfully!');
        return redirect()->back();
    }

    public function show(FreeBonusCustomerWise $freeBonusCustomerWise)
    {
        //
    }

    public function edit(FreeBonusCustomerWise $freeBonusCustomerWise)
    {
        //
    }

    public function update(Request $request, FreeBonusCustomerWise $freeBonusCustomerWise)
    {
        //
    }

    public function destroy(FreeBonusCustomerWise $freeBonusCustomerWise)
    {
        //
    }
}
