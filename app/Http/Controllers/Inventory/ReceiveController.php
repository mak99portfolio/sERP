<?php

namespace App\Http\Controllers\Inventory;  use App\Http\Controllers\Controller;

use App\Receive;
use Illuminate\Http\Request;

class ReceiveController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.receive.{$suffix}";
    }

    public function index(){
        
        $data=[];
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


    public function show(Receive $receive){
        
    }


    public function edit(Receive $receive){
        
    }


    public function update(Request $request, Receive $receive){
        
    }


    public function destroy(Receive $receive){
        
    }
}
