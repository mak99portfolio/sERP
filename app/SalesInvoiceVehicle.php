<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesInvoiceVehicle extends Model{

	protected $fillable=[
		'sales_invoice_id',
		'delivery_medium',
		'own_vehicle_id',
		'transport_agency_id',
		'vehicle_no',
		'driver_name',
		'phone_no'
	];

	public function sales_invoice(){
		return $this->belongsTo('App\SalesInvoice', 'sales_invoice_id');
	}

}
