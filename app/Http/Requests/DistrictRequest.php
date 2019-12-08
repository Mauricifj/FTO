<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_city' => 'required',
            'name' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'max' => 'O campo :attribute precisa ter menos de :max caracteres'
        ];
    }
}
