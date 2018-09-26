<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Paginate;

class ReturnReasonController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.return_reason.{$suffix}";
    }

    public function index(){
        
        $data=[
            'paginate'=>new Paginate('\App\InventoryReturnReason', ['id'=>'ID', 'name'=>'Name', 'short_name'=>'Short Name']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[

            'model'=>new \App\InventoryReturnReason,
            'route_name'=>'return-reason',
            'title'=>'Return Reason'

        ];

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        $request->validate([
            'name'=>'required|unique:inventory_return_reasons',
            'short_name'=>'required|unique:inventory_return_reasons'
        ]);

        $model=\App\InventoryReturnReason::create($request->all());
        $model->creator()->associate(\Auth::user());
        $model->save();

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
