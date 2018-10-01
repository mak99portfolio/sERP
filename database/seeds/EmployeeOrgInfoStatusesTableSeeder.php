<?php

use Illuminate\Database\Seeder;

class EmployeeOrgInfoStatusesTableSeeder extends Seeder{

    public function run(){

    	$data=[
    		['name'=>'None Permanent', 'short_name'=>'NP'],
    		['name'=>'Permanent or Confirm', 'short_name'=>'PC'],
    		['name'=>'Resign', 'short_name'=>'RE'],
    		['name'=>'LPR', 'short_name'=>'LPR'],
    	];

    	\DB::table('employee_org_info_statuses')->insert($data);
        
    }

}
