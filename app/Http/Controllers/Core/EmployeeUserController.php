<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Paginate;

//Spatie package related models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class EmployeeUserController extends Controller{


    protected function path(string $suffix){
        return "modules.core.employee_user.{$suffix}";
    }

    public function index(){

    	$user=\App\User::whereHas('employee_profile');
        
        $data=[
            'paginate'=>new Paginate($user, ['id'=>'ID', 'name'=>'Name', 'username'=>'Username', 'email'=>'Email']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[
            'user'=>new \App\User,
        	'employees'=>\App\EmployeeProfile::doesntHave('user')->pluck('name', 'id'),
            'roles'=>Role::pluck('name', 'id'),
            'users'=>\App\User::all()->pluck('name', 'id')
        ];

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        //dd($request->all());

        $request->validate([

        	'employee_profile_id'=>'required|integer',
            'username'=>'required|string|unique:users',
            'email'=>'required|email|unique:users',
            'roles'=>'required|array',
            'password'=>'required|string|min:6|confirmed'

        ]);


        $employee_profile=\App\EmployeeProfile::find($request->get('employee_profile_id'));

        if(empty($employee_profile)) return back()->with('failed', 'Sorry!, Employee profile does not exists.');

        $new_user=\App\User::create([
            'name'=>$employee_profile->name,
            'username'=>$request->get('username'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('password'))
        ]);

        $employee_profile->user()->associate($new_user);
        $employee_profile->save();

        $new_user->syncRoles($request->get('roles'));
        $new_user->save();

        return back()->with('success', 'Form Submitted Successfully!.');
        
    }


    public function show($id){
        
    }


    public function edit($id){
        
    }


    public function update(Request $request, $id){
        
    }

    public function destroy(\App\User $user){

        //$user->delete();
        return back()->with('failed', 'Sorry!, you have no permission to perform this action.');
        
    }

	
}
