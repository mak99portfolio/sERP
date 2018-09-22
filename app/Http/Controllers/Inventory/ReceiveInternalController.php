<?php

namespace App\Http\Controllers\Inventory;  use App\Http\Controllers\Controller;

use App\ReceiveInternal;
use Illuminate\Http\Request;

class ReceiveInternalController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.receive.internal.{$suffix}";
    }

    public function index(){
        $data=[
            //'paginate'=>new Paginate('\App\InventoryIssue', ['id'=>'ID']),
            //'carbon'=>new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);
    }

    public function create(){

        $data=[
            'inventory_receive'=>new \App\InventoryReceive,
            'working_units'=>\App\WorkingUnit::pluck('name', 'id') //Need to filter in future
        ];
        
        return view($this->path('create'), $data);
        
    }

    public function store(Request $request){
        
    }

    public function show(ReceiveInternal $receiveInternal){
        
    }

    public function edit(ReceiveInternal $receiveInternal){
        
    }

    public function update(Request $request, ReceiveInternal $receiveInternal){
        
    }

    public function destroy(ReceiveInternal $receiveInternal){
        
    }
}
