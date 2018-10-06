<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingUnit extends Model{

	protected $guarded = ['id'];

	public function parent(){
		return $this->belongsTo('App\WorkingUnit', 'parent_unit_id');
	}

	public function type(){
		return $this->belongsTo('App\WorkingUnitType', 'working_unit_type_id');
	}

	public function company(){
		return $this->belongsTo('App\Company');
	}

	public function employees(){
		return $this->hasMany('App\EmployeeOrgInfo', 'working_unit_id');
	}

	public function employee_in_charge(){
		return $this->belongsTo('App\EmployeeProfile', 'in_charge');
	}

	public function country(){
		return $this->belongsTo('App\Country');
	}

	public function division(){
		return $this->belongsTo('App\Division');
	}

	public function district(){
		return $this->belongsTo('App\District');
	}

	public function stocks(){
		return $this->hasMany('App\Stock');
	}

	public function outgoing_requisitions(){
		return $this->hasMany('App\InventoryRequisition', 'sender_depot_id');
	}

	public function incoming_requisitions(){
		return $this->hasMany('App\InventoryRequisition', 'requested_depot_id');
	}

}
