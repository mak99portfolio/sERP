<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BillOfLading extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'bill_of_lading_issue_no',
        'bill_of_lading_issue_date',
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
}
