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

    public function country_detail(Request $request){


        if($request->get('country_id')){

            return \App\Country::with(['divisions'=>function($query){

                $query->with(['districts'=>function($query){
                    $query->select('division_id' ,'id', 'name');
                }])->select('country_id', 'id','name');

            }])->select('id', 'name')
            ->where('id', $request->country_id)
            ->first();

        }elseif($request->get('division_id')){

            return \App\Division::with(['districts'=>function($query){

                $query->select('division_id', 'id','name');

            }])->select('id', 'name')
            ->where('id', $request->division_id)
            ->first();

        }

    }

}
