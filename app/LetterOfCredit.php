<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LetterOfCredit extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'letter_of_credit_no',
        'letter_of_credit_date',
        'letter_of_credit_value',
        'vendor_id',
        'letter_of_credit_expire_date',
        'letter_of_credit_status',
        'letter_of_credit_shipment_date',
        'currency_id',
        'beneficiary_vendor_bank_id',
        'issue_company_bank_id',
        // 'beneficiary_ac_no',
        // 'beneficiary_ac_name',
        // 'beneficiary_branch_name',
        // 'beneficiary_bank_name',
        // 'issue_ac_no',
        // 'issue_ac_name',
        // 'issue_branch_name',
        // 'issue_bank_name',

        'partial_shipment',
        'transhipment_information',
    ];
    public function items()
    {
        return $this->hasMany('App\LetterOfCreditItem');
    }
    public function insurance_cover_note()
    {
        return $this->hasOne('App\InsuranceCoverNote');
    }
    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }
    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }
    public function beneficiary_vendor_bank()
    {
        return $this->belongsTo('App\VendorBank','beneficiary_vendor_bank_id');
    }
    public function issue_bank()
    {
        return $this->belongsTo('App\CompanyBank','issue_company_bank_id');
    }
    public function application_numbers()
    {
        return $this->hasMany('App\LetterOfCreditApplicationNumber');
    }
    public function proforma_invoices()
    {
        return $this->belongsToMany('App\ProformaInvoice');
    }
    public function cost_sheet()
    {
        return $this->hasOne('App\CostSheet');
    }
    public function amount()
    {
        return $this->items->sum(function ($item) {
            return $item->quantity * $item->unit_price;
        });
    }
}
