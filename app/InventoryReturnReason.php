<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryReturnReason extends Model{

	protected $guarded=['id'];

	public function creator(){
    	return $this->belongsTo('App\User', 'creator_user_id');
    }

    public function editor(){
    	return $this->belongsTo('App\User', 'updator_user_id');
    }
    
}
