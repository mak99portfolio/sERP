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
    private $view_root = 'modules/company/company_bank/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('bank_list', CompanyBank::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('company_list', CompanyProfile::pluck('name', 'id')->prepend('--select company--', ''));
        $view->with('bank_list', Bank::pluck('name', 'id')->prepend('--select bank--', ''));
        return $view;
    }

    public function store(Request $request)
    {
        $bank = new CompanyBank;
        $bank->fill($request->input());
        $bank->creator_user_id = Auth::id();
        $bank->save();
        Session::put('alert-success', 'New bank information added successfully');
        return redirect()->route('company-bank.index');
    }

    public function show(CompanyBank $companyBank)
    {
        $view = view($this->view_root . 'index');
        $view->with('companyBank', $companyBank);
        return $view;
    }

    public function edit(CompanyBank $companyBank)
    {
        //
    }

    public function update(Request $request, CompanyBank $companyBank)
    {
        //
    }

    public function destroy(CompanyBank $companyBank)
    {
        //
    }
}
