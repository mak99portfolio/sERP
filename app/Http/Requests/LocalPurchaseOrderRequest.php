<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class LocalPurchaseOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'inco_terms' => 'required',
            'inco_term_info' => 'required',
            'procurement_type' => 'required',
            'purchase_order_type' => 'required',
            'purchase_order_date' => 'required',
            'shipping_method' => 'required',
            'payment_method' => 'required',
            'ship_info' => 'required'
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
