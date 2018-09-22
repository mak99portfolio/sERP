<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryReceiveForeign extends Model{
    
	protected $guarded=['id'];

	public function inventory_receive(){
		return $this->belongsTo('App\InventoryReceive', 'inventory_receive_id');
	}

	public function commercial_invoice(){
		return $this->belongsTo('App\CommercialInvoice', 'commercial_invoice_id');
	}

}
