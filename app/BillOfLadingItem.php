<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BillOfLadingItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'quantity',
        'unit_price',
    ];
    public function product(){
        return $this->belongsTo('App\Product'); 
     }
}
