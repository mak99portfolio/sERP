<?php

namespace App\Http\Controllers\Inventory;  use App\Http\Controllers\Controller;

use App\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller{

    protected function path(string $suffix){
        return "modules.inventory.issue.{$suffix}";
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


    public function show(Issue $issue){
        
    }


    public function edit(Issue $issue){
        
    }


    public function update(Request $request, Issue $issue){
        
    }


    public function destroy(Issue $issue){
        
    }
}
