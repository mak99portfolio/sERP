<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class CnfRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'vendor_id' => 'required',
            'consignee_company_profile_id' => 'required',
            'bill_of_lading_id' => 'required',
            'bill_no' => 'required',
            'bill_date' => 'required',
            'bill_of_entry_no' => 'required',
            'bill_of_entry_date' => 'required',
            'arrival_date' => 'required',
            'delivery_date' => 'required',
            'job_no' => 'required',
            'cnf_value' => 'required',
            'exchange_rate' => 'required',
            'bdt_amount' => 'required',
            'total_day' => 'required',
            'duty_payment_date' => 'required'

            // 'previous_due_amount' => 'required',
            // 'cash_recieved_amount' => 'required',
        ];
    }

    public function consignment_particular_validate(){
        if(isset($this->items)){
            foreach($this->items as $item){
                if($item['amount']){
                    if(is_numeric($item['amount'])){
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
            Session::put('alert-danger', 'You need to add consignment particular(s) first');
            return false;
        }
    }


}
