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
        $view->with('department_tree', Department::whereNull('parent_department_id')->get());
        return $view;
    }

  
    public function create()
    {
        $view = view($this->view_root . 'create');
        $view->with('department_tree', Department::whereNull('parent_department_id')->get());
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
        $department->save();
        Session::put('alert-success',$department->name . " successfully created");
        return redirect()->route('department.index');
    }

    
    public function show(Department $department)
    {
        //
    }

   
    public function edit(Department $department)
    {
      // dd($department);
        $view = view($this->view_root.'edit');
        $view->with('department_tree', Department::whereNull('parent_department_id')->get());
        $view->with('department',$department);
        return $view;
    }

    
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|unique:departments,name,'.$department->id,
            'description' => 'required'
        ]);

        $department->fill($request->all());
        $department->update();
        Session::put('alert-success',$department->name . ' updated successfully!');
        return redirect()->route('department.index');
    }

   
    public function destroy(Department $department)
    {
        //
    }
}
