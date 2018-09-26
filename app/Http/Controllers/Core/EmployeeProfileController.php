<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Paginate;

class EmployeeProfileController extends Controller{

    protected function path(string $suffix){
        return "modules.core.employee_profile.{$suffix}";
    }

    public function index(){

        $data=[
            'paginate'=>new Paginate('\App\EmployeeProfile', [
                'employee_id'=>'Employee ID',
                'name'=>'Name',
                'nationality'=>'Nationality',
                'Present Address'=>'present_address',
                'Permanent Address'=>'permanent_address',
            ]),
            'carbon'=>new \Carbon\Carbon
        ];

        //dd($data['paginate']);
        return view($this->path('index'), $data);
    }


    public function create(){

        $data=[
            'employee_profile'=>new \App\EmployeeProfile,
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

            $organizationalInformation=\App\EmployeeOrgInfo::create([]);
            $organizationalInformation->employee_profile()->associate($employeeProfile);
            $organizationalInformation->save();
            return redirect()->route(
                'employee-profile.organizational-info',
                ['organizational_info'=>$organizationalInformation]
            );

        }

        return back()->with('danger', 'Sorry!, form submission failed.');
        
    }


    public function show($id){
        
    }


    public function edit(\App\EmployeeProfile $employee_profile){
        
        $data=[
            'employee_profile'=>$employee_profile,
            'bloodGroups'=>\App\BloodGroup::pluck('name', 'id')
        ];

        return view($this->path('create'), $data);

    }

    public function update(Request $request, \App\EmployeeProfile $employee_profile){

        $request->validate([
            'employee_id'=>'required|unique:employee_profiles,employee_id,'.$employee_profile->id,
            'name'=>'required',
            'blood_group_id'=>'required',
            'nationality'=>'required',
            'national_id'=>'required',
            'present_address'=>'required',
            'permanent_address'=>'required',
        ]);

        $employee_profile->fill($request->all());
        $employee_profile->editor()->associate(auth()->user());

        if($employee_profile->save()){

            return redirect()->route(
                'employee-profile.organizational-info',
                ['organizational_info'=>$employee_profile->organizational_information]
            );

        }

        return back()->with('danger', 'Sorry!, form submission failed.');

    }


    public function destroy($id){
        
    }

    public function organizational_info_form(\App\EmployeeOrgInfo $organizational_info){

        $data=[
            'organizational_info'=>$organizational_info,
            'depatrments'=>\App\Department::pluck('name', 'id'),
            'designations'=>\App\Designation::pluck('name', 'id'),
            'workingUnits'=>\App\WorkingUnit::pluck('name', 'id'),
            'statuses'=>\App\EmployeeOrgInfoStatus::pluck('name', 'id'),
            'types'=>\App\EmployeeOrgInfoType::pluck('name', 'id'),
        ];

        //dd($data);

        return view($this->path('edit_organizational_info'), $data);
        
    }

    public function update_organizational_info(Request $request, \App\EmployeeOrgInfo $organizational_info){

        $request->validate([
            'department_id'=>'required',
            'designation_id'=>'required',
            'working_unit_id'=>'required',
            'employee_organizational_information_status_id'=>'required',
            'employee_organizational_information_type_id'=>'required'
        ]);

        $organizational_info->fill($request->all());

        if($organizational_info->save()){

            return back()->with('success', 'Success!, form submitted successfully');

        }

        return back()->with('danger', 'Sorry!, form submission failed.');

    }

}
