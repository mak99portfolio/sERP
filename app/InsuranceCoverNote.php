<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceCoverNote extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'letter_of_credit_id',
        'insurance_cover_note_no',
        'insurance_cover_note_date',
        'vendor_id',
        'company_bank_id',
        'icn_bank_account_no',
        'icn_bank_account_name',
        'icn_bank_name',
        'icn_bank_address',
        'consignee_bank_account_no',
        'consignee_bank_account_name',
        'consignee_bank_name',
        'consignee_bank_address',
        'note',
        'percent_of_marine',
        'amount_of_marine',
        'percent_of_war',
        'amount_of_war',
        'percent_of_net_premium',
        'amount_of_net_premium',
        'percent_of_vat',
        'amount_of_vat',
        'percent_of_stamp_duty',
        'amount_of_stamp_duty',
        'amount_of_grand_total'
    ];

    public function letter_of_credit(){
        return $this->belongsTo('App\LetterOfCredit', 'letter_of_credit_id');
    }

    public function company_bank(){
        return $this->belongsTo('App\CompanyBank', 'company_bank_id');
    }

    public function vendor(){
        return $this->belongsTo('App\Vendor');
    }
    public function amount(){
        return $this->amount_of_marine
                + $this->amount_of_war
                + $this->amount_of_net_premium
                + $this->amount_of_vat
                + $this->amount_of_stamp_duty;
    }
}
