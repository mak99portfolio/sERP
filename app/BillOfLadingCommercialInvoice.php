<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillOfLadingCommercialInvoice extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'bill_of_lading_id',
        'commercial_invoice_id'
    ];
    public function bill_of_lading(){
        return $this->belongsTo('App\BillOfLading','bill_of_lading_id');
    }
    public function commercial_invoice(){
        return $this->belongsTo('App\CommercialInvoice','commercial_invoice_id');
    }
}
