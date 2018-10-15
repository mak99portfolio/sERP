<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'quotation_no',
        'delivery_date',
        'vendor_id',
        'local_requisition_id'
    ];

    public function items(){
        return $this->hasMany('App\QuotationItem');
    }
    public function local_requisition(){
        return $this->belongsTo('App\LocalRequisition');
    }
    public function vendor(){
        return $this->belongsTo('App\Vendor');
    }
    public function payment_terms(){
        return $this->hasMany('App\QuotationPaymentTerm');
    }
    public function terms_conditions(){
        return $this->hasMany('App\QuotationTermsCondition');
    }
    public function generate_purchase_order_number(){
        $serial = $this->count_last_serial() + 1;
        $this->quotation_no =  'Quo-'.date('Y-m-').str_pad($serial, 4, '0', STR_PAD_LEFT);
    }

    private function count_last_serial(){
        return Quotation::whereYear('created_at', date('Y'))
                            ->whereMonth('created_at', date('m'))
                            ->count();
    }
}
