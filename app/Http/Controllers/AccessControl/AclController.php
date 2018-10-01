<?php

namespace App\Http\Controllers\AccessControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Paginate;

//Spatie package related models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AclController extends Controller{

/*    public function __construct(){
        $this->middleware('hasPermission:access_to_acl');
    }*/

    protected function path(string $suffix){
        return "modules.access_control.acl.{$suffix}";
    }

    public function index(){

        $data=[
            'roles'=>Role::all(),
            'permissions'=>Permission::all(),
            'role_has_permissions'=>\App\RoleHasPermission::all(),
            'cross_check'=>function($role_has_permissions, $role_id, $permission_id){

                foreach($role_has_permissions as $row){
                    if($role_id==$row->role_id && $permission_id==$row->permission_id){
                        return 'checked';
                    }
                }

                return '';
            }
        ];

        //dd($data);

        return view($this->path('index'), $data);
        
    }

    public function create(){
        
    }

    public function store(Request $request){

        $matrix=$request->get('matrix');

        \App\RoleHasPermission::truncate();

        if(is_array($matrix)){

            foreach($matrix as $role=>$permissions){

                $role_model=Role::find($role);
                $role_model->syncPermissions($permissions);
                
            }

        }

        return back()->with('success', 'Form Submitted Successfully!.');
        
    }

    public function show($id){
        
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){
        
    }

    public function destroy($id){
        
    }

    public function role_user_matrix(){

        $data=[
            'users'=>\App\User::all(),
            'roles'=>Role::all(),
            'model_has_roles'=>\App\ModelHasRole::all(),
            'cross_check'=>function($model_has_roles, $role_id, $user_id){

                foreach($model_has_roles as $row){
                    if($user_id==$row->model_id && $role_id==$row->role_id){
                        return 'checked';
                    }
                }

                return '';
            }
        ];

        //dd($data);

        return view($this->path('role_user_matrix'), $data);

    }

    public function store_role_user_matrix(Request $request){

        $matrix=$request->get('matrix');

        //dd($matrix);

        \App\ModelHasRole::truncate();

        if(is_array($matrix)){

            foreach($matrix as $role_id=>$users){

                $role=Role::find($role_id);

                //dd($role);

                foreach($users as $user_id){

                    $user=\App\User::find($user_id);
                    $user->assignRole($role);
                    $user->save();

                }
                
            }

        }

        return back()->with('success', 'Form Submitted Successfully!.');

    }

    public function user_permission_matrix(){

        $data=[
            'users'=>\App\User::all(),
            'permissions'=>Permission::all(),
            'model_has_permissions'=>\App\ModelHasPermission::all(),
            'cross_check'=>function($model_has_permissions, $user_id, $permission_id){

                foreach($model_has_permissions as $row){
                    if($user_id==$row->model_id && $permission_id==$row->permission_id){
                        return 'checked';
                    }
                }

                return '';
            }
        ];

        //dd($data);

        return view($this->path('user_permission_matrix'), $data);

    }

    public function store_user_permission_matrix(Request $request){

        $matrix=$request->get('matrix');

        \App\ModelHasPermission::truncate();

        if(is_array($matrix)){

            foreach($matrix as $user_id=>$permissions){

                $user=\App\User::find($user_id);
                $user->syncPermissions($permissions);
                
            }

        }

        return back()->with('success', 'Form Submitted Successfully!.');

    }

}
