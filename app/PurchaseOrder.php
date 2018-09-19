<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PurchaseOrder extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'requisition_no',
        'foreign_requisition_id',
        'vendor_id',
        'requisition_date',
        'purchase_order_date',
        'port_of_loading_port_id',
        'port_of_discharge_port_id',
        'country_of_final_destination_country_id',
        'final_destination_city_id',
        'country_of_origin_of_goods_country_id',
        'payment_type',
        'pre_carriage_by',
        'subject',
        'letter_header',
        'letter_footer',
        'notes'
    ];
    public function items(){
        return $this->hasMany('App\PurchaseOrderItem');
    }
    public function port_of_loading(){
        return $this->belongsTo('App\Port','port_of_loading_port_id');
    }
    public function port_of_discharge(){
        return $this->belongsTo('App\Port','port_of_discharge_port_id');
    }
    public function country_of_final_destination(){
        return $this->belongsTo('App\Country','country_of_final_destination_country_id');
    }
    public function final_destination_city(){
        return $this->belongsTo('App\City','final_destination_city_id');
    }
    public function country_of_origin_of_goods(){
        return $this->belongsTo('App\Country','country_of_origin_of_goods_country_id');
    }
}
