<?php
namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\WorkingUnit;
use App\Helpers\Paginate;
use Illuminate\Http\Request;

class WorkingUnitController extends Controller{

    public function index(){
    	
    	$data=[
    		'paginate'=>new Paginate('\App\WorkingUnit', ['id'=>'ID','name'=>'Name']),
    		'carbon'=>new \Carbon\Carbon
    	];

    	dd($data['paginate']);

    	return view('modulles.inventory.working_units', $data);


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

        return view('modules.inventory.working_unit_form', $data);

    }


    public function store(Request $request){

    	//dd($request->all());

    	$request->validate([
    		'name'=>'required|unique:working_units,name',
    		'sort_name'=>'required|unique:working_units,sort_name',
    		'working_unit_type_id'=>'required|integer',
    		'parent_unit_id'=>'nullable|integer',
    		'in_charge'=>'required|integer',
    		'company_id'=>'required|integer',
    		'country_id'=>'required|integer',
    		'division_id'=>'required|integer',
    		'district_id'=>'required|integer',
    		'address'=>'required|max:500',
    	]);

    	$workingUnit=\App\WorkingUnit::create($request->all());
    	return back()->with('success', 'Form submitted successfully');

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
