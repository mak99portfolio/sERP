<?php

namespace App\Http\Controllers\Sales;

use App\CreditRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Auth;
use Session;
use Carbon\Carbon;

class CreditRuleController extends Controller
{
    private $view_root = 'modules/sales/setting/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'credit_rule');
        $view->with('credit_rule', new CreditRule);
        $view->with('customer_list', Customer::pluck('name', 'id')->prepend('',''));
        $view->with('credit_rule_list', CreditRule::orderBy('id', 'desc')->get());
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
            'customer_id' => 'required|unique:credit_rules',
            'credit_amount' => 'required',
            'deadline' => 'required',
        ]);
        $credit_rule = new CreditRule;
        $credit_rule->fill($request->input());
        $credit_rule->deadline = Carbon::parse($request->deadline)->format('Y-m-d');
        $credit_rule->creator_user_id = Auth::id();
        $credit_rule->save();
        Session::put('alert-success', 'New credit rule added successfully!');
        return redirect()->back();
    }

    public function show(CreditRule $creditRule)
    {
        //
    }

    public function edit(CreditRule $creditRule)
    {
        //
    }

    public function update(Request $request, CreditRule $creditRule)
    {
        //
    }

    public function destroy(CreditRule $creditRule)
    {
        //
    }
}
