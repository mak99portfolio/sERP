<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForeignRequisition extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'requisition_priority_id',
        'purpose_id',
        'requisition_title',
        'issued_date',
        'date_expected',
        'note'
    ];
}
