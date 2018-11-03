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
       'employee_id',
       'remark'
   ];
   public function sales_order()
   {
       return $this->belongsTo('App\SalesOrder');
   }
   public function return_reason()
   {
       return $this->belongsTo('App\SalesReturnReason','seals_return_reason_id');
   }
   public function return_person()
   {
       return $this->belongsTo('App\EmployeeProfile','employee_id');
   }
   public function items(){
    return $this->hasMany('App\SalesOrderReturnItem');
}
}
