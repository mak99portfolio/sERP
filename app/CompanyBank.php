<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBank extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'account_no',
        'account_name',
        'bank_id',
        'branch_name',
        'swift_code',
        'address',
        'company_id',
    ];
    public function bank(){
        return $this->belongsTo('App\Bank');
    }
    public function company(){
        return $this->belongsTo('App\CompanyProfile');
    }
}
