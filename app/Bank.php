<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'country_id',
        'short_name',
        'description'
    ];

    public function country(){
        return $this->belongsTo('App\Country');
    }
}
