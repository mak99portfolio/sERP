<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AccessControlSeeder extends Seeder{

    public function run(){

		// Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

    	$dev=\DB::table('users')->where('email', 'asraful3161@gmail.com')->first();

    	if(empty($dev)){

	        $data=[
	        	['name'=>'Asraful islam', 'email'=>'asraful3161@gmail.com', 'password'=>bcrypt('12345678')],
	        ];

	        \DB::table('users')->insert($data);

    	}

    	//data for roles table
    	$data=[
    		['name'=>'developer', 'guard_name'=>'web'],
    		['name'=>'depo_admin', 'guard_name'=>'web'],
    		['name'=>'depo_user', 'guard_name'=>'web']
    	];

    	\DB::table('roles')->insert($data);

    	//data for permissions table
    	$data=[
    		['name'=>'view_developer_menu', 'guard_name'=>'web'],//1
    		['name'=>'access_to_acl', 'guard_name'=>'web'],//2
    		['name'=>'approve_initial_requisition', 'guard_name'=>'web'],//3
    		['name'=>'approve_final_requisition', 'guard_name'=>'web'],//4
    		['name'=>'approve_initial_issue', 'guard_name'=>'web'],//5
    		['name'=>'approve_final_issue', 'guard_name'=>'web'],//6
    		['name'=>'access_to_inventory', 'guard_name'=>'web']//7
    	];

    	\DB::table('permissions')->insert($data);

    	$dev=\DB::table('users')->where('email', 'asraful3161@gmail.com')->first();

    	//Data for role user pivot
    	$data=[
            ['role_id'=>1, 'model_type'=>'App\User', 'model_id'=>$dev->id],
            ['role_id'=>2, 'model_type'=>'App\User', 'model_id'=>2],
            ['role_id'=>2, 'model_type'=>'App\User', 'model_id'=>3],
    		['role_id'=>2, 'model_type'=>'App\User', 'model_id'=>4],
    	];

    	\DB::table('model_has_roles')->insert($data);

    	//Data for role permission pivot
    	$data=[
    		['permission_id'=>1, 'role_id'=>1],
    		['permission_id'=>2, 'role_id'=>1],
    		['permission_id'=>3, 'role_id'=>2],
    		['permission_id'=>4, 'role_id'=>2],
    		['permission_id'=>5, 'role_id'=>2],
    		['permission_id'=>6, 'role_id'=>2],
    		['permission_id'=>7, 'role_id'=>2],
    		['permission_id'=>3, 'role_id'=>3],
    		['permission_id'=>5, 'role_id'=>3],
    		['permission_id'=>7, 'role_id'=>3]
    	];

    	\DB::table('role_has_permissions')->insert($data);
        
    }

}
