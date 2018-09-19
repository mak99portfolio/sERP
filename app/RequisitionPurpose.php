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
	public function local_requisitions(){
		return $this->hasMany('App\LocalRequisition');
	}
	public function foreign_requisitions(){
		return $this->hasMany('App\ForeignRequisition');
	}

}
