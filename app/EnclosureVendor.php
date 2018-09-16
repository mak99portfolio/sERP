<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnclosureVendor extends Model{

	protected $guarded=['id'];

	public function vendors(){
		return $this->belongsTo('App\Vendor');
	}
	public function enclosure(){
		return $this->belongsTo('App\Enclosure');
	}

}
