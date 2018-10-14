<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerProfile extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_name',
        'customer_type_id',
        'status',
        'establishment_date',
        'contact_number',
        'fax',
        'website',
        'email',
        'tin_number',
        'trade_license_number',
        'trade_license_issue_date',
        'certificate_of_incorporation',
        'incorporation_date',
        'vat_number',
        'address',
        'type_of_business',
    ];

    public function customer_banks()
    {
        return $this->hasMany('App\CustomerBank');
    }
    public function contact_person()
    {
        return $this->hasMany('App\CustomerContactPerson');
    }
    public function customer_enclosure()
    {
        return $this->hasMany('App\CustomerEnclosure');
    }
}
