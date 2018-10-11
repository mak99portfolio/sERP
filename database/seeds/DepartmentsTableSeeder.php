<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder{

    public function run(){

    	$data=[
    		[	'parent_department_id'=>null,
    			'name'=>'Inventory Department',
    			'description'=>'Departments description...',
    			'creator_user_id'=>1,
    			'updator_user_id'=>1,
    			'status'=>1
    		]
		];
	
    	\DB::table('departments')->insert($data);
        
    }

}
