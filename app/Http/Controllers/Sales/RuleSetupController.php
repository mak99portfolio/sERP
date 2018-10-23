<?php

namespace App\Http\Controllers\Sales;

use App\RuleSetup;
use App\CreditRule;
use App\DiscountCustomerWise;
use App\DiscountGeneric;
use App\FreeBonusCustomerWise;
use App\FreeBonusGeneric;
use App\Customer;
use Auth;
use Session;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuleSetupController extends Controller
{
    private $view_root = 'modules/sales/setting/rule_setup/';
    public function __construct(){
        Session::put('tab', 'credit-rule');
    }
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('credit_rule', new CreditRule);
        $view->with('customer_list', Customer::pluck('name', 'id')->prepend('',''));
        $view->with('credit_rule_list', CreditRule::orderBy('id', 'desc')->get());
        return $view;
    }

    public function store(Request $request)
    {
        switch($request->rule_type){
            case 'credit-rule' : $this->store_credit_rule($request);
        }
        return redirect()->route('rule-setup.index');
    }

    private function store_credit_rule($request){
        Session::put('tab', 'credit-rule');
        $request->validate([
            'customer_id' => 'required|unique:credit_rules',
            'credit_amount' => 'required',
            'days' => 'required',
        ]);
        $credit_rule = new CreditRule;
        $credit_rule->fill($request->input());
        $credit_rule->creator_user_id = Auth::id();
        $credit_rule->save();
        Session::put('alert-success', 'New credit rule added successfully!');
    }
    public function show(RuleSetup $ruleSetup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RuleSetup  $ruleSetup
     * @return \Illuminate\Http\Response
     */
    public function edit(RuleSetup $ruleSetup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RuleSetup  $ruleSetup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RuleSetup $ruleSetup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RuleSetup  $ruleSetup
     * @return \Illuminate\Http\Response
     */
    public function destroy(RuleSetup $ruleSetup)
    {
        //
    }
}
