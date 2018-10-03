<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForeignPayment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'payment_date',
        'vendor_id',
        'payment_by_id',
        'payment_by_no',
        'payment_type_id',
        'payment_amount',
        'discount_amount',
        'vat',
        'note',
    ];

    public function vendor(){
        return $this->belongsTo('App\Vendor');
    }
    public function payment_type(){
        return $this->belongsTo('App\PaymentType');
    }
    public function payment_by(){
        return $this->belongsTo('App\PaymentBy');
    }

    public function generatPaymentNumber()
    {
        $serial = $this->count_last_serial() + 1;
        $this->payment_id = 'PAY-' . date('Y-m-') . str_pad($serial, 4, '0', STR_PAD_LEFT);
    }
    private function count_last_serial()
    {
        return ForeignPayment::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
    }
}
