<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuotationItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'unit_price',
        'product_id'
    ];

    public function quotation(){
        return $this->belongsTo('App\Quotation');
    }
}
