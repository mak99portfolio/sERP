<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorEnclosure extends Model{

	protected $guarded=['id'];

	public function vendors(){
		return $this->hasMany('App\Vendor');
	}

}
