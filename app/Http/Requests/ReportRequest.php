<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//////////////////////////////////////////////////////////////////
//  Name:   ReportRequest - FormRequest (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   10/11/2019
//
//  Description:
//    Implements forms validations
//
//////////////////////////////////////////////////////////////////
class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_usu' => 'required',
            'id_ref' => 'required',
            'nome'   => 'required|max:100',
            'extras' => 'required|max:200',
        ];
    }
}
