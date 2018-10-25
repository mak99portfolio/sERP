<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder{

    public function run(){

    	$data=[
    		[	'parent_department_id'=>null,
    			'name'=>'Director',
    			'description'=>'Director',
    			'creator_user_id'=>1,
    			'updator_user_id'=>1,
    			'status'=>1
    		],
            [	'parent_department_id'=>null,
    			'name'=>'Finance',
    			'description'=>'Finance',
    			'creator_user_id'=>1,
    			'updator_user_id'=>1,
    			'status'=>1
    		],
            [	'parent_department_id'=>null,
    			'name'=>'Sales & Marketing',
    			'description'=>'Sales & Marketing',
    			'creator_user_id'=>1,
    			'updator_user_id'=>1,
    			'status'=>1
    		],
            [	'parent_department_id'=>null,
    			'name'=>'Operation',
    			'description'=>'Operation',
    			'creator_user_id'=>1,
    			'updator_user_id'=>1,
    			'status'=>1
    		],
    		[	'parent_department_id'=>null,
    			'name'=>'null',
    			'description'=>'null',
    			'creator_user_id'=>1,
    			'updator_user_id'=>1,
    			'status'=>1
    		],
		];
	
    	\DB::table('departments')->insert($data);
        
    }

}
