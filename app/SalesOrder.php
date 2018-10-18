<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sales_order_no',
        'sales_date',
        'sales_reference_id',
        'currency_id',
        'customer_id',
        'conversion_rate',
        'remarks',
    ];
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

}
