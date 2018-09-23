<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LetterOfCreditApplicationNumber extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'lca_no',
        'letter_of_credit_id',
    ];
}
