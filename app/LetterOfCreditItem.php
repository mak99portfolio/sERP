<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class LetterOfCreditItem extends Model
{
     use softDeletes;
     public function product(){
        return $this->hasOne('App\Product');
    }
}
