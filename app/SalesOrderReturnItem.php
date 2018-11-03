<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SalesOrderReturnItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'sales_order_return_id',
        'product_id',
        'quantity',
        'unit_price',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
