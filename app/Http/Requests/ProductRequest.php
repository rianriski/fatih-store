<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => '',
            'name' => 'required|max:255',
            'description' => 'required',
            'stock' => 'required|int',
            'price' => 'required|int',
            'weight' => 'required|int',
            'expired' => '',
            'condition' => 'required',
            'product_id' => '',
            'is_default' => 'required|max:1024',
            'photo_1' => 'required|max:1024',
            'photo_2' => 'required|max:1024',
            'photo_3' => 'required|max:1024',
        ];
    }
}
