<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PurchaseOrderItem extends Model
{
    use SoftDeletes;
    protected $guarded=['id'];
    protected $fillable = [
        'quantity',
        'unit_price',
        'purchase_order_id',
        'product_id'
    ];
    public function product(){
       return $this->belongsTo('App\Product'); 
    }
}
