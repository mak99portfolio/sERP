<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryRequisitionStatus extends Model{

	function requisitions(){
		return $this->hasMany('App\InventoryRequisition', 'inventory_requisition_status_id');
	}

}
