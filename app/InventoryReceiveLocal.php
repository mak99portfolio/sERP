<?php

namespace App\Model\inventory;

use Illuminate\Database\Eloquent\Model;

class InventoryReceiveLocal extends Model{

	protected $guarded=['id'];

	public function inventory_receive(){
		return $this->belongsTo('App\InventoryReceive', 'inventory_receive_id');
	}

	public function purchase_order(){
		return $this->belongsTo('App\LocalPurchaseOrder', 'local_purchase_order_id');
	}

}
