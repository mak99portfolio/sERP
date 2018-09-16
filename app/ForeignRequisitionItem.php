<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForeignRequisitionItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'total_quantity',
        'requisition_quantity',
        'physical_stock',
        'goods_in_transit',
        'pending'
    ];
}
