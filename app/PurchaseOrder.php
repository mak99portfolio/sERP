<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PurchaseOrder extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'requisition_no',
        'purchase_order_no',
        'vendor_id',
        'requisition_date',
        'purchase_order_date',
        'port_of_loading_port_id',
        'port_of_discharge_port_id',
        'country_of_final_destination_countru_id',
        'final_destination_countru_id',
        'country_of_origin_of_goods_countru_id',
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
}
