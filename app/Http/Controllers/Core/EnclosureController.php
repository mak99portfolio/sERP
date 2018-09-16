<?php

namespace App\Http\Controllers\Core;

use App\Enclosure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class EnclosureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $view_root = 'modules/core/enclosure/';

    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('enclosure_list', Enclosure::all());
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
            'name' => 'required|unique:enclosures',
            'short_name' => 'required|unique:enclosures',
        ]);
        $enclosure = new Enclosure;
        $enclosure->fill($request->input());
        $enclosure->creator_user_id = Auth::id();
        $enclosure->save();
        Session::put('alert-success', $enclosure->name . ' created successfully');
        return redirect()->route('enclosure.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enclosure  $enclosure
     * @return \Illuminate\Http\Response
     */
    public function show(Enclosure $enclosure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enclosure  $enclosure
     * @return \Illuminate\Http\Response
     */
    public function edit(Enclosure $enclosure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enclosure  $enclosure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enclosure $enclosure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enclosure  $enclosure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enclosure $enclosure)
    {
        //
    }
}
