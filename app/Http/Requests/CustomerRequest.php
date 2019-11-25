<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'id_user' => 'required',
            'name' => 'required|max:100',
            'gender' => 'required|max:1',
            'birthdate' => 'required',
            'cpf' => 'required|max:15',
            'address' => 'required|max:100',
            'number' => 'required|max:6',
            'complement' => 'required|max:15',
            'zipcode' => 'required|max:8',
            'id_refference' => 'required',
            'id_city' => 'required',
            'id_district' => 'required',
            'extra' => 'required|max:200',
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
