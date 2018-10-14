<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryIssueRequestItem extends Model{

	protected $guarded=['id'];

	public function product(){
		return $this->belongsTo('App\Product', 'product_id');
	}

	public function request(){
		return $this->belongsTo('App\InventoryIssueRequest', 'inventory_issue_request_id');
	}

}
