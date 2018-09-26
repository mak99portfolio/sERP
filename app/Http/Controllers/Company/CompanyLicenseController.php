<?php

namespace App\Http\Controllers\Company;

use App\CompanyLicense;
use App\Http\Controllers\Controller;

class CompanyLicenseController extends Controller
{
    private $view_root = 'modules/company/company_license/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        // $view->with('company_list', CompanyProfile::all());
        return $view;
    }

    
    public function create()
    {
        $view = view($this->view_root . 'create');
        return $view;
    }

    public function store(Request $request)
    {
        //
    }

    public function show(CompanyLicense $companyLicense)
    {
        $view = view($this->view_root . 'index');
        $view->with('companyLicense', $companyLicense);
        return $view;
    }

    public function edit(CompanyLicense $companyLicense)
    {
        //
    }

    public function update(Request $request, CompanyLicense $companyLicense)
    {
        //
    }

    public function destroy(CompanyLicense $companyLicense)
    {
        //
    }
}
