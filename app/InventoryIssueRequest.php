<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryIssueRequest extends Model{

	protected $guarded=['id'];

	public function requisition(){
		return $this->belongsTo('App\InventoryRequisition', 'inventory_requisition_id');
	}

	public function sender(){
		return $this->belongsTo('App\WorkingUnit', 'sender_working_unit_id');
	}

	public function requested_to(){
		return $this->belongsTo('App\WorkingUnit', 'requested_working_unit_id');
	}

	public function items(){
		return $this->hasMany('App\InventoryIssueRequestItem', 'inventory_issue_request_id');
	}

}
