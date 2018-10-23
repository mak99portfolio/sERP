<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollectionSchedule extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $fillable = [
        'invoice_id',
        'collection_date',
        'amount'
       
    ];
}
