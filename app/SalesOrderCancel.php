<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrderCancel extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'sales_order_id',
        'sales_order_cancel_reason_id',
        'remarks'
    ];

    public function sales_order(){
        return $this->belongsTo('App\SalesOrder');
    }

    public function sales_order_cancel_reason(){
        return $this->belongsTo('App\SalesOrderCancelReason');
    }

    public function generate_sales_order_cancel_number(){
        $serial = $this->count_last_serial() + 1;
        $this->sales_order_cancel_no =  'SO-Cancel-'.date('Y-m-').str_pad($serial, 4, '0', STR_PAD_LEFT);
    }

    private function count_last_serial(){
        return SalesOrderCancel::whereYear('created_at', date('Y'))
                            ->whereMonth('created_at', date('m'))
                            ->count();
    }
}
