<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'required|max:200',
            'type'=> 'required|max:20',
            'situation'=> 'required',
            'condition'=> 'required',
            'id_refference'=> 'required',
            'id_customer'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_refference.required' => 'O campo tipo de pagamento é obrigatório',
            'required' => 'O campo :attribute é obrigatório',
            'max' => 'O campo :attribute precisa ter menos de :max caracteres'
        ];
    }
}