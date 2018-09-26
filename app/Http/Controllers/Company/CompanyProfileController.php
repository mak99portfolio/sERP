<?php

namespace App\Http\Controllers\Company;

use App\CompanyProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use Auth;
use Session;

class CompanyProfileController extends Controller
{
    private $view_root = 'modules/company/general_information/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('company_list', CompanyProfile::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('country_list', Country::pluck('name', 'id')->prepend('select country', ''));
        return $view;
    }

    public function store(Request $request)
    {
        $company_profile = new CompanyProfile;
        $company_profile->fill($request->input());
        $company_profile->creator_user_id = Auth::id();
        $company_profile->save();
        Session::put('alert-success', $company_profile->name . ' created successfully');
        return redirect()->route('company-profile.index');
    }

    public function show(CompanyProfile $companyProfile)
    {
        $view = view($this->view_root . 'index');
        $view->with('companyProfile', $companyProfile);
        return $view;
    }

    public function edit(CompanyProfile $companyProfile)
    {
        //
    }

    public function update(Request $request, CompanyProfile $companyProfile)
    {
        //
    }

    public function destroy(CompanyProfile $companyProfile)
    {
        //
    }
}
