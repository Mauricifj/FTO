<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//////////////////////////////////////////////////////////////////
//  Name:   ReceiptRequest - FormRequest (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   10/11/2019
//
//  Description:
//    Implements forms validations
//
//////////////////////////////////////////////////////////////////
class ReceiptRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_refference' => 'required',
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
