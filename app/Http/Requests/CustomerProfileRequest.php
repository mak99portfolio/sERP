<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name'=>'required',
            'customer_type_id'=>'required',
            'status'=>'required',
            'establishment_date'=>'required',
            'customer_zone_id'=>'required',
            'contact_number'=>'required',
            'trade_license_number'=>'required',
            'address'=>'required',
            'type_of_business'=>'required',
            // 'banks'=>'present|array',
            // 'banks.*.account_number'=>'required',
            // 'customer_type_id'=>'required',
        ];
    }
}
