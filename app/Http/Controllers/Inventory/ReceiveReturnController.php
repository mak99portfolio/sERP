<?php

namespace App\Http\Controllers\Inventory;  use App\Http\Controllers\Controller;

use App\ReceiveReturn;
use Illuminate\Http\Request;

class ReceiveReturnController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.receive.return.{$suffix}";
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


    public function show(ReceiveReturn $receiveReturn){
        
    }


    public function edit(ReceiveReturn $receiveReturn){
        
    }


    public function update(Request $request, ReceiveReturn $receiveReturn)
    {
        
    }


    public function destroy(ReceiveReturn $receiveReturn)
    {
        
    }
}
