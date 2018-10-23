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
        'vessel_no',
        'port_of_loading_port_id',
        'port_of_discharge_port_id',
        'final_destination_city_id',
        'origin_of_goods_country_id',
        'final_destination_country_id',
        'notes',
        'freight'
    ];

    function items() {
        return $this->hasMany('App\CommercialInvoiceItem');
    }
    function tracking() {
        return $this->hasOne('App\CommercialInvoiceTracking');
    }
    function packing_list() {
        return $this->hasOne('App\PackingList');
    }
    function letter_of_credit() {
        return $this->belongsTo('App\LetterOfCredit','letter_of_credit_id');
    }
    function loading_port() {
        return $this->belongsTo('App\Port','port_of_loading_port_id');
    }
    function discharge_port() {
        return $this->belongsTo('App\Port','port_of_discharge_port_id');
    }
    function city() {
        return $this->belongsTo('App\City','final_destination_city_id');
    }
    public function destination_country(){
        return $this->belongsTo('App\Country','final_destination_country_id');
    }
    public function country_goods(){
        return $this->belongsTo('App\Country','origin_of_goods_country_id');
    }

    public function bill_of_ladings(){
        return $this->belongsToMany('App\BillOfLading', 'bill_of_lading_commercial_invoice', 'commercial_invoice_id', 'bill_of_lading_id');
    }



}
