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
}
