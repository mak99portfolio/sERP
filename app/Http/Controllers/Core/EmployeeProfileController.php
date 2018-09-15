<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeProfileController extends Controller{

    protected function path(string $suffix){
        return "modules.core.employee_profile.{$suffix}";
    }

    public function index(){
        //return view($this->path('index'));
    }


    public function create(){

        $data=[
            'employeeProfile'=>new \App\EmployeeProfile
        ];

        return view($this->path('create'), $data);

    }

    public function organizational_info_form(/*\App\EmployeeProfile $employeeProfile*/){

        //dd($this->path('organizational_info_form'));
        return view($this->path('edit_organizational_info'));
        
    }


    public function store(Request $request){
        
    }


    public function show($id){
        
    }


    public function edit($id){
        
    }

    public function update(Request $request, $id){
        
    }


    public function destroy($id){
        
    }
}
