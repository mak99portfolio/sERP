<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryReceive extends Model{

	protected $guarded=['id'];

	public function foreigns(){
		return $this->hasMany('App\InventoryReceiveForeign', 'inventory_receive_id');
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

}
