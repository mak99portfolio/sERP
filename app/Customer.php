<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'customer_type_id',
        'status',
        'establishment_date',
        'customer_zone_id',
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
        'notes',
        'type_of_business',
    ];

    public function customer_type(){
        return $this->belongsTo('App\CustomerType','customer_type_id');
    }
    public function zone(){
        return $this->belongsTo('App\CustomerZone','customer_zone_id');
    }
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

    public function sales_orders(){
        return $this->hasmany('App\SalesOrder', 'customer_id');
    }
}
