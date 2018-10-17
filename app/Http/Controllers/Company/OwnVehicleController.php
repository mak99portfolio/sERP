<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnVehicleController extends Controller{

    protected function path(string $suffix){
        return "modules.company.own_vehicle.{$suffix}";
    }

    public function index(){
        
        $data=[
            'paginate'=>\App\OwnVehicle::all(),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[

            'model'=>new \App\OwnVehicle,
            'route_name'=>'own-vehicle',
            'title'=>'Own Vehicle',
            'employees'=>\App\EmployeeProfile::wherehas('organizational_information', function($query){

                $query->wherehas('designation', function($query){

                    $query->where('name', 'Driver');

                });

            })->pluck('name', 'id')

        ];

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        $request->validate([
            'name'=>'required|unique:designations',
            'short_name'=>'required|unique:designations'
        ]);

        $model=\App\OwnVehicle::create($request->all());
        $model->designation_no=uCode('designations.designation_no', 'DG000');
        $model->creator()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');

    }


    public function show(\App\OwnVehicle $own_vehicle){
        
    }


    public function edit(\App\OwnVehicle $own_vehicle){

        $data=[

            'model'=>$designation,
            'route_name'=>'designation',
            'title'=>'Designation'

        ];

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\OwnVehicle $own_vehicle){

        $model=$own_vehicle;

        $request->validate([
            'name'=>'required|unique:designations,name,'.$model->id,
            'short_name'=>'required|unique:designations,short_name,'.$model->id
        ]);

        $model->fill($request->all());
        $model->editor()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');
        
    }


    public function destroy(\App\OwnVehicle $own_vehicle){

        return redirect()->back();
        
    }

}
