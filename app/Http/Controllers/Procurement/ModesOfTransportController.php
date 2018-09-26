<?php

namespace App\Http\Controllers\Procurement;
use App\Http\Controllers\Controller;

use App\ModesOfTransport;
use Illuminate\Http\Request;

class ModesOfTransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/procurement/foreign/modes_of_transport/';
    public function index()
    {
        $view = view($this->view_root . 'index');
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
