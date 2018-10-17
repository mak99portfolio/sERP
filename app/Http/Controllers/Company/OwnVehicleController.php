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
            'license_number'=>'required|unique:own_vehicles',
            'employee_profile_id'=>'required|integer'
        ]);
        $model=new \App\OwnVehicle;
        $model->fill($request->all());
        $model->vehicle_no=uCode('own_vehicles.vehicle_no', 'VHI00');
        $model->creator()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');

    }


    public function show(\App\OwnVehicle $own_vehicle){
        
    }


    public function edit(\App\OwnVehicle $own_vehicle){

        $data=[

            'model'=>$own_vehicle,
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


    public function update(Request $request, \App\OwnVehicle $own_vehicle){

        $model=$own_vehicle;

        $request->validate([
            'license_number'=>'required|unique:own_vehicles,license_number,'.$model->id,
            'employee_profile_id'=>'required|integer'
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
