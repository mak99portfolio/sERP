<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Paginate;

class AdjustmentPurposeController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.adjustment_purpose.{$suffix}";
    }

    public function index(){
        
        $data=[
            'paginate'=>new Paginate('\App\InventoryAdjustmentPurpose', ['id'=>'ID', 'name'=>'Name', 'short_name'=>'Short Name']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[

            'model'=>new \App\InventoryAdjustmentPurpose,
            'route_name'=>'adjustment-purpose',
            'title'=>'Adjustment Purpose'

        ];

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        $request->validate([
            'name'=>'required|unique:inventory_adjustment_purposes',
            'short_name'=>'required|unique:inventory_adjustment_purposes'
        ]);

        $model=\App\InventoryAdjustmentPurpose::create($request->all());
        $model->creator()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');

    }


    public function show(\App\InventoryAdjustmentPurpose $adjustment_purpose){
        
    }


    public function edit(\App\InventoryAdjustmentPurpose $adjustment_purpose){

        $data=[

            'model'=>$adjustment_purpose,
            'route_name'=>'adjustment-purpose',
            'title'=>'Adjustment Purpose'

        ];

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\InventoryAdjustmentPurpose $adjustment_purpose){

        $model=$adjustment_purpose;

        $request->validate([
            'name'=>'required|unique:inventory_adjustment_purposes,name,'.$model->id,
            'short_name'=>'required|unique:inventory_adjustment_purposes,short_name,'.$model->id
        ]);

        $model->fill($request->all());
        $model->editor()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');
        
    }


    public function destroy(\App\InventoryAdjustmentPurpose $adjustment_purpose){

        return redirect()->back();
        
    }
}
