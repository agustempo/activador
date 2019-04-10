<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | El following language lines contain the default error messages used by
    | the validaar class. Some of these rules have multiple versions such
    | as the size rules. Feel free a tweak each of these messages here.
    |
    */

    'accepted' => 'El :attribute debe ser aceptado.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser una fecha posterior a :date.',
    'after_or_igual' => 'El :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El :attribute solo puede contener letras.',
    'alpha_dash' => 'El :attribute puede contener solo letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El :attribute puede contener solo letras y números.',
    'array' => 'El :attribute debe ser una lista.',
    'antes' => 'El :attribute debe ser una fecha antes de :date.',
    'antes_or_igual' => 'El :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El :attribute debe estar entre :min y :max caracteres.',
        'array' => 'El :attribute debe estar entre :min y :max items.',
    ],
    'boolean' => 'El :attribute debe ser verdadero o falso.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'date' => 'El :attribute no es una fecha válida.',
    'date_iguals' => 'El :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no coincide con el formato :format.',
    'different' => 'El :attribute y :other deben ser diferentes.',
    'digits' => 'El :attribute debe ser :digits digitos.',
    'digits_between' => 'El :attribute debe estar entre :min y :max digitos.',
    'dimensions' => 'El :attribute tiene dimensiones de imágen inválidas.',
    'distinct' => 'El :attribute tiene un valor duplicado.',
    'email' => 'El :attribute debe ser una dirección de email válida.',
    'exists' => 'El :attribute seleccionado es inválido.',
    'file' => 'El :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'numeric' => 'El :attribute debe ser mayor que :value.',
        'file' => 'El :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El :attribute debe ser mayor que :value caracteres.',
        'array' => 'El :attribute debe tener más de :value items.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe ser mayor que or igual :value.',
        'file' => 'El :attribute debe ser mayor que or igual :value kilobytes.',
        'string' => 'El :attribute debe ser mayor que or igual :value caracteres.',
        'array' => 'El :attribute debe have :value items o más.',
    ],
    'image' => 'El :attribute debe ser una imágen.',
    'in' => 'El selected :attribute es inválido.',
    'in_array' => 'El :attribute field does not exist in :other.',
    'integer' => 'El :attribute debe ser an integer.',
    'ip' => 'El :attribute debe ser a valid IP address.',
    'ipv4' => 'El :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El :attribute debe ser menor que :value.',
        'file' => 'El :attribute debe ser menor que :value kilobytes.',
        'string' => 'El :attribute debe ser menor que :value caracteres.',
        'array' => 'El :attribute debe tener menos de :value items.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe ser menor que or igual :value.',
        'file' => 'El :attribute debe ser menor que or igual :value kilobytes.',
        'string' => 'El :attribute debe ser menor que or igual :value caracteres.',
        'array' => 'El :attribute no debe tener más de :value items.',
    ],
    'max' => [
        'numeric' => 'El :attribute no debe ser mayor que :max.',
        'file' => 'El :attribute no debe ser mayor que :max kilobytes.',
        'string' => 'El :attribute no debe ser mayor que :max caracteres.',
        'array' => 'El :attribute no debe tener más de :max items.',
    ],
    'mimes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El :attribute debe ser por lo menos :min.',
        'file' => 'El :attribute debe ser por lo menos :min kilobytes.',
        'string' => 'El :attribute debe ser menor que :min caracteres.',
        'array' => 'El :attribute debe tener por lo menos :min items.',
    ],
    'not_in' => 'El :attribute seleccionado es inválido.',
    'not_regex' => 'El formato de :attribute es inválido.',
    'numeric' => 'El :attribute debe ser a number.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El formato :attribute es inválido.',
    'required' => 'El campo :attribute es requerido.',
    'required_if' => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless' => 'El campo :attribute es requerido a menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es requerido cuando :values está presente.',
    'required_without' => 'El campo :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de :values está presente.',
    'same' => 'El :attribute y :other deben coincidir.',
    'size' => [
        'numeric' => 'El :attribute debe ser :size.',
        'file' => 'El :attribute debe ser :size kilobytes.',
        'string' => 'El :attribute debe ser :size caracteres.',
        'array' => 'El :attribute debe contener :size items.',
    ],
    'starts_with' => 'El :attribute debe empezar con uno de los siguientes: :values',
    'string' => 'El :attribute debe ser una cadena de texto.',
    'timezone' => 'El :attribute debe ser una zona válida.',
    'unique' => 'El :attribute ya fue seleccionado.',
    'uploaded' => 'El :attribute falló en subir.',
    'url' => 'El formato de :attribute es inválido.',
    'uuid' => 'El :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Cusam Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" a name the lines. This makes it quick a
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'email' => [
            'exists' => 'La dirección de email debe estar asociada a una cuenta en el sistema.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | El following language lines are used a swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
