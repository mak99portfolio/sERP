<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeProfileController extends Controller{

    protected function path(string $suffix){
        return "modules.core.employee_profile.{$suffix}";
    }

    public function index(){
        //return view($this->path('index'));
    }


    public function create(){

        $data=[
            'employeeProfile'=>new \App\EmployeeProfile,
            'bloodGroups'=>\App\BloodGroup::pluck('name', 'id')
        ];

        return view($this->path('create'), $data);

    }




    public function store(Request $request){

        //dd($request->all());

        $request->validate([
            'employee_id'=>'required|unique:employee_profiles',
            'name'=>'required',
            'blood_group_id'=>'required',
            'nationality'=>'required',
            'national_id'=>'required',
            'present_address'=>'required',
            'permanent_address'=>'required',
        ]);

        $employeeProfile=\App\EmployeeProfile::create($request->all());
        $employeeProfile->creator()->associate(auth()->user());

        if($employeeProfile->save()){

            $organizationalInformation=\App\EmployeeOrganizationalInformation::create([]);
            $organizationalInformation->employee_profile()->associate($employeeProfile);
            return redirect()->route(
                'employee-profile.organizational-info',
                ['organizationalInfo'=>$organizationalInformation]
            );

        }

        return back()->with('danger', 'Sorry!, form submission failed.');
        
    }


    public function show($id){
        
    }


    public function edit(\App\EmployeeProfile $employeeProfile){
        
        $data=[
            'employeeProfile'=>$employeeProfile,
            'bloodGroups'=>\App\BloodGroup::pluck('name', 'id')
        ];

        return view($this->path('create'), $data);

    }

    public function update(Request $request, \App\EmployeeProfile $employeeProfile){

        $request->validate([
            'employee_id'=>'required|unique:employee_profiles,employee_id,'.$employeeProfile->id,
            'name'=>'required',
            'blood_group_id'=>'required',
            'nationality'=>'required',
            'national_id'=>'required',
            'present_address'=>'required',
            'permanent_address'=>'required',
        ]);

        $employeeProfile->fill($request->all());
        $employeeProfile->editor()->associate(auth()->user());

        if($employeeProfile->save()){

            $organizationalInformation=\App\EmployeeOrganizationalInformation::create([]);
            $organizationalInformation->employee_profile()->associate($employeeProfile);
            return redirect()->route(
                'employee-profile.organizational-info',
                ['organizationalInfo'=>$employeeProfile->organizational_information]
            );

        }

        return back()->with('danger', 'Sorry!, form submission failed.');

    }


    public function destroy($id){
        
    }

    public function organizational_info_form(\App\EmployeeOrganizationalInformation $organizationalInfo){

        $data=[
            'organizationalInfo'=>$organizationalInfo,
            'companies'=>\App\Company::pluck('name', 'id'),
        ];

        return view($this->path('edit_organizational_info'), $data);
        
    }
}
