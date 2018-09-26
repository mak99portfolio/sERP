<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProformaInvoice extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'purchase_order_date',
        'proforma_invoice_no',
        'proforma_invoice_date',
        'proforma_invoice_receive_date',
        'vendor_id',
        'port_of_loading_port_id',
        'port_of_discharge_port_id',
        'final_destination_country_id',
        'final_destination_city_id',
        'origin_of_goods_country_id',
        'shipment_allow',
        'payment_type',
        'pre_carriage_by',
        'customer_code',
        'consignee',
        'beneficiary_bank_info',
        'notes',
    ];
    public function items(){
        return $this->hasMany('App\ProformaInvoiceItem');
    }
    public function purchase_order(){
        return $this->belongsTo('App\PurchaseOrder');
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
    public function origin_of_goods_country(){
        return $this->belongsTo('App\Country','origin_of_goods_country_id');
    }
    public function purchase_orders(){
        return $this->belongsToMany('App\PurchaseOrder');
    }
}
