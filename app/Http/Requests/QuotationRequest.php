<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class QuotationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'local_requisition_id' => 'required',
            'delivery_date' => 'required',
            'vendor_id' => 'required'
        ];
    }

    public function payment_type_validate(){
        if(isset($this->payment_terms)){
            foreach($this->payment_terms as $payment_term){
                if($payment_term['amount']){
                    if(is_numeric($payment_term['amount'])){
                        return true;
                    }else{
                        Session::put('alert-danger', 'Amount must be a positive number');
                        return false;
                    }
                }else{
                    Session::put('alert-danger', 'Please Insert Amount');
                    return false;
                }
            }
        }else{
            Session::put('alert-danger', 'You need to add payment term(s) first');
            return false;
        }
    }

    public function terms_and_condition_type_validate(){
        if(isset($this->terms_conditions)){
            foreach($this->terms_conditions as $terms_condition){
                if($terms_condition['description']){
                    return true;
                }else{
                    Session::put('alert-danger', 'Please Insert Description');
                    return false;
                }
            }
        }else{
            Session::put('alert-danger', 'You need to add terms and condition(s) first');
            return false;
        }
    }
}
