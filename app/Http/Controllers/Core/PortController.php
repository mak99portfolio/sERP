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

   
    public function create()
    {
        $view = view($this->view_root.'create');
        $view->with('city_list', City::pluck('name', 'id')->prepend('--select city--', ''));
        $view->with('country_list', Country::pluck('name', 'id')->prepend('--select country--', ''));
        return $view;
    }

  
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

   
    public function show(Port $port)
    {
        //
    }

    
    public function edit(Port $port)
    {
        $view = view($this->view_root.'edit');
        $view->with('port_info', $port);
        $view->with('city_list', City::pluck('name', 'id')->prepend('--select city--', ''));
        $view->with('country_list', Country::pluck('name', 'id')->prepend('--select country--', ''));
        return $view;
    }

  
    public function update(Request $request, Port $port)
    {
        $request->validate([
            'name' => 'required|unique:ports,name,'.$port->id,
            'contact_person' => 'required|unique:ports,contact_person,'.$port->id,
            'contact_person_number' => 'required|unique:ports,contact_person_number,'.$port->id,
            'city_id' => 'required',
            'country_id' => 'required'
        ]);
        $port->fill($request->all());
        $port->update();
        Session::put('alert-success',$port->name . ' updated successfully!');
        return redirect()->route('port.index');
    }

    
    public function destroy(Port $port)
    {
        //
    }
}
