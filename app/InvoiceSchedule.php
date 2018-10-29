<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceSchedule extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $fillable = [
        'customer_id',
        'sales_order_id'
        ];
    function items() {
        return $this->hasMany('App\InvoiceScheduleItem');
    }
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    public function sales_order(){
        return $this->belongsTo('App\SalesOrder');
    }
}
