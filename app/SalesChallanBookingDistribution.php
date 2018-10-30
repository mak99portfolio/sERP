<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesChallanBookingDistribution extends Model{

	protected $fillable=[
		'sales_order_id',
		'sales_challan_id',
		'working_unit_id',
		'product_id',
		'booking_quantity'
	];

	public function sales_order(){
		return $this->belongsTo('App\SalesOrder', 'sales_order_id');
	}

	public function sales_challan(){
		return $this->belongsTo('App\SalesChallan', 'sales_challan_id');
	}

	public function working_unit(){
		return $this->belongsTo('App\WorkingUnit', 'working_unit_id');
	}

	public function product(){
		return $this->belongsTo('App\Product', 'product_id');
	}

}
