<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProformaInvoice extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'requisition_no',
        'purchase_order_date',
        'proforma_invoice_no',
        'proforma_invoice_date',
        'proforma_invoice_receive_date',
        'vendor_id',
        'port_of_loading_port_id',
        'port_of_discharge_port_id',
        'country_of_final_destination_country_id',
        'final_destination_city_id',
        'country_of_origin_of_goods_country_id',
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
    public function vendor(){
        return $this->belongsTo('App\Vendor');
    }
    public function port_of_loading(){
        return $this->belongsTo('App\Port','port_of_loading_port_id');
    }
    public function port_of_discharge(){
        return $this->belongsTo('App\Port','port_of_discharge_port_id');
    }
}
