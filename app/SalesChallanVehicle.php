<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesChallanVehicle extends Model{
    
    protected $fillable=[
		'delivary_medium',
		'own_vehicle_id',
		'transport_agency_id',
		'vehicle_no',
		'driver_name',
		'phone_no'
    ];

    public function sales_challan(){
    	return $this->belongsTo('App\SalesChallan', 'sales_challan_id');
    }

    public function own_vehicle(){
    	return $this->belongsTo('App\OwnVehicle', 'own_vehicle_id');
    }

    public function transport_agency(){
    	return $this->belongsTo('App\Vendor', 'transport_agency_id');
    }

}
