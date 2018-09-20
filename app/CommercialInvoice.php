<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class CommercialInvoice extends Model {

    use softDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'commercial_invoice_no',
        'date',
        'letter_of_credit_id',
        'bill_no',
        'bill_date',
        'vessel_no',
        'container_no',
        'port_of_loading_port_id',
        'port_of_discharge_port_id',
        'destination_city_id',
        'country_goods_country_id',
        'destination_country_id',
        'notes'
    ];

    function items() {
        return $this->hasMany('App\CommercialInvoiceItem');
    }

}
