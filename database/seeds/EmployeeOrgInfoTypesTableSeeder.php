<?php

use Illuminate\Database\Seeder;

class EmployeeOrgInfoTypesTableSeeder extends Seeder{

    public function run(){

    	$data=[
    		['name'=>'Regular', 'short_name'=>'RE'],
    		['name'=>'Consultant', 'short_name'=>'CE']
    	];

    	\DB::table('employee_org_info_types')->insert($data);
        
    }
}
