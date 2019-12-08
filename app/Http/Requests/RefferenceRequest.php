<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefferenceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'required|max:100',
            'acronym' => 'required|max:10',
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'O campo tipo é obrigatório',
            'required' => 'O campo :attribute é obrigatório',
            'max' => 'O campo :attribute precisa ter menos de :max caracteres'
        ];
    }
}
