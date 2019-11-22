<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//////////////////////////////////////////////////////////////////
//  Name:   CustomerRequest - FormRequest (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   10/11/2019
//
//  Description:
//    Implements forms validations
//
//////////////////////////////////////////////////////////////////
class CustomerRequest extends FormRequest
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
            
            'name_cst'    => 'required|max:100',
            'sex_cst'     => 'required|max:1',
            'birth_CST'   => 'required|',
            'cpf_CST'     => 'required|max:15',
            'address_CST' => 'required|max:100',
            'num_CST'     => 'required|max:6',
            'comp_CST'    => 'required|max:15',
            'cep_CST'     => 'required|max:8',
            'id_ref'      => 'required',
            'id_cit'      => 'required',
            'id_dis'      => 'required',
            'extras'      => 'required|max:200',
        ];
    }
}
