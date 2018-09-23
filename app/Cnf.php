<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cnf extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'letter_of_credit_id',
        'commercial_invoice_id',
        'vendor_id',
        'cnf_agent_id',
        'consignee',
        'bill_no',
        'bill_date',
        'bill_of_entry_no',
        'bill_of_entry_date',
        'arrival_date',
        'delivery_date',
        'job_no',
        'cnf_value',
        'usd_amount',
        'exchange_rate',
        'bdt_amount',
        'total_day',
        'duty_payment_date',
        'consignment_particular_amount',
        'previous_due_amount',
        'cash_recieved_amount',
        'note',
        'consignment_particular_id'
    ];

    public function letter_of_credit(){
        return $this->belongsTo('App\LetterOfCredit', 'letter_of_credit_id');
    }

    public function commercial_invoice(){
        return $this->belongsTo('App\CommercialInvoice', 'commercial_invoice_id');
    }

    public function exporter(){
        return $this->belongsTo('App\Vendor', 'vendor_id');
    }

    public function cnf_agent(){
        return $this->belongsTo('App\Vendor', 'cnf_agent_id');
    }

    public function consignment_particular_cnf(){
        return $this->belongsToMany('App\ConsignmentParticularCnf', 'consignment_particular_id');
    }
}
