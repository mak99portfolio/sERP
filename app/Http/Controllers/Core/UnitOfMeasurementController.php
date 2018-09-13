<?php

namespace App\Http\Controllers\core;

use App\UnitOfMeasurement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class UnitOfMeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $view_root = 'modules/core/unit_of_measurement/';
    public function index()
    {
        $view = view($this->view_root.'index');
        $view->with('uom_list', UnitOfMeasurement::all());
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
            'name' => 'required|unique:unit_of_measurements',
            'short_name' => 'required|unique:unit_of_measurements',
        ]);
        $umo = new UnitOfMeasurement;
        $umo->fill($request->input());
        $umo->creator_user_id = Auth::id();
        $umo->save();
        Session::put('alert-success', $umo->name . ' created successfully');
        return redirect()->route('unit-of-measurement.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function show(UnitOfMeasurement $unitOfMeasurement)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitOfMeasurement $unitOfMeasurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitOfMeasurement $unitOfMeasurement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitOfMeasurement $unitOfMeasurement)
    {
        //
    }
}
