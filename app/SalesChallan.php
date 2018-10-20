<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesChallan extends Model{

	protected $fillable=[
		'customer_id',
		'challan_date',
		'mushak_id',
		'delivery_person_id',
		'shipping_address_id'
	];

	protected $dates=[
		'challan_date'
	];

	public function vehicles(){
		return $this->hasMany('App\SalesChallanVehicle', 'sales_challan_id');
	}

	public function items(){
		return $this->hasMany('App\SalesChallanItem', 'sales_challan_id');
	}

	public function creator(){
    	return $this->belongsTo('App\User', 'creator_user_id');
    }

    public function editor(){
    	return $this->belongsTo('App\User', 'updator_user_id');
    }

}
