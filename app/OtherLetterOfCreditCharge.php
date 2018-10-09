<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherLetterOfCreditCharge extends Model{

	protected $guarded=['id'];

	public function cost_sheet(){
		return $this->belongsTo('App\CostSheet', 'cost_sheet_id');
	}

	public function cost_particular(){
		return $this->belongsTo('App\CostParticular', 'cost_particular_id');
	}
    
}
