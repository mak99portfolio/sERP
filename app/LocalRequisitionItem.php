<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalRequisitionItem extends Model
{
    protected $fillable = [
        'local_requisition_id',
        'product_id',
        'quantity',
    ];
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
