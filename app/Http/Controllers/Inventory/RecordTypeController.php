<?php

namespace App\Http\Controllers\Inventory;

use App\InventoryRecordType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class RecordTypeController extends Controller{

    private $view_root = 'modules/inventory/record_type/';

    public function index(){

        $view = view($this->view_root.'index');
        $view->with('record_type_list', InventoryRecordType::all());
        return $view;

    }


    public function create(){

        $view = view($this->view_root.'create');
        return $view;

    }


    public function store(Request $request)
    {
        $request->validate([
            'record_type_id' => 'required|unique:inventory_record_types',
            'name' => 'required|unique:inventory_record_types',
            'short_name' => 'required|unique:inventory_record_types',
        ]);
        $record_type = new InventoryRecordType;
        $record_type->fill($request->input());
        $record_type->creator_user_id = Auth::id();
        $record_type->save();
        Session::put('alert-success', $record_type->name . ' created successfully');
        return redirect()->route('record-type.index');
    }

    public function show($id)
    {

    }


    public function edit($id){

    }


    public function update(Request $request, $id){

    }


    public function destroy($id){

    }
}
