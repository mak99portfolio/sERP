<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestController extends Controller{

	public function __construct(){
		//$this->middleware('hasPermission:can_test');
	}

    public function index(){
    	//Role::create(['name' => 'super_admin']);
        //Permission::create(['name' => 'can_test']);
        $permission=Permission::where(['name'=>'can_test'])->first();
        $role=Role::where(['name'=>'super_admin'])->first();
        $role->givePermissionTo($permission);
        echo 'role assign';
    }

}
