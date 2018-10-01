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
        'shipping_agency_vendor_id',
        'local_agency_vendor_id',
        'exporter_vendor_id',
        'consignee',
        'acceptance',
        'port_of_loading_port_id',
        'port_of_dischare_port_id',
        'place_of_delivery',
        'voyage_no',
        'place_of_transhipment',
        'modes_of_transport_id',
        'move_type_id',
        'issue_place',
        'number_of_mtd',
        'packaging_qty',
        'gross_weight',
    ];

    public function letter_of_credit(){
        return $this->belongsTo('App\LetterOfCredit','letter_of_credit_id');
    }
    public function cnf(){
        return $this->hasOne('App\Cnf');
    }
    public function shipping_agency(){
        return $this->belongsTo('App\Vendor','shipping_agency_vendor_id');
    }
    public function local_agency(){
        return $this->belongsTo('App\Vendor','local_agency_vendor_id');
    }
    public function exporter(){
        return $this->belongsTo('App\Vendor','exporter_vendor_id');
    }
    public function loading(){
        return $this->belongsTo('App\Port','port_of_loading_port_id');
    }
    public function dischare(){
        return $this->belongsTo('App\Port','port_of_dischare_port_id');
    }
    public function commercial_invoices(){
        return $this->hasMany('App\CommercialInvoice','bill_of_lading_no','bill_of_lading_no');
    }
    public function modes_of_transport(){
        return $this->belongsTo('App\ModesOfTransport','modes_of_transport_id');
    }
    public function move_type(){
        return $this->belongsTo('App\MoveType','move_type_id');
    }
    public function items(){
        return $this->hasMany('App\BillOfLadingItem');
    }
    public function amount()
    {
        return $this->items->sum(function ($item) {
            return $item->quantity * $item->unit_price;
        });
    }

}
