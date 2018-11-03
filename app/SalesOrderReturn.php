<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SalesOrderReturn extends Model
{
   use SoftDeletes;
   protected $fillable = [
       'sales_order_return_date',
       'sales_order_id',
       'seals_return_reason_id',
       'employee_id'
   ];
}
