<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'gender' => 'required|max:1',
            'birthdate' => 'required',
            'cpf' => 'required|max:15',
            'address' => 'required|max:100',
            'number' => 'required|max:6',
            'complement' => 'max:15',
            'zipcode' => 'required|max:8',
            'id_refference' => 'required',
            'id_city' => 'required',
            'id_district' => 'required',
            'extra' => 'max:200',
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
