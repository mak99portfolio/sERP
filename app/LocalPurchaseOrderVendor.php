<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalPurchaseOrderVendor extends Model
{
    
    
    protected $fillable = [
        'vendor_id',
        'vendor_selection_criteria',
        'reference_no',
        'additional_information',
        'address'
    ];
     protected $guarded=['id'];
    public function localpurchaseorder(){
        return $this->belongsTo('App\LocalPurchaseOrder');
    }
}
