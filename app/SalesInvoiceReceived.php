<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesInvoiceReceived extends Model{

	protected $fillable=[
		'customer_id',
		'sales_invoice_id',
		'sales_invoice_amount',
		'sales_invoice_received_date',
		'remarks'
	];

	protected $dates=[
		'sales_invoice_received_date'
	];

	public function customer(){
		return $this->belongsTo('App\Customer', 'customer_id');
	}

	public function sales_invoice(){
		return $this->belongsTo('App\SalesInvoice', 'sales_invoice_id');
	}

	public function creator(){
    	return $this->belongsTo('App\User', 'creator_user_id');
    }

    public function editor(){
    	return $this->belongsTo('App\User', 'updator_user_id');
    }

}
