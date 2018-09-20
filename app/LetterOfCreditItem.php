<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class LetterOfCreditItem extends Model
{
     use softDeletes;
     protected $fillable = [
        'product_id',
        'quantity',
        'unit_price',
        'd_rate',
        'discount',
        'vat',
    ];
     public function product(){
        return $this->belongsTo('App\Product');
    }
}
