<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class InvoiceScheduleRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => 'required',
            'sales_order_id' => 'required'
        ];
    }
    public function item_validate(){
        if(isset($this->collection_amounts)){
            foreach($this->collection_amounts as $item){
                if($item['payment_amount']){
                    if(is_numeric($item['payment_amount']) || $item['payment_amount'] < 0){
                        return true;
                    }else{
                        Session::put('alert-danger', 'Invoice Amount Must be a Positive Number');
                        return false;
                    }
                }else{
                    Session::put('alert-danger', 'Please Insert Invoice Amount');
                    return false;
                }
            }
        }else{
            Session::put('alert-danger', 'You need to add Invoice Amount');
            return false;
        }
    }
}
