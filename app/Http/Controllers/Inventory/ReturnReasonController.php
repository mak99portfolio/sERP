<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReturnReasonController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.return_reason.{$suffix}";
    }

    public function index(){
        
        $data=[];
        return view($this->path('index'), $data);

    }


    public function create(){

        $data=[];
        return view($this->path('create'), $data);
        
    }

    public function store(Request $request){
        
    }

    public function show($id){
        
    }


    public function edit($id){
        
    }


    public function update(Request $request, $id){
        
    }


    public function destroy($id){
        
    }
}
