<?php

namespace App\Http\Controllers\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;
use Auth;
use Session;


class DepartmentController extends Controller
{
    private $view_root = 'modules/company/department/';
  
    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('department_list', Department::all());
        return $view;
    }

  
    public function create()
    {
        $view = view($this->view_root . 'create');
        return $view;
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments',
            'description' => 'required'
        ]);
        $department = new Department;
        $department->fill($request->all());
        $department->creator_user_id = Auth::id();
        $department->updator_user_id = Auth::id();
        $department->save();
        Session::put('alert-success',$department->name . " successfully created");
        return redirect()->route('company-department.index');
    }

    
    public function show(Department $department)
    {
        //
    }

   
    public function edit(Department $department)
    {
        //
    }

    
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|unique:department,name,'.$department->id,
            'description' => 'required'
        ]);

        $department->fill($request->all());
        $department->update();
        Session::put('alert-success',$department->name . ' updated successfully!');
        return redirect()->route('company-department.index');
    }

   
    public function destroy(Department $department)
    {
        //
    }
}
