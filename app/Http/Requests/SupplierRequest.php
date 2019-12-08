<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cnpj' => 'required',
            'company_name' => 'required',
            'fantasy_name' => 'required',
            'address' => 'required',
            'number' => 'required',
            'zipcode' => 'required',
            'id_district' => 'required',
            'id_city' => 'required',
            'id_refference' => 'required',
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