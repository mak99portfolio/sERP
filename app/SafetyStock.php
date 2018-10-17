<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SafetyStock extends Model{

	protected $guarded=['id'];

	protected $dates = [
		'last_checked',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

	public function working_unit(){
		return $this->belongsTo('App\WorkingUnit');
	}

	public function product(){
		return $this->belongsTo('App\Product');
	}

    public function product_status(){
    	return $this->belongsTo('App\ProductStatus', 'product_status_id');
    }

    public function product_type(){
    	return $this->belongsTo('App\ProductType', 'product_type_id');
    }

    public function creator(){
    	return $this->belongsTo('App\User', 'creator_user_id');
    }

    public function editor(){
    	return $this->belongsTo('App\User', 'updator_user_id');
    }

}
