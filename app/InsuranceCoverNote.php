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
        'vendor_bank_id',
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
        'amount_of_stamp_duty'
    ];

    public function letter_of_credit(){
        return $this->belongsTo('App\LetterOfCredit', 'letter_of_credit_id');
    }

    public function company_bank(){
        return $this->belongsTo('App\CompanyBank', 'company_bank_id');
    }

    public function vendor_bank(){
        return $this->belongsTo('App\VendorBank', 'vendor_bank_id');
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
