<?php

namespace App\Http\Controllers\AccessControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Paginate;

//Spatie package related models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AclController extends Controller{

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
            'users'=>User::all(),
            'roles'=>Role::all(),
            'model_has_roles'=>\App\ModelHasRole::all(),
            'cross_check'=>function($model_has_roles, $model_id, $role_id){

                foreach($model_has_roles as $row){
                    if($model_id==$row->model_id && $role_id==$row->role_id){
                        return 'checked';
                    }
                }

                return '';
            }
        ];

        //dd($data);

        return view($this->path('role_user_matrix'), $data);

    }
}
