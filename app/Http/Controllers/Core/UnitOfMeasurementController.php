<?php

namespace App\Http\Controllers\Core;

use App\UnitOfMeasurement;
use Illuminate\Http\Request;
use App\Http\Requests\UnitOfMeasurementRequest;
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
        $view->with('uom_list', UnitOfMeasurement::orderBy('id','desc')->get());
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
    public function store(UnitOfMeasurementRequest $request)
    {
        
        $umo = new UnitOfMeasurement;
        $umo->fill($request->input());
        $umo->creator_user_id = Auth::id();
        $umo->save();
        Session::put('alert-success', $umo->name . ' created successfully');
        return redirect()->route('unit-of-measurement.index');
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
        $view = view($this->view_root.'edit');
        $view->with('uom_info', $unitOfMeasurement);
        return $view;
    }

   
    public function update(Request $request, UnitOfMeasurement $unitOfMeasurement)
    {
        // dd('jj');
        $request->validate([
            'name'=>'required|unique:unit_of_measurements,name,'.$unitOfMeasurement->id,
            'short_name'=>'required|unique:unit_of_measurements,short_name,'.$unitOfMeasurement->id,
        ]);

        $unitOfMeasurement->fill($request->all());
        $unitOfMeasurement->update();
        Session::put('alert-success',$unitOfMeasurement->name . ' updated successfully!');
        return redirect()->route('unit-of-measurement.index');
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
