<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryReceive extends Model{

	protected $guarded=['id'];

	public function foreign(){
		return $this->hasOne('App\InventoryReceiveForeign', 'inventory_receive_id');
	}

	public function stocks(){
		return $this->hasMany('App\Stock', 'inventory_receive_id');
	}

	public function creator(){
		return $this->belongsTo('App\User', 'creator_user_id');
	}

	public function editor(){
		return $this->belongsTo('App\User', 'updator_user_id');
	}

	public function item_status(){
		return $this->belongsTo('App\ProductStatus', 'product_status_id');
	}

	public function item_pattern(){
		return $this->belongsTo('App\ProductPattern', 'product_pattern_id');
	}

	public function working_unit(){
		return $this->belongsTo('App\WorkingUnit', 'working_unit_id');
	}

}
