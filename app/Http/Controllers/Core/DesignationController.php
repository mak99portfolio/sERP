<?php
namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationController extends Controller{
    
    protected function path(string $suffix){
        return "modules.core.designation.{$suffix}";
    }

    public function index(){
        
        $data=[
            'paginate'=>\App\Designation::all(),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[

            'model'=>new \App\Designation,
            'route_name'=>'designation',
            'title'=>'Designation'

        ];

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        $request->validate([
            'name'=>'required|unique:designations',
            'short_name'=>'required|unique:designations'
        ]);

        $model=\App\Designation::create($request->all());
        $model->designation_no=uCode('designations.designation_no', 'DG000');
        $model->creator()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');

    }


    public function show(\App\Designation $designation){
        
    }


    public function edit(\App\Designation $designation){

        $data=[

            'model'=>$designation,
            'route_name'=>'designation',
            'title'=>'Designation'

        ];

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\Designation $designation){

        $model=$designation;

        $request->validate([
            'name'=>'required|unique:designations,name,'.$model->id,
            'short_name'=>'required|unique:designations,short_name,'.$model->id
        ]);

        $model->fill($request->all());
        $model->editor()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');
        
    }


    public function destroy(\App\Designation $return_reason){

        return redirect()->back();
        
    }

}
