<?php

use Illuminate\Database\Seeder;

class EmployeeProfileTableSeeder extends Seeder{

    public function run(){

        $data=[
        	[
                'creator_user_id'=>1,
                'employee_no'=>'EMP001',
                'name'=>'Libon Khan',
                'national_id'=>'123456789',
                'nationality'=>'Bangladeshi',
                'blood_group_id'=>'3',
                'present_address'=>'Lalbagh',
                'permanent_address'=>'Mirpur',
                'user_id'=>2
            ],
        	[
                'creator_user_id'=>1,
                'employee_no'=>'EMP002',
                'name'=>'Alvi Taz',
                'national_id'=>'4654656789',
                'nationality'=>'Bangladeshi',
                'blood_group_id'=>'4',
                'present_address'=>'Azimpur',
                'permanent_address'=>'Lalbagh',
                'user_id'=>3
            ],[
                'creator_user_id'=>1,
                'employee_no'=>'EMP003',
                'name'=>'Factory Manager',
                'national_id'=>'4654656789',
                'nationality'=>'Bangladeshi',
                'blood_group_id'=>'4',
                'present_address'=>'Azimpur',
                'permanent_address'=>'Lalbagh',
                'user_id'=>4
            ],[
                'creator_user_id'=>1,
                'employee_no'=>'EMP004',
                'name'=>'Own Driver',
                'national_id'=>'4654656790',
                'nationality'=>'Bangladeshi',
                'blood_group_id'=>'4',
                'present_address'=>'Motijheel',
                'permanent_address'=>'Bogura',
                'user_id'=>4
            ]
        ];

        \DB::table('employee_profiles')->insert($data);

        $data=[
            [
                'employee_profile_id'=>1,
                'department_id'=>1,
                'designation_id'=>3,
                'working_unit_id'=>1,
                'employee_org_info_status_id'=>2,
                'employee_org_info_type_id'=>1,
            ],[
                'employee_profile_id'=>2,
                'department_id'=>1,
                'designation_id'=>3,
                'working_unit_id'=>2,
                'employee_org_info_status_id'=>2,
                'employee_org_info_type_id'=>1,
            ],[
                'employee_profile_id'=>3,
                'department_id'=>1,
                'designation_id'=>3,
                'working_unit_id'=>3,
                'employee_org_info_status_id'=>2,
                'employee_org_info_type_id'=>1,
            ],[
                'employee_profile_id'=>4,
                'department_id'=>1,
                'designation_id'=>5,
                'working_unit_id'=>3,
                'employee_org_info_status_id'=>2,
                'employee_org_info_type_id'=>1,
            ],
        ];

        \DB::table('employee_org_infos')->insert($data);

    }
}
