<?php

namespace App\Http\Controllers;

use App\Cnf;
use Illuminate\Http\Request;

class CnfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = view('modules/procurement/cnf');
        // $view->with('foo', 'bar');
        // your code here
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
     * @param  \App\Cnf  $cnf
     * @return \Illuminate\Http\Response
     */
    public function show(Cnf $cnf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cnf  $cnf
     * @return \Illuminate\Http\Response
     */
    public function edit(Cnf $cnf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cnf  $cnf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cnf $cnf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cnf  $cnf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cnf $cnf)
    {
        //
    }
}