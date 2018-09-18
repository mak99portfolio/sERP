<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LocalPurchaseOrder extends Model
{
     protected $guarded=['id'];

    public function items(){
        return $this->hasMany('App\LocalPurchaseOrderItem');
    }
    public function requisitions(){
        return $this->hasMany('App\LocalPurchaseOrderLocalRequisition');
    }
    public function paymentterms(){
        return $this->hasMany('App\LocalPurchaseOrderLocalRequisition');
    }
    public function termsconditions(){
        return $this->hasMany('App\LocalPurchaseOrderLocalRequisition');
    }
    public function vendors(){
        return $this->hasMany('App\LocalPurchaseOrderLocalRequisition');
    }
    

     use SoftDeletes;
    protected $fillable = [
        'purchase_oder_no',
        'inco_terms',
        'inco_term_info',
        'procurement_type',
        'purchase_order_type',
        'status',
        'remarks',
        'purchase_oder_date'
    ];
}
