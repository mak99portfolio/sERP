<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryRequisitionItem extends Model{

	protected $guarded=['id'];

	public function requisition(){
		return $this->belongsTo('App\InventoryRequisition');
	}

	public function product(){
		return $this->belongsTo('App\Product');
	}

}
