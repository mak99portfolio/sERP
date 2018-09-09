<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model{

	protected $guarded=['id'];

	public function payment_term(){
		return $this->hasOne('App\PaymentTerm');
	}

	public function bank_information(){
		return $this->hasOne('App\BankInformation');
	}

}
