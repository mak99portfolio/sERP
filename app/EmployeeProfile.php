<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model{

	protected $guarded=['id'];

	public function creator(){
		return $this->belongsTo('App\User', 'creator_user_id');
	}

	public function editor(){
		return $this->belongsTo('App\User', 'updator_user_id');
	}

	public function organizational_information(){
		return $this->hasOne('App\EmployeeOrgInfo', 'employee_profile_id');
	}

	public function blood_group(){
		return $this->belongsTo('App\BloodGroup');
	}

}
