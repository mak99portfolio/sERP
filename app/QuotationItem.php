<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{

    protected $fillable = [
        'unit_price',
        'product_id'
    ];

    public function quotation(){
        return $this->belongsTo('App\Quotation');
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }

}
