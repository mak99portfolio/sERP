<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisitionPurpose extends Model{

	protected $guarded=['id'];

	public function creator(){
		return $this->belongsTo('App\User', 'creator_user_id');
	}

	public function updator(){
		return $this->belongsTo('App\User', 'updator_user_id');
	}

}
