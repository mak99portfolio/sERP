<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryReceiveInternal extends Model{
    
    protected $guarded=['id'];

	public function inventory_receive(){
		return $this->belongsTo('App\InventoryReceive', 'inventory_receive_id');
	}

	public function issue(){
		return $this->belongsTo('App\InventoryIssue', 'inventory_issue_id');
	}

}
