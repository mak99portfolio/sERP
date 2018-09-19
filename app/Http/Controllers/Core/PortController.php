<?php

namespace App\Http\Controllers\Core;

use App\Port;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Country;
use Auth;
use Session;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $view_root = 'modules/core/port/';

    public function index()
    {
        // $data = [
        //     'countries' => \App\Country::pluck( 'name', 'id')
        // ];

        $view = view($this->view_root . 'index');
        $view->with('port_list', Port::all());
        $view->with('city_list', City::pluck('name', 'id')->prepend('--select city--', ''));
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
        $view->with('city_list', City::pluck('name', 'id')->prepend('--select city--', ''));
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
            'name' => 'required|unique:ports',
            'contact_person' => 'required|unique:ports',
            'contact_person_number' => 'required|unique:ports',
            'city_id' => 'required',
            'country_id' => 'required'
        ]);

        $port = new Port;
        $port->fill($request->input());
        $port->creator_user_id = Auth::id();
        $port->save();
        Session::put('alert-success', $port->name . " successfully created");
        return redirect()->route('port.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function show(Port $port)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function edit(Port $port)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Port $port)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function destroy(Port $port)
    {
        //
    }
}
