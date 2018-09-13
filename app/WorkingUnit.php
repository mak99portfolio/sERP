<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingUnit extends Model{

	protected $guarded = ['id'];

	public function parent(){
		return $this->belongsTo('App\WorkingUnit', 'parent_unit_id');
	}

	public function type(){
		return $this->belongsTo('App\WorkingUnitType');
	}

	public function company(){
		return $this->belongsTo('App\Company');
	}

	public function in_charge(){
		return $this->belongsTo('App\User','in_charge');
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

}
