<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cnf extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'bill_of_lading_id',
        // 'letter_of_credit_id',
        // 'commercial_invoice_id',
        'vendor_id',
        'consignee',
        'bill_no',
        'bill_date',
        'bill_of_entry_no',
        'bill_of_entry_date',
        'arrival_date',
        'delivery_date',
        'job_no',
        'cnf_value',
        'exchange_rate',
        'bdt_amount',
        'total_day',
        'duty_payment_date',
        'consignment_particular_amount',
        'previous_due_amount',
        'cash_recieved_amount',
        'note',
    ];

    public function bill_of_lading()
    {
        return $this->belongsTo('App\BillOfLading', 'bill_of_lading_id');
    }

    public function commercial_invoices()
    {
        return $this->belongsTo('App\CommercialInvoice', 'bill_of_lading_no','bill_of_lading_no');
    }

    public function cnf_agent()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id');
    }

    public function consignment_particular()
    {
        return $this->belongsToMany('App\ConsignmentParticular', 'consignment_particular_id');
    }

    public function consignment_particular_cnf()
    {
        return $this->hasMany('App\ConsignmentParticularCnf', 'cnf_id');
    }
    public function amount_in_bdt()
    {
        return $this->cnf_value * $this->exchange_rate;
    }

    public function amount(){
        return $this->consignment_particular_cnf()->sum('amount');
    }

}
