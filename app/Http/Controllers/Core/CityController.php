<?php

namespace App\Http\Controllers\Core;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use Auth;
use Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $view_root = 'modules/core/city/';

    public function index()
    {
        // $data = [
        //     'countries' => \App\Country::pluck( 'name', 'id')
        // ];

        $view = view($this->view_root . 'index');
        $view->with('city_list', City::all());
        $view->with('country_list', Country::pluck('name', 'id')->prepend('--select country--', ''));

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view($this->view_root.'create');
        $view->with('country_list', Country::pluck('name', 'id')->prepend('--select country--', ''));
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities',
            'country_id' => 'required'
        ]);

        $city = new City;
        $city->fill($request->input());
        $city->creator_user_id = Auth::id();
        $city->save();
        Session::put('alert-success', $city->name . " successfully created");
        return redirect()->route('city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
