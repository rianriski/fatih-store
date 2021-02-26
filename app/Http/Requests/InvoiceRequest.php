<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'user_id' => '',
            'transaction_uuid' => '',
            'shipping_address_id' => '',
            'sub_total' => 'required',
            'courier' => 'required',
            'shipping_cost' => 'required',
            'coupon_id' => '',
            'discount' => '',
            'transaction_total' => 'required',
            'status' => 'required',
        ];
    }
}
