<?php

namespace App\Http\Controllers\AccessControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Paginate;

//Spatie package related models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller{

    protected function path(string $suffix){
        return "modules.access_control.permission.{$suffix}";
    }

    public function index(){
        
        $data=[
            'paginate'=>new Paginate(new Permission, ['id'=>'ID', 'name'=>'Name']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[

            'model'=>new Permission,
            'route_name'=>'permission',
            'title'=>'Permissions'

        ];

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        $request->validate([
            'name'=>'required|unique:permissions'
        ]);

        Permission::create($request->all());
        return back()->with('success', 'Form Submitted Successfully!.');

    }


    public function show(\App\InventoryReturnReason $return_reason){
        
    }


    public function edit(\App\InventoryReturnReason $return_reason){

        $data=[

            'model'=>$return_reason,
            'route_name'=>'return-reason',
            'title'=>'Return Reason'

        ];

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\InventoryReturnReason $return_reason){

        $model=$return_reason;

        $request->validate([
            'name'=>'required|unique:inventory_return_reasons,name,'.$model->id,
            'short_name'=>'required|unique:inventory_return_reasons,short_name,'.$model->id
        ]);

        $model->fill($request->all());
        $model->editor()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');
        
    }


    public function destroy(\App\InventoryReturnReason $return_reason){

        return redirect()->back();
        
    }

}
