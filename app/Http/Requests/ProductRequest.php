<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'required|max:100',
            'class' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'minimum_quantity' => 'required',
            'quantity' => 'required',
            'id_refference' => 'required',
            'extra' => 'max:200',
        ];
    }

    public function messages()
    {
        return [
            'id_refference.required' => 'O campo tipo é obrigatório',
            'required' => 'O campo :attribute é obrigatório',
            'max' => 'O campo :attribute precisa ter menos de :max caracteres'
        ];
    }
}