<?php
namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\WorkingUnit;
use Illuminate\Http\Request;

class WorkingUnitController extends Controller{

    public function index(){

    	echo 'Moved to http://localhost:8000/inventory/working-unit/create url';

    }


    public function create(){

    	$data=[
    		'working_unit'=>new \App\WorkingUnit,
    		'working_units'=>\App\WorkingUnit::pluck('name', 'id'),
    		'working_unit_types'=>\App\WorkingUnitType::pluck('name', 'id'),
    		'users'=>\App\User::pluck('name', 'id') //Need to filter according to employee profile
    	];

        return view('modules.inventory.working_unit', $data);

    }


    public function store(Request $request){

    	//dd($request->all());

    	$request->validate([
    		'name'=>'required|exists:working_units'
    	]);



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
