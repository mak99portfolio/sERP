<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForeignProformaInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'proforma_invoice_no'=>'required',
            'proforma_invoice_date'=>'required',
            'proforma_invoice_receive_date'=>'required',
            'vendor_id'=>'required',
            'port_of_loading_port_id'=>'required',
            'port_of_discharge_port_id'=>'required',
            'final_destination_country_id'=>'required',
            'final_destination_city_id'=>'required',
            'origin_of_goods_country_id'=>'required',
            'shipment_allow'=>'required',
            'payment_type'=>'required',
            'pre_carriage_by'=>'required',
            'customer_code'=>'required',
            'consignee_company_profile_id'=>'required',
            // 'beneficiary_bank_info'=>'required'
        ];
    }
}
