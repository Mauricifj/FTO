<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute deve ser aceito.',
    'active_url'           => ':attribute não é uma URL válida.',
    'after'                => ':attribute deve ser uma data após :date.',
    'after_or_equal'       => ':attribute deve ser uma data após ou igual a :date.',
    'alpha'                => ':attribute deve conter apenas letras.',
    'alpha_dash'           => ':attribute deve conter apenas letras, números e traços.',
    'alpha_num'            => ':attribute deve conter apenas letras e números.',
    'array'                => ':attribute deve ser um array.',
    'before'               => ':attribute deve ser uma data anterior a :date.',
    'before_or_equal'      => ':attribute deve ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => ':attribute deve estar entre :min e :max.',
        'file'    => ':attribute deve ter entre :min e :max kilobytes.',
        'string'  => ':attribute deve ter entre :min e :max caracteres.',
        'array'   => ':attribute deve ter entre :min e :max itens.',
    ],
    'boolean'              => ':attribute deve ser verdadeiro ou falso.',
    'confirmed'            => ':attribute confirmação incorreta.',
    'date'                 => ':attribute não é uma data válida.',
    'date_format'          => ':attribute não bate com o formato :format.',
    'different'            => ':attribute e :other devem ser diferentes.',
    'digits'               => ':attribute deve ter :digits dígitos.',
    'digits_between'       => ':attribute deve ter entre :min e :max dígitos.',
    'dimensions'           => ':attribute tem dimensões de imagem inválidas.',
    'distinct'             => ':attribute tem um valor duplicado.',
    'email'                => ':attribute deve ser um endereço de email válido.',
    'exists'               => 'selected :attribute não é válido.',
    'file'                 => ':attribute deve ser um arquivo.',
    'filled'               => ':attribute deve ter um valor.',
    'gt'                   => [
        'numeric' => ':attribute deve ser maior que :value.',
        'file'    => ':attribute deve ser maior que :value kilobytes.',
        'string'  => ':attribute deve ser maior que :value caracteres.',
        'array'   => ':attribute deve ter mais que :value itens.',
    ],
    'gte'                  => [
        'numeric' => ':attribute deve ser maior que ou igual a :value.',
        'file'    => ':attribute deve ser maior que ou igual a :value kilobytes.',
        'string'  => ':attribute deve ser maior que ou igual a :value characters.',
        'array'   => ':attribute deve ter mais que :value itens ou mais.',
    ],
    'image'                => ':attribute deve ser uma imagem.',
    'in'                   => 'selected :attribute não é válido.',
    'in_array'             => ':attribute não existe em :other.',
    'integer'              => ':attribute deve ser um inteiro.',
    'ip'                   => ':attribute deve ser um endereço de IP válido.',
    'ipv4'                 => ':attribute deve ser um endereço de IPv4 válido.',
    'ipv6'                 => ':attribute deve ser um endereço de IPv6 válido.',
    'json'                 => ':attribute deve ser um JSON string válido.',
    'lt'                   => [
        'numeric' => ':attribute deve ser menor que :value.',
        'file'    => ':attribute deve ter menos que :value kilobytes.',
        'string'  => ':attribute deve ter menos que :value caracteres.',
        'array'   => ':attribute deve ter menos que :value itens.',
    ],
    'lte'                  => [
        'numeric' => ':attribute deve ser menor que ou igual a :value.',
        'file'    => ':attribute deve ter :value kilobytes ou menos',
        'string'  => ':attribute deve ter :value caracteres ou menos.',
        'array'   => ':attribute deve ter :value itens ou menos.',
    ],
    'max'                  => [
        'numeric' => ':attribute não deve ser maior que :max.',
        'file'    => ':attribute não deve ter mais que :max kilobytes.',
        'string'  => ':attribute não deve ter mais que :max caracteres.',
        'array'   => ':attribute não deve ter mais que :max itens.',
    ],
    'mimes'                => ':attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => ':attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute deve ser no mínimo :min.',
        'file'    => ':attribute deve ter no mínimo :min kilobytes.',
        'string'  => ':attribute deve ter no mínimo :min caracteres.',
        'array'   => ':attribute deve ter no mínimo :min itens.',
    ],
    'not_in'               => 'selected :attribute não é válido.',
    'not_regex'            => 'O formato de :attribute não é válido.',
    'numeric'              => ':attribute deve ser um número.',
    'present'              => ':attribute deve estar presente.',
    'regex'                => 'O formato de :attribute não é válido.',
    'required'             => ':attribute é obrigatório.',
    'required_if'          => ':attribute é obrigatório quando :other is :value.',
    'required_unless'      => ':attribute é obrigatório a menos que :other esteja entre :values.',
    'required_with'        => ':attribute é obrigatório quando :values está presente.',
    'required_with_all'    => ':attribute é obrigatório quando :values está presente.',
    'required_without'     => ':attribute é obrigatório quando :values não está presente.',
    'required_without_all' => ':attribute é obrigatório quando :values não estão presentes.',
    'same'                 => ':attribute e :other devem bater.',
    'size'                 => [
        'numeric' => ':attribute deve ter :size.',
        'file'    => ':attribute deve ter :size kilobytes.',
        'string'  => ':attribute deve ter :size caracteres.',
        'array'   => ':attribute deve ter :size itens.',
    ],
    'string'               => ':attribute deve ser uma string.',
    'timezone'             => ':attribute deve ser uma zona válida.',
    'unique'               => ':attribute já foi escolhido.',
    'uploaded'             => ':attribute falha ao carregar.',
    'url'                  => 'O formato de :attribute é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => ['name' => 'nome', 'id_refference' => 'referência', 'id_city' => 'cidade'],

];
