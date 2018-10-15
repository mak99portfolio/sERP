<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerContactPerson extends Model
{
    protected $fillable = [
        'contact_name',
        'designation',
        'contact_number',
        'email',
        'job_role',
        'tell_number',
        'cell_number',
    ];

}
