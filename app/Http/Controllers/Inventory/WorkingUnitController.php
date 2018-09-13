<?php
namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\WorkingUnit;

use Illuminate\Http\Request;
use App\District;
use DB;
class WorkingUnitController extends Controller{

    public function index(){

        $working_unit_list=\App\WorkingUnit::all();
    	return view('modules.inventory.working_unit_list',compact('working_unit_list'));

    }


    public function create(){

    	$data=[
    		'working_unit'=>new \App\WorkingUnit,
    		'working_units'=>\App\WorkingUnit::pluck('name', 'id'),
    		'working_unit_types'=>\App\WorkingUnitType::pluck('name', 'id'),
    		'countries'=>\App\Country::pluck('name', 'id'),
    		'divisions'=>\App\Division::pluck('name', 'id'),
    		'districts'=>\App\District::pluck('name', 'id'),
    		'users'=>\App\User::pluck('name', 'id') //Need to filter according to employee profile
    	];

        return view('modules.inventory.working_unit', $data);

    }


    public function store(Request $request){

    	//dd($request->all());

    	$request->validate([
    		'name'=>'required|exists:working_units',
    		'working_unit_type_id'=>'required|integer',
    		'parent_unit_id'=>'required|integer',
    		'in_charge'=>'required|integer',
    		'address'=>'required|max:500',
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

    function district_search(\App\Division $division, Request $request){


        return response()->json($division->districts);
    }
}
