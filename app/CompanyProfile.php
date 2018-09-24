<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyProfile extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'country_id',
    ];
    use softDeletes;

    protected $guarded = ['id'];

    public function country(){
        return $this->belongsTo('App\Country');
    }
    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function updator()
    {
        return $this->brlongsTo('App\User');
    }
}
