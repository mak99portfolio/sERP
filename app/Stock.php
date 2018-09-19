<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model{
    
	protected $gaurded=['id'];

	public function working_unit(){
		return $this->belongsTo('App\WorkingUnit');
	}

	public function product(){
		return $this->belongsTo('App\Product');
	}

}
