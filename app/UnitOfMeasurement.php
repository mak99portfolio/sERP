<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitOfMeasurement extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'short_name'
    ];
    public function product(){
        return $this->hasMany('App\Product');
    }
}
