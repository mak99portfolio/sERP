<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'country_id'
    ];

    public function country(){
        return $this->belongsTo('App\Country');
    }
    public function pi_final_destination_city()
    {
        return $this->hasMany('App\ProformaInvoice','final_destination_city_id');
    }
}
