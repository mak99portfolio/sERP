<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Port extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'contact_person',
        'contact_person_number',
        'city_id',
        'country_id'
    ];

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }
    public function po_of_loading(){
        return $this->hasMany('App\PurchaseOrder','port_of_loading_port_id');
    }
    public function pi_of_loading()
    {
        return $this->hasMany('App\ProformaInvoice','port_of_loading_port_id');
    }
    public function pi_of_discharge()
    {
        return $this->hasMany('App\ProformaInvoice','port_of_discharge_port_id');
    }
}
