<?php

namespace App\Http\Controllers\core;

use App\UnitOfMeasurement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitOfMeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = view('modules/core/unit_of_measurement');
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
        $request->validate([
            'name' => 'required|unique:unitofmeasurement',
            'short_name' => 'required|unique:unitofmeasurement',
        ]);
        $country = new Country;
        $country->fill($request->input());
        $country->creator_user_id = Auth::id();
        $country->save();
        return redirect()->route('country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function show(UnitOfMeasurement $unitOfMeasurement)
    {
        //
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
