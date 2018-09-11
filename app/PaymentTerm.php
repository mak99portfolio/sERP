<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentTerm extends Model{

	protected $guarded=['id'];

	public function vendor(){
		return $this->belongsTo('App\Vendor');
	}

}