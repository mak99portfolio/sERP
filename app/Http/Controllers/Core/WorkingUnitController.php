<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\WorkingUnit;
use App\Helpers\Paginate;
use Illuminate\Http\Request;

class WorkingUnitController extends Controller{

    protected function path(string $suffix){
        return "modules.core.working_unit.{$suffix}";
    }

    public function index(){
    	
    	$data=[
            //'paginate'=>new Paginate('\App\WorkingUnit', ['name'=>'Name', 'short_name'=>'Short Name']),
    		'paginate'=>\App\WorkingUnit::all(),
    		'carbon'=>new \Carbon\Carbon
    	];

    	//dd($data['paginate']);

    	return view($this->path('index'), $data);


    }


    public function create(){

    	$data=[
            'working_unit'=>new \App\WorkingUnit,
    		'working_unit_no'=>uCode('working_units.working_unit_no', 'WU00'),
    		'working_units'=>\App\WorkingUnit::pluck('name', 'id')->prepend('--Select Parent Unit--', ''),
    		'working_unit_types'=>\App\WorkingUnitType::pluck('name', 'id'),
    		'countries'=>\App\Country::pluck('name', 'id')->prepend('--select--', ''),
    		'divisions'=>\App\Division::pluck('name', 'id')->prepend('--select--', ''),
    		'districts'=>\App\District::pluck('name', 'id')->prepend('--select--', ''),
            'companies'=>\App\Company::pluck('name', 'id'),
    		'employees'=>\App\EmployeeProfile::pluck('name', 'id') //Need to filter according to employee profile
    	];

        return view($this->path('create'), $data);

    }


    public function store(Request $request){

    	//dd($request->all());

    	$request->validate([
    		'name'=>'required|unique:working_units,name',
    		'short_name'=>'required|unique:working_units,short_name',
            'working_unit_no'=>'required|unique:working_units',
    		'working_unit_type_id'=>'required|integer',
    		'parent_unit_id'=>'nullable|integer',
    		'in_charge'=>'required|integer',
    		'company_id'=>'nullable|integer',
    		'country_id'=>'required|integer',
    		'division_id'=>'required|integer',
    		'district_id'=>'required|integer',
    		'address'=>'required|max:500',
    	]);

    	$working_unit=\App\WorkingUnit::create($request->all());
        if($working_unit->save()) return back()->with('success', 'Form submitted successfully');
        //if($workingUnit->save()) return back()->with('success', 'Form submitted successfully');
        return back()->with('danger', 'Sorry, form submission failed');

    }


    public function show(WorkingUnit $workingUnit)
    {

    }


    public function edit(WorkingUnit $workingUnit){
        $data=[
            'working_unit'=>$workingUnit,
            'working_unit_no'=>$workingUnit->working_unit_no,
            'working_units'=>\App\WorkingUnit::pluck('name', 'id')->prepend('--Select Parent Unit--', ''),
            'working_unit_types'=>\App\WorkingUnitType::pluck('name', 'id'),
            'countries'=>\App\Country::pluck('name', 'id'),
            'divisions'=>\App\Division::pluck('name', 'id'),
            'districts'=>\App\District::pluck('name', 'id'),
            'companies'=>\App\Company::pluck('name', 'id'),
            'employees'=>\App\EmployeeProfile::pluck('name', 'id') //Need to filter according to employee profile
        ];

        return view($this->path('create'), $data);
    }


    public function update(Request $request, WorkingUnit $workingUnit){

        $request->validate([
            'name'=>'required|unique:working_units,name,'.$workingUnit->id,
            'short_name'=>'required|unique:working_units,short_name,'.$workingUnit->id,
            'working_unit_no'=>'required|unique:working_units,working_unit_no,'.$workingUnit->id,
            'working_unit_type_id'=>'required|integer',
            'parent_unit_id'=>'nullable|integer',
            'in_charge'=>'required|integer',
            'company_id'=>'nullable|integer',
            'country_id'=>'required|integer',
            'division_id'=>'required|integer',
            'district_id'=>'required|integer',
            'address'=>'required|max:500',
        ]);

        $workingUnit->fill($request->all());
        if($workingUnit->save()) return back()->with('success', 'Form edited successfully');
        return back()->with('danger', 'Form Submission failed!.');

    }


    public function destroy(WorkingUnit $workingUnit){
        if($workingUnit->delete()) return back()->with('success', 'Form submitted successfully');
        return back()->with('danger', 'Form Submission failed!.');
    }

    function district_search(\App\Division $division, Request $request){


        return response()->json($division->districts);
    }
}
