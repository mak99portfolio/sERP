<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeOrgInfo extends Model{

	protected $guarded=['id'];

	public function employee_profile(){
		return $this->belongsTo('App\EmployeeProfile');
	}

}
