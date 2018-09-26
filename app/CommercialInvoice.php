<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommercialInvoice extends Model {

    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'commercial_invoice_no',
        'date',
        'letter_of_credit_id',
        'bill_of_lading_no',
        'bill_of_lading_date',
        'vessel_no',
        'container_no',
        'port_of_loading_port_id',
        'port_of_discharge_port_id',
        'destination_city_id',
        'country_goods_country_id',
        'destination_country_id',
        'notes',
        'freight'
    ];

    function items() {
        return $this->hasMany('App\CommercialInvoiceItem');
    }
    function packingList() {
        return $this->hasOne('App\PackingList');
    }
    function LetterOfCredit() {
        return $this->belongsTo('App\LetterOfCredit');
    }
    function loading_port() {
        return $this->belongsTo('App\Port','port_of_loading_port_id');
    }
     function discharge_port() {
        return $this->belongsTo('App\Port','port_of_discharge_port_id');
    }
    function city() {
        return $this->belongsTo('App\City','destination_city_id');
    }
     public function destination_country(){
        return $this->belongsTo('App\Country','destination_country_id');
    }
     public function country_goods(){
        return $this->belongsTo('App\Country','country_goods_country_id');
    }

}
