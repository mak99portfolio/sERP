<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BillOfLading extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'bill_of_lading_no',
        'bill_of_lading_date',
        'letter_of_credit_id',
        'container_no',
        'container_size',
        'number_of_box',
        'shipping_agency_id',
        'local_agency_id',
        'exproter_id',
        'consignee',
        'acceptance',
        'port_of_loading_id',
        'port_of_dischare_id',
        'place_of_delivery',
        'voyage_no',
        'place_of_transhipment',
        'modes_of_transport',
        'move_type',
        'issue_place',
        'number_of_mtd',
    ];

    public function letter_of_credit(){
        return $this->belongsTo('App\LetterOfCredit','letter_of_credit_id');
    }
    public function shipping_agency(){
        return $this->belongsTo('App\Vendor','shipping_agency_id');
    }
    public function local_agency(){
        return $this->belongsTo('App\Vendor','local_agency_id');
    }
    public function exproter_id(){
        return $this->belongsTo('App\Vendor','exproter_id');
    }
    public function loading(){
        return $this->belongsTo('App\Port','port_of_loading_id');
    }
    public function dischare(){
        return $this->belongsTo('App\Port','port_of_dischare_id');
    }
    public function commercial_invoices(){
        return $this->hasMany('App\CommercialInvoice','bill_of_lading_no','bill_of_lading_no');
    }

}
