<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorContact extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'vendor_id',
        'name',
        'designation',
        'telephone',
        'email',
        'role',
        'mobile',
    ];
    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

}
