<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model{

	protected $fillable=[
		'sales_invoice_no',
		'customer_id',
		'sales_challan_id',
		'sales_invoice_status',
		'sales_invoice_date',
		'invoice_address_id',
		'gate_pass_id',
		'shipping_address_id',
		'delivery_person_id',
		'total_quantity',
		'total_amount',
		'total_vat',
		'total_discount',
		'extra_discount',
		'grand_total',
		'invoiced_amount'
	];

	protected $dates=['sales_invoice_date'];

	public function sales_challan(){
		return $this->belongsTo('App\SalesChallan', 'sales_challan_id');
	}

    public function items(){
        return $this->hasMany('App\SalesInvoiceItem','sales_invoice_id');
    }

	public function creator(){
    	return $this->belongsTo('App\User', 'creator_user_id');
    }

    public function editor(){
    	return $this->belongsTo('App\User', 'updator_user_id');
    }

	public function vehicles(){
		return $this->hasMany('App\SalesInvoiceVehicle', 'sales_invoice_id');
	}

    public function delivery_person(){
    	return $this->belongsTo('App\EmployeeProfile', 'delivery_person_id');
    }

    public function shipping_address(){
    	return $this->belongsTo('App\CustomerAddress', 'shipping_address_id');
    }

    public function invoice_address(){
    	return $this->belongsTo('App\CustomerAddress', 'invoice_address_id');
    }

}
