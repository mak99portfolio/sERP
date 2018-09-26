<?php

namespace App\Http\Controllers\Company;

use App\CompanyBank;
use App\CompanyProfile;
use App\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class CompanyBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/company/company_bank/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('bank_list', CompanyBank::all());
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('company_list', CompanyProfile::pluck('name', 'id')->prepend('--select company--', ''));
        $view->with('bank_list', Bank::pluck('name', 'id')->prepend('--select bank--', ''));
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
        $bank = new CompanyBank;
        $bank->fill($request->input());
        $bank->creator_user_id = Auth::id();
        $bank->save();
        Session::put('alert-success', 'New bank information added successfully');
        return redirect()->route('company-bank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyBank  $companyBank
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyBank $companyBank)
    {
        $view = view($this->view_root . 'index');
        $view->with('companyBank', $companyBank);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyBank  $companyBank
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyBank $companyBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyBank  $companyBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyBank $companyBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyBank  $companyBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyBank $companyBank)
    {
        //
    }
}
