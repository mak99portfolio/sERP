<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class LocalRequisitionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'requisition_title'=>'required|string',
            'issued_date'=>'required|date|date_format:d-m-Y',
            'date_expected'=>'required|date|date_format:d-m-Y|after:issued_date',
            'requisition_purpose_id'=>'required|integer',
            'requisition_priority_id'=>'required|integer'
        ];
    }

    public function item_validate(){
        if(isset($this->items)){
            foreach($this->items as $item){
                if($item['quantity']){
                    if(is_numeric($item['quantity'])){
                        return true;
                    }else{
                        Session::put('alert-danger', 'Quantity must be a positive number');
                        return false;
                    }
                }else{
                    Session::put('alert-danger', 'Please Insert Quantity');
                    return false;
                }
            }
        }else{
            Session::put('alert-danger', 'You need to select product(s) for requisition');
            return false;
        }
    }
}
