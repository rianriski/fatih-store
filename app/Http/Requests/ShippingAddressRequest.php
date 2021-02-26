<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingAddressRequest extends FormRequest
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
            'name' => 'required',
            'receiver' => 'required',
            'phone' => 'required|min:8',
            'city' => 'required',
            'postal_code' => 'required',
            'address' => 'required|max:255',
        ];
    }
}
