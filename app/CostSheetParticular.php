<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostSheetParticular extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'percent_of_lc_margin',
        'amount_of_lc_margin',
        'round_amount_of_lc_margin',
        'percent_of_lc_commision',
        'amount_of_lc_commision',
        'round_amount_of_lc_commision',
        'percent_of_vat',
        'amount_of_vat',
        'round_amount_of_vat',
        'percent_of_swift',
        'amount_of_swift',
        'round_amount_of_swift',
        'percent_of_stamp_charge',
        'amount_of_stamp_charge',
        'round_amount_of_stamp_charge',
        'percent_of_lcaf_issue_charge',
        'amount_of_lcaf_issue_charge',
        'round_amount_of_lcaf_issue_charge',
        'percent_of_imp',
        'amount_of_imp',
        'round_amount_of_imp',
        'percent_of_lc_application_form',
        'amount_of_lc_application_form',
        'round_amount_of_lc_application_form',
        'percent_of_others',
        'amount_of_others',
        'round_amount_of_others'
    ];

    public function cost_sheet(){
        return $this->belongsTo('App\CostSheet');
    }
}
