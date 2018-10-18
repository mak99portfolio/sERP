<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
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
    public function terms_and_condition()
    {
        return $this->hasMany('App\SalesOrderTermsAndCondition');
    }
    public function items()
    {
        return $this->hasMany('App\SalesOrderItem');
    }
    public function generateSalesOrderNumber()
    {
        $serial = $this->count_last_serial() + 1;
        $this->sales_order_no = 'SO-' . date('Y-m-') . str_pad($serial, 4, '0', STR_PAD_LEFT);
    }
    private function count_last_serial()
    {
        return SalesOrder::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
    }
}
