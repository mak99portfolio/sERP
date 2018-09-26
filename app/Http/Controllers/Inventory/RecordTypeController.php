<?php
namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Paginate;


class RecordTypeController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.record_type.{$suffix}";
    }

    public function index(){
        
        $data=[
            'paginate'=>new Paginate('\App\InventoryRecordType', ['id'=>'ID', 'inventory_record_type_no'=>'Type No', 'name'=>'Name', 'short_name'=>'Short Name']),
            'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[

            'model'=>new \App\InventoryRecordType,
            'inventory_record_type_no'=>uCode('inventory_record_types.inventory_record_type_no', 'RT00'),
            'route_name'=>'record-type',
            'title'=>'Record Type'

        ];

        return view($this->path('create'), $data);
        
    }


    public function store(Request $request){

        $request->validate([
            'name'=>'required|unique:inventory_record_types',
            'inventory_record_type_no'=>'required|unique:inventory_record_types',            
            'short_name'=>'required|unique:inventory_record_types'
        ]);

        $model=\App\InventoryRecordType::create($request->all());
        $model->creator()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');

    }


    public function show(\App\InventoryRecordType $record_type){

        return back();

    }


    public function edit(\App\InventoryRecordType $record_type){

        $data=[

            'model'=>$record_type,
            'inventory_record_type_no'=>$record_type->inventory_record_type_no,
            'route_name'=>'record-type',
            'title'=>'Record Type'

        ];

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\InventoryRecordType $record_type){

        $model=$record_type;

        $request->validate([
            'name'=>'required|unique:inventory_record_types,name,'.$model->id,
            'inventory_record_type_no'=>'required|unique:inventory_record_types,inventory_record_type_no,'.$model->id, 
            'short_name'=>'required|unique:inventory_record_types,short_name,'.$model->id
        ]);

        $model->fill($request->all());
        $model->editor()->associate(\Auth::user());
        $model->save();

        return back()->with('success', 'Form Submitted Successfully!.');
        
    }


    public function destroy(\App\InventoryRecordType $record_type){

        return back();
        
    }    
}
