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
        $request->validate([
            'name' => 'required|unique:company_profiles',
            'email' => 'required',
            'phone' => 'required',
        ]);

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
        $view = view($this->view_root . 'edit');
        $view->with('country_list', Country::pluck('name', 'id')->prepend('select country', ''));
        $view->with('companyProfile',$companyProfile );
        return $view;
    }

    public function update(Request $request, CompanyProfile $companyProfile)
    {
        {
            $request->validate([
                'name' => 'required|unique:company_profiles,name,'.$companyProfile->id,
                'email' => 'required|unique:company_profiles,email,'.$companyProfile->id,
            ]);

            $companyProfile->fill($request->all());
            $companyProfile->update();
            Session::put('alert-success',$companyProfile->name . ' updated successfully!');
            return redirect()->route('company-profile.index');
        }
    }

    public function destroy(CompanyProfile $companyProfile)
    {
        //
    }
}
