<?php

namespace App\Http\Controllers\Sales;

use App\CreditRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreditRuleController extends Controller
{
    private $view_root = 'modules/sales/rule_setup/';
    public function index()
    {
        $view = view($this->view_root . 'credit_rule');
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
     * @param  \App\CreditRule  $creditRule
     * @return \Illuminate\Http\Response
     */
    public function show(CreditRule $creditRule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CreditRule  $creditRule
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditRule $creditRule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CreditRule  $creditRule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditRule $creditRule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CreditRule  $creditRule
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditRule $creditRule)
    {
        //
    }
}
