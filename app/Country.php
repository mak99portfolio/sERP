<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    // protected $table = 'countries';
    // protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'short_name'
    ];
    public function vendor(){
        return $this->hasMany('App\Vendor');
    }
    public function proforma_invoice_final_destination(){
        return $this->hasMany('App\ProformaInvoice','country_of_final_destination_country_id');
    }
    public function proforma_invoice_country_of_origin_of_goods(){
        return $this->hasMany('App\ProformaInvoice','country_of_origin_of_goods_country_id');
    }
}
