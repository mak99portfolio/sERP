<?php

namespace App\Http\Controllers\Sales;

use App\RuleSetup;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuleSetupController extends Controller
{
    private $view_root = 'modules/sales/setting/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('tab', 'credit-rule');
        $view->with('customer_list', Customer::pluck('name', 'id'));
        return $view;
    }

    public function store(Request $request)
    {
        dd($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RuleSetup  $ruleSetup
     * @return \Illuminate\Http\Response
     */
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
