<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnclosureVendor extends Model{

	protected $guarded=['id'];

	public function vendors(){
		return $this->belongsTo('App\Model\Procurement\Vendor');
	}
	public function enclosure(){
		return $this->belongsTo('App\Model\Core\Enclosure');
	}

}
