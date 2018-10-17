<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model{

	protected $guarded=['id'];

	protected $dates=[
		'created_at', 'edited_at', 'deleted_at'
	];

	public function creator(){
		return $this->belongsTo('App\User', 'creator_user_id');
	}

	public function editor(){
		return $this->belongsTo('App\User', 'updator_user_id');
	}



}
