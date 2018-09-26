<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyLicense extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'company_profile_id',
        'license_name',
        'license_no',
        'renewed_date',
        'expire_date',
    ];
 
    public function company(){
        return $this->belongsTo('App\CompanyProfile','company_profile_id');
    }
}
