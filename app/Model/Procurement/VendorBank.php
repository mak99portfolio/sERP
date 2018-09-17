<?php

namespace App\Model\Procurement;

use Illuminate\Database\Eloquent\Model;

class VendorBank extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'vendor_id',
        'ac_no',
        'ac_name',
        'bank_name',
        'branch_name',
        'swift_code',
        'address',
    ];
    public function vendor()
    {
        return $this->belongsTo('App\Model\Procurement\Vendor');
    }
}
