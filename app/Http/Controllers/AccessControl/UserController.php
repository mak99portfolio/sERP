<?php

namespace App\Http\Controllers\AccessControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Paginate;

//Spatie package related models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends Controller{


    protected function path(string $suffix){
        return "modules.access_control.user.{$suffix}";
    }

    public function index(){
        
        $data=[
            'paginate'=>new Paginate('\App\User', ['id'=>'ID', 'name'=>'Name', 'username'=>'Username', 'email'=>'Email']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[
            'user'=>new \App\User,
            'roles'=>Role::pluck('name', 'id'),
        ];

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        //dd($request->all());

        $request->validate([

            'name'=>'required|string',
            'username'=>'required|string|unique:users',
            'email'=>'required|email|unique:users',
            'roles'=>'required|array',
            'password'=>'required|string|min:6|confirmed'

        ]);

        $new_user=\App\User::create([
            'name'=>$request->get('name'),
            'username'=>$request->get('username'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('password'))
        ]);

        $new_user->syncRoles($request->get('roles'));

        return back()->with('success', 'Form Submitted Successfully!.');
        
    }


    public function show($id){
        
    }


    public function edit($id){
        
    }


    public function update(Request $request, $id){
        
    }

    public function destroy(\App\User $user){

        $user->delete();
        return back()->with('success', 'Request Submitted Successfully!.');
        
    }

}
