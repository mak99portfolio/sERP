<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model{

	protected $guarded=['id'];

	public function creator(){
		return $this->belongsTo('App\User', 'creator_user_id');
	}

	public function updator(){
		return $this->belongsTo('App\User', 'updator_user_id');
	}

	public function organizational_information(){
		return $this->belongsTo('App\EmployeeProfile');
	}

}
