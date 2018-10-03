<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LetterOfCreditRequest extends FormRequest
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
            'letter_of_credit_no' => 'required',
            'letter_of_credit_date' => 'required',
            // 'letter_of_credit_value' => 'required',
            // 'vendor_id' => 'required',
            // 'letter_of_credit_expire_date' => 'required',
            // 'letter_of_credit_status' => 'required',
            // 'letter_of_credit_shipment_date' => 'required',
            // 'currency' => 'required',
            // 'beneficiary_ac_no' => 'required',
            // 'beneficiary_ac_name' => 'required',
            // 'beneficiary_branch_name' => 'required',
            // 'beneficiary_bank_name' => 'required',
            // 'issue_ac_no' => 'required',
            // 'issue_ac_name' => 'required',
            // 'issue_branch_name' => 'required',
            // 'issue_bank_name' => 'required',
            // 'partial_shipment' => 'required',
            // 'transhipment_information' => 'required'
        ];
    }
}
