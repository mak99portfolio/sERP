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
        'currency',
        'beneficiary_ac_no',
        'beneficiary_ac_name',
        'beneficiary_branch_name',
        'beneficiary_bank_name',
        'issue_ac_no',
        'issue_ac_name',
        'issue_branch_name',
        'issue_bank_name',
        'partial_shipment',
        'transhipment_information'
    ];
    public function items(){
        return $this->hasMany('App\LetterOfCreditItem');
    }
}
