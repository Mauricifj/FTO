<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'id_refference' => 'required',
            'name' => 'required|max:100',
            'extra' => 'max:200',
        ];
    }

    public function messages()
    {
        return [
            'id_refference.required' => 'O campo estado é obrigatório',
            'required' => 'O campo :attribute é obrigatório',
            'max' => 'O campo :attribute precisa ter menos de :max caracteres'
        ];
    }
}  

