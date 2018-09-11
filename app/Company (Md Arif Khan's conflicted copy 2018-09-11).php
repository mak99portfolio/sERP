<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model{

   use SoftDelets;

   protected $gaurded=['id'];

   public function creator(){
   		$this->belongsTo('App\User');
   }

   public function updator(){
   		$this->brlongsTo('App\User');
   }

}
