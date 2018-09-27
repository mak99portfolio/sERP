<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForeignPurchaseOrderRequest extends FormRequest
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
            'vendor_id'=> 'required',
            'requisition_date'=> 'required',
            'purchase_order_date'=> 'required',
            'port_of_loading_port_id'=> 'required',
            'port_of_discharge_port_id'=> 'required',
            'final_destination_country_id'=> 'required',
            'final_destination_city_id'=> 'required',
            'origin_of_goods_country_id'=> 'required',
            'shipment_allow'=> 'required',
            'payment_type'=> 'required',
            'pre_carriage_by'=> 'required',
        ];
    }
}
