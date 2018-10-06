<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryIssueStatus extends Model{

	function issues(){
		return $this->hasMany('App\InventoryIssue', 'inventory_issue_status_id');
	}

}
