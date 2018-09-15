<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeOrganizationalInformation extends Model{

	protected $gaurded=['id'];

	public function employee_profile(){
		return $this->belongsTo('App\EmployeeProfile');
	}

}
