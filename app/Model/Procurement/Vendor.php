<?php

namespace App\Model\Procurement;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';
    protected $guarded = ['id'];
    protected $fillable = [
            'vendor_id',
            'name',
            'address',
            'zip_code',
            'fax',
            'email',
            'trade_license_no',
            'certificate_of_incorporation',
            'vat_no',
            'status_id',
            'establishment_date',
            'country_id',
            'vendor_category_id',
            'telephone',
            'website',
            'tin_no',
            'trade_license_issue_date',
            'incorporation_date',
            'business_type',
            'business_nature',
            'credit_period',
            'credit_limit',
    ];
    public function country(){
        return $this->belongsTo('App\Model\Core\Country');
    }
    public function category(){
        return $this->belongsTo('App\Model\Procurement\VendorCategory');
    }

    public function payment_term()
    {
        return $this->hasOne('App\Model\Procurement\VendorPaymentTerm');
    }

    public function bank()
    {
        return $this->hasOne('App\VendorBank');
    }

    public function contacts()
    {
        return $this->hasMany('App\VendorContact');
    }

    public function enclosures()
    {
        return $this->hasMany('App\EnclosureVendor');
    }

}
