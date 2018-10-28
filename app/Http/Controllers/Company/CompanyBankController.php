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
        $request->validate([
            'account_no' => 'required|unique:company_banks',
            'account_name' => 'required',
            'bank_id' => 'required',
            'company_id' => 'required',
            'branch_name' => 'required',
            'swift_code' => 'required',
        ]);
        $bank = new CompanyBank;
        $bank->fill($request->input());
        $bank->creator_user_id = Auth::id();
        $bank->save();
        Session::put('alert-success', 'New bank information added successfully');
        return redirect()->route('company-bank.index');
    }

    public function show(CompanyBank $companyBank)
    {
        $view = view($this->view_root . 'show');
        $view->with('companyBank', $companyBank);
        return $view;
    }

    public function edit(CompanyBank $companyBank)
    {
        $view = view($this->view_root . 'edit');
        $view->with('company_list', CompanyProfile::pluck('name', 'id')->prepend('--select company--', ''));
        $view->with('bank_list', Bank::pluck('name', 'id')->prepend('--select bank--', ''));
        $view->with('companyBank', $companyBank);
        return $view;
    }

    public function update(Request $request, CompanyBank $companyBank)
    {

        $request->validate([
            'account_no' => 'required|unique:company_banks,account_no,'.$companyBank->id,
            'account_name' => 'required',
            'bank_id' => 'required',
            'company_id' => 'required',
            'branch_name' => 'required',
            'swift_code' => 'required',
        ]);
      
        $companyBank->fill($request->all());
        $companyBank->update();
        Session::put('alert-success',$companyBank->name . ' updated successfully!');
        return redirect()->route('company-bank.index');
    }

    public function destroy(CompanyBank $companyBank)
    {
        //
    }
}
