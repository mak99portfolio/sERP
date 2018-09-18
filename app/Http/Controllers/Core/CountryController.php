<?php

namespace App\Http\Controllers\Core;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class CountryController extends Controller
{

    private $view_root = 'modules/core/country/';
    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('country_list', Country::all());
        return $view;
    }


    public function create()
    {
        $view = view($this->view_root.'create');
        return $view;
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:countries',
            'short_name' => 'required|unique:countries',
        ]);
        $country = new Country;
        $country->fill($request->input());
        $country->creator_user_id = Auth::id();
        $country->save();
        Session::put('alert-success', $country->name . ' created successfully');
        return redirect()->route('country.index');
    }


    public function show(Country $country)
    {
        //
    }


    public function edit(Country $country)
    {
        //
    }


    public function update(Request $request, Country $country)
    {
        //
    }


    public function destroy(Country $country)
    {
        //
    }
}
