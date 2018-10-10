<?php

namespace App\Http\Controllers\Core;

use App\Division;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class DivisionController extends Controller
{

    private $view_root = 'modules/core/division/';
    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('division_list', Division::all());
        return $view;
    }


    public function create()
    {
        $view = view($this->view_root.'create');
        $view->with('country_list', Country::pluck('name', 'id')->prepend('--select country--', ''));
        return $view;
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:divisions',
            'country_id' => 'required'
        ]);

        $division = new Division;
        $division->fill($request->input());
        $division->creator_user_id = Auth::id();
        $division->save();
        Session::put('alert-success', $division->name . " successfully created");
        return redirect()->route('division.index');
    }


    public function show(Division $division)
    {
        //
    }


    public function edit(Division $division)
    {

       // dd($country);
        $view = view($this->view_root.'edit');
        $view->with('country_list', Country::pluck('name', 'id')->prepend('--select country--', ''));
        $view->with('division',$division);
        return $view;
    }


    public function update(Request $request, Division $division)
    {

        $request->validate([
            'name' => 'required|unique:divisions,name,'.$division->id,
            'country_id' => 'required'
        ]);

        $division->fill($request->all());
        $division->update();
        Session::put('alert-success',$division->name . ' updated successfully!');
        return redirect()->route('division.index');
    }


    public function destroy(Division $division)
    {
        //
    }
}
