<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LocalPurchaseOrder extends Model
{
     use SoftDeletes;

    protected $fillable = [
        'purchase_order_no',
        'inco_terms',
        'inco_term_info',
        'procurement_type',
        'purchase_order_type',
        'status',
        'remarks',
        'purchase_order_date',
        'shipping_method',
        'payment_method',
        'ship_to_address'
    ];

    //protected $guarded=['id'];

    public function items(){
        return $this->hasMany('App\LocalPurchaseOrderItem', 'local_purchase_order_id');
    }
    public function requisitions(){
        return $this->belongsToMany('App\LocalRequisition', 'local_purchase_order_local_requisitions', 'local_purchase_order_id', 'local_requisition_id');
    }
    public function payment_terms(){
        return $this->hasMany('App\LocalPurchaseOrderPaymentTerm');
    }
    public function terms_conditions(){
        return $this->hasMany('App\LocalPurchaseOrderTermsCondition');
    }
    public function order_vendor(){
        return $this->hasOne('App\LocalPurchaseOrderVendor');
    }
    public function generate_purchase_order_number(){
        $serial = $this->count_last_serial() + 1;
        $this->purchase_order_no =  'LOCAL-PO-'.date('Y-m-').str_pad($serial, 4, '0', STR_PAD_LEFT);
    }

    private function count_last_serial(){
        return LocalPurchaseOrder::whereYear('created_at', date('Y'))
                            ->whereMonth('created_at', date('m'))
                            ->count();
    }

}
