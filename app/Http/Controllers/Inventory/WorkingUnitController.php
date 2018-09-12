<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\WorkingUnit;
use Illuminate\Http\Request;

class WorkingUnitController extends Controller{

    public function index(){

    	$data['working_unit_types']=\App\WorkingUnitType::pluck('name', 'id');
        return view('modules.inventory.working_unit', $data);

    }


    public function create(){

    }


    public function store(Request $request){

    }


    public function show(WorkingUnit $workingUnit)
    {

    }


    public function edit(WorkingUnit $workingUnit)
    {

    }


    public function update(Request $request, WorkingUnit $workingUnit)
    {

    }


    public function destroy(WorkingUnit $workingUnit){

    }
}
