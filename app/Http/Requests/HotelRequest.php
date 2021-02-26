<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'nama' => 'required|min:7',
            'manager' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kode' => '',
            'telp' => 'required',
            'kamar' => 'required',
            'operasi' => 'required',
        ];
    }
}
