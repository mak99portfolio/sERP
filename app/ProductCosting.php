<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCosting extends Model
{
    protected $guarded = ['id'];

    public function bill_of_lading(){
        return $this->belongsTo('App\BillOfLading');
    }
    public function total_landing_cost(){
        return $this->bill_of_lading->insurance_amount()
                + $this->bill_of_lading->lc_charge()
                + $this->retirement
                + $this->remittance
                + $this->dh_charge
                + $this->bill_of_lading->cnf->amount()
                + $this->transport_charge;
    }
}
