<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostSheet extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'letter_of_credit_id',
        'currency_id',
        'exchange_rate',
        'bdt_amount',
        'note',
    ];

    public function letter_of_credit(){
        return $this->belongsTo('App\LetterOfCredit', 'letter_of_credit_id');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

    public function cost_sheet_particular(){
        return $this->hasOne('App\CostSheetParticular');
    }

    public function amount_in_bdt(){
        return $this->letter_of_credit->letter_of_credit_value * $this->exchange_rate;
    }

    public function other_charges(){
        return $this->hasMany('App\OtherLetterOfCreditCharge', 'cost_sheet_id');
    }
}
