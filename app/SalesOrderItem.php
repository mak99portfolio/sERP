<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SalesOrderItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'unit_price',
        'quantity',
        'bonus_quantity',
        'total_quantity',
        'net_price',
        'discount',
    ];
}
