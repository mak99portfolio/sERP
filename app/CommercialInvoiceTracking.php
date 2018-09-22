<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommercialInvoiceTracking extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'commercial_invoice_id',
        'commercial_invoice_issue_date',
        'bill_of_lading_issue_date',
        'document_arrived_at_bank_date',
        'document_send_at_port_date',
        'document_value_payment_date',
        'container_arrived_at_port_date',
        'container_birth_at_port_date',
        'container_delivery_at_port_date',
        'receive_at_warehouse_date',
        'city_id',
        'city_id',
        
    ];
    public function commercial(){
        return $this->belongsTo('App\CommercialInvoice');
    }
}
