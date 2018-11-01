<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesChallan extends Model{

	protected $fillable=[
		'customer_id',
		'challan_date',
		'mushak_number_id',
		'delivery_person_id',
		'shipping_address_id'
	];

	protected $dates=[
		'challan_date'
	];

	public function sales_orders(){
		return $this->belongsToMany('App\SalesOrder', 'sales_challan_sales_order', 'sales_challan_id', 'sales_order_id');
	}

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

    public function mushak_no(){
    	return $this->belongsTo('App\MushakNumber', 'mushak_number_id');
    }

    public function delivery_person(){
    	return $this->belongsTo('App\EmployeeProfile', 'delivery_person_id');
    }

    public function shipping_address(){
    	return $this->belongsTo('App\CustomerAddress', 'shipping_address_id');
    }

    public function invoices(){
    	return $this->hasMany('App\SalesInvoice', 'sales_challan_id');
    }

}
