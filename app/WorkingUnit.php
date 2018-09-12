<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingUnit extends Model{

	protected $gaurded=['id'];

	public function parent(){
		return $this->belongsTo('App\WorkingUnit');
	}

	public function type(){
		return $this->belongsTo('App\WorkingUnitType');
	}

}
