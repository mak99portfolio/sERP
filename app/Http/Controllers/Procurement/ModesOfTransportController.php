<?php

namespace App\Http\Controllers\Procurement;
use App\Http\Controllers\Controller;

use App\ModesOfTransport;
use Auth;
use Session;
use Illuminate\Http\Request;

class ModesOfTransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/setting/modes_of_transport/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('modesoftransport_list', ModesOfTransport::all());
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view($this->view_root . 'create');
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
            'name' => 'required|unique:modes_of_transports',
            'short_name' => 'required|unique:modes_of_transports',
        ]);
        $modes_of_transports = new ModesOfTransport;
        $modes_of_transports->fill($request->input());
        $modes_of_transports->creator_user_id = Auth::id();
        $modes_of_transports->save();
        Session::put('alert-success', $modes_of_transports->name . ' created successfully');
        return redirect()->route('modes-of-transport.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModesOfTransport  $modesOfTransport
     * @return \Illuminate\Http\Response
     */
    public function show(ModesOfTransport $modesOfTransport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModesOfTransport  $modesOfTransport
     * @return \Illuminate\Http\Response
     */
    public function edit(ModesOfTransport $modesOfTransport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModesOfTransport  $modesOfTransport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModesOfTransport $modesOfTransport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModesOfTransport  $modesOfTransport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModesOfTransport $modesOfTransport)
    {
        //
    }
}
