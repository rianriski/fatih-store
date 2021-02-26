<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductReturnRequest extends FormRequest
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
            'invoice_id' => '',
            'uuid' => '',
            'reason' => 'required|max:255',
            'courier' => '',
            'receipt' => '',
            'status' => '',
            'payback' => '',
            'photo_1' => 'max:1024',
            'photo_2' => 'max:1024',
            'photo_3' => 'max:1024',
        ];
    }
}
