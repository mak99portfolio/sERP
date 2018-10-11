<?php

namespace App\Http\Controllers\Core;

use App\Division;
use App\District;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class DistrictController extends Controller
{

    private $view_root = 'modules/core/district/';
    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('district_list', District::all());
        return $view;
    }


    public function create()
    {
        $view = view($this->view_root.'create');
        $view->with('country_list', Country::pluck('name', 'id')->prepend('--select country--', ''));
        $view->with('division_list', Division::pluck('name', 'id')->prepend('--select division--', ''));
        return $view;
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:districts',
            'country_id' => 'required',
            'division_id' => 'required'
        ]);

        $district = new District;
        $district->fill($request->input());
        $district->creator_user_id = Auth::id();
        $district->save();
        Session::put('alert-success', $district->name . " successfully created");
        return redirect()->route('district.index');
    }


    public function show(District $district)
    {
        //
    }


    public function edit(District $district)
    {

       // dd($country);
        $view = view($this->view_root.'edit');
        $view->with('country_list', Country::pluck('name', 'id')->prepend('--select country--', ''));
        $view->with('division_list', Division::pluck('name', 'id')->prepend('--select division--', ''));
        $view->with('district',$district);
        return $view;
    }


    public function update(Request $request, District $district)
    {

        $request->validate([
            'name' => 'required|unique:districts,name,'.$district->id,
            'country_id' => 'required',
            'division_id' => 'required'
        ]);

        $district->fill($request->all());
        $district->update();
        Session::put('alert-success',$district->name . ' updated successfully!');
        return redirect()->route('district.index');
    }


    public function destroy(Division $division)
    {
        //
    }
}
