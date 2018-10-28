<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Paginate;
use App\EmployeeProfile;

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
            'bloodGroups'=>\App\BloodGroup::pluck('name', 'id'),
            'employee_id'=>uCode('employee_profiles.employee_id', 'EMP00')
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
      
       $data['EmployeeProfile']=EmployeeProfile::find($id);
      
        return view($this->path('show'), $data);

       
    }


    public function edit(\App\EmployeeProfile $employee_profile){

        //dd($employee_profile);
        
        $data=[
            'employee_profile'=>$employee_profile,
            'bloodGroups'=>\App\BloodGroup::pluck('name', 'id'),
            'employee_id'=>$employee_profile->employee_id
        ];

        return view($this->path('create'), $data);

    }

    public function update(Request $request, \App\EmployeeProfile $employee_profile){

        //dd($employee_profile->organizational_information);

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

            if(empty($employee_profile->organizational_information)){

                //dd('working...');
                $organizationalInformation=\App\EmployeeOrgInfo::create([]);
                $organizationalInformation->employee_profile()->associate($employee_profile);
                $organizationalInformation->save();

                $model_to_redirect=$organizationalInformation;

            }else $model_to_redirect=$employee_profile->organizational_information;

            return redirect()->route(
                'employee-profile.organizational-info',
                ['organizational_info'=>$model_to_redirect]
            );

        }

        return back()->with('danger', 'Sorry!, form submission failed.');

    }


    public function destroy($id){

        return back()->with('failed', 'Employee delete option not implemented yet.');
        
    }

    public function organizational_info_form(\App\EmployeeOrgInfo $organizational_info){

        $data=[
            'organizational_info'=>$organizational_info,
            'depatrments'=>\App\Department::pluck('name', 'id')->prepend('--Select Department--', ''),
            'designations'=>\App\Designation::pluck('name', 'id')->prepend('--Select Designation--', ''),
            'workingUnits'=>\App\WorkingUnit::pluck('name', 'id')->prepend('--Select Working Unit--', ''),
            'statuses'=>\App\EmployeeOrgInfoStatus::pluck('name', 'id')->prepend('--Select Status--', ''),
            'types'=>\App\EmployeeOrgInfoType::pluck('name', 'id')->prepend('--Select Type--', ''),
            'companies'=>\App\Company::pluck('name', 'id')->prepend('--Select Company--', '')
        ];

        //dd($data);

        return view($this->path('edit_organizational_info'), $data);
        
    }

    public function update_organizational_info(Request $request, \App\EmployeeOrgInfo $organizational_info){

        //dd($request->all());

        $request->validate([
            'department_id'=>'required',
            'designation_id'=>'required',
            'working_unit_id'=>'required',
            'employee_org_info_status_id'=>'required',
            'employee_org_info_type_id'=>'required',
            'company_id'=>'required|integer|exists:companies,id'
        ]);

        $organizational_info->fill($request->all());

        if($organizational_info->save()){

            return back()->with('success', 'Success!, form submitted successfully');

        }

        return back()->with('danger', 'Sorry!, form submission failed.');

    }

}
