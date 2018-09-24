<?php

namespace App\Http\Controllers\Company;

use App\CompanyProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyProfileController extends Controller
{
    private $view_root = 'modules/company/general_information/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        // $view->with('city_list', City::all());
        return $view;
    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        // $view->with('city_list', City::all());
        return $view;
    }

    public function store(Request $request)
    {
        //
    }

    public function show(CompanyProfile $companyProfile)
    {
        //
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
