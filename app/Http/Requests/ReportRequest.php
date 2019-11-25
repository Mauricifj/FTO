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
            'id_refference' => 'required',
        ];
    }
}
