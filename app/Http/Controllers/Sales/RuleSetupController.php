<?php

namespace App\Http\Controllers\Sales;

use App\RuleSetup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuleSetupController extends Controller
{
    private $view_root = 'modules/sales/setting/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'index');
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
