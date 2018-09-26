<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PurchaseOrder extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'vendor_id',
        'requisition_date',
        'purchase_order_date',
        'port_of_loading_port_id',
        'port_of_discharge_port_id',
        'final_destination_country_id',
        'final_destination_city_id',
        'origin_of_goods_country_id',
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
    public function vendor(){
        return $this->belongsTo('App\Vendor');
    }
    public function loading(){
        return $this->belongsTo('App\Port','port_of_loading_port_id');
    }
    public function discharge(){
        return $this->belongsTo('App\Port','port_of_discharge_port_id');
    }
    public function final_destination_country(){
        return $this->belongsTo('App\Country','final_destination_country_id');
    }
    public function final_destination_city(){
        return $this->belongsTo('App\City','final_destination_city_id');
    }
    public function origin_of_goods(){
        return $this->belongsTo('App\Country','origin_of_goods_country_id');
    }
    public function foreign_requisitions(){
        return $this->belongsToMany('App\ForeignRequisition');
    }
}
