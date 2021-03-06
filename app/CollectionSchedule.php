<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollectionSchedule extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $fillable = [
        'customer_id'
        ];
    function items() {
        return $this->hasMany('App\CollectionScheduleItem');
    }
}
