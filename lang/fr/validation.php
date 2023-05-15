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

    'accepted' => 'Le champ :attribute doit être accepté.',
    'accepted_if' => 'Le champ :attribute doit être accepté lorsque :other est :value.',
    'active_url' => 'L’URL fournie n’est pas une URL valide.',
    'after' => 'La date fournie doit être une date après :date.',
    'after_or_equal' => 'La date fournie doit être une date postérieure ou égale à :date.',
    'alpha' => 'La valeur fournie ne doit contenir que des lettres.',
    'alpha_dash' => 'La valeur fournie ne doit contenir que des lettres, des chiffres, des tirets et des caractères de soulignement.',
    'alpha_num' => 'La valeur fournie doit contenir que des lettres et des chiffres.',
    'array' => 'Le champ :attribute doit être un tableau.',
    'before' => 'La date fournie doit être une date avant :date.',
    'before_or_equal' => 'La date fournie doit être une date antérieure ou égale à :date.',
    'between' => [
        'array' => 'La valeur fournie doit comporter entre :min et :max éléments.',
        'file' => 'Le fichier fourni doit avoir une taille comprise entre :min et :max kilo-octets',
        'numeric' => 'La valeur fournie doit être comprise entre :min et :max.',
        'string' => 'La valeur fournie doit comprendre entre :min et :max caractères.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'La confirmation du champ :attribute ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => 'La date fournie n’est pas une date valide.',
    'date_equals' => 'La date fournie doit être une date égale à :date.',
    'date_format' => 'La date fournie ne correspond pas au format :format.',
    'declined' => 'Le champ :attribute doit être décliné.',
    'declined_if' => 'Le champ :attribute doit être décliné lorsque :other est :value.',
    'different' => 'Les champs :attribute et :other doivent être différents.',
    'digits' => 'La valeur fournie doit être composée de :digits chiffres.',
    'digits_between' => 'La valeur fournie doit être composée de :min à :max chiffres.',
    'dimensions' => 'Le fichier fourni a des dimensions d’image non valides.',
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'doesnt_end_with' => 'La valeur fournie ne peut pas se terminer par l’un des éléments suivants : :values.',
    'doesnt_start_with' => 'La valeur fournie ne peut pas commencer par l’un des éléments suivants : :values.',
    'email' => 'L’adresse email fournie doit être une adresse email valide.',
    'ends_with' => 'La valeur fournie doit se terminer par l’un des éléments suivants : :values.',
    'enum' => 'La valeur sélectionnée n’est pas valide.',
    'exists' => 'La valeur sélectionnée n’est pas valide.',
    'file' => 'Le fichier fourni doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'array' => 'La valeur fournie doit comporter plus de :values éléments.',
        'file' => 'Le fichier fourni doit avoir une taille plus grande que :value kilo-octets.',
        'numeric' => 'La valeur fournie doit être plus grande que :value.',
        'string' => 'La valeur fournie doit comprendre plus de :values caractères.',
    ],
    'gte' => [
        'array' => 'La valeur fournie doit comporter :values éléments ou plus.',
        'file' => 'Le fichier fourni doit avoir une taille de :value kilo-octets ou plus.',
        'numeric' => 'La valeur fournie doit être plus grande ou égale à :value.',
        'string' => 'La valeur fournie doit comprendre :values caractères ou plus.',
    ],
    'image' => 'Le fichier fourni doit être une image.',
    'in' => 'La valeur sélectionnée n’est pas valide.',
    'in_array' => 'La valeur sélectionnée n’existe pas dans :other.',
    'integer' => 'La valeur fournie être un nombre entier.',
    'ip' => 'La valeur fournie doit être une adresse IP valide.',
    'ipv4' => 'La valeur fournie doit être une adresse IPv4 valide.',
    'ipv6' => 'La valeur fournie doit être une adresse IPv6 valide.',
    'json' => 'La valeur fournie doit être une chaîne JSON valide.',
    'lt' => [
        'array' => 'La valeur fournie doit comporter moins de :values éléments.',
        'file' => 'Le fichier fourni doit avoir une taille plus petite que :value kilo-octets.',
        'numeric' => 'La valeur fournie doit être plus petite que :value.',
        'string' => 'La valeur fournie doit comprendre moins de :values caractères.',
    ],
    'lte' => [
        'array' => 'La valeur fournie doit comporter :values éléments ou moins.',
        'file' => 'Le fichier fourni doit avoir une taille de :value kilo-octets ou moins.',
        'numeric' => 'La valeur fournie doit être plus petit ou égale à :value.',
        'string' => 'La valeur fournie doit comprendre :values caractères ou moins.',
    ],
    'mac_address' => 'La valeur fournie doit être une adresse MAC valide.',
    'max' => [
        'array' => 'La valeur fournie ne doit pas comporter plus de :max éléments.',
        'file' => 'La taille du fichier fourni ne doit pas être supérieure à :max kilobytes.',
        'numeric' => 'La valeur fournie ne doit pas être supérieure à :max.',
        'string' => 'La valeur fournie ne doit pas être supérieure à :max caractères.',
    ],
    'max_digits' => 'La valeur fournie ne doit pas comporter plus de :max chiffres.',
    'mimes' => 'Le fichier fourni doit être un fichier de type : :values.',
    'mimetypes' => 'Le fichier fourni doit être un fichier de type : :values.',
    'min' => [
        'array' => 'La valeur fournie doit comporter au moins :min éléments.',
        'file' => 'La taille du fichier fourni doit être d’au moins :min kilo-octets.',
        'numeric' => 'La valeur fournie doit être au moins égale à :min.',
        'string' => 'La valeur fournie doit comporter au moins :min caractères.',
    ],
    'min_digits' => 'La valeur fournie doit avoir au moins :min chiffres.',
    'multiple_of' => 'La valeur fournie doit être un multiple de :value.',
    'not_in' => 'La valeur sélectionnée n‘est pas valide.',
    'not_regex' => 'Le format de la valeur fournie n’est pas valide.',
    'numeric' => 'La valeur fournie doit être un nombre.',
    'password' => [
        'letters' => 'Le mot de passe doit contenir au moins une lettre.',
        'mixed' => 'Le mot de passe doit contenir au moins une lettre majuscule et une lettre minuscule.',
        'numbers' => 'Le mot de passe doit contenir au moins un chiffre.',
        'symbols' => 'Le mot de passe doit contenir au moins un symbole.',
        'uncompromised' => 'Le mot de passe fourni est apparu dans une fuite de données. Veuillez choisir un autre mot de passe.
',
    ],
    'present' => 'Le champ :attribute doit être présent.',
    'prohibited' => 'Le champ :attribute est interdit.',
    'prohibited_if' => 'Le champ :attribute est interdit lorsque :other est :value.',
    'prohibited_unless' => 'Le champ :attribute est interdit sauf si :other figure dans :values.',
    'prohibits' => 'Le champ :attribute interdit la présence de :other.',
    'regex' => 'Le format de la valeur fournie n’est pas valide.',
    'required' => 'Le champ :attribute est obligatoire.',
    'required_array_keys' => 'Le champ :attribute doit contenir des entrées pour : :values.',
    'required_if' => 'Le champ :attribute est obligatoire lorsque :other est :value.',
    'required_if_accepted' => 'Le champ :attribute est obligatoire lorsque :other est accepté.',
    'required_unless' => 'Le champ :attribute est obligatoire, sauf si :other figure dans :values.',
    'required_with' => 'Le champ :attribute est obligatoire lorsque :values est présent.',
    'required_with_all' => 'Le champ :attribute est obligatoire lorsque :values sont présents.',
    'required_without' => 'Le champ :attribute est obligatoire lorsque le champ :values n’est pas présent.',
    'required_without_all' => 'Le champ :attribute est obligatoire si aucune des valeurs :values n’est présente.',
    'same' => 'La valeur fournie et :other doivent correspondre.',
    'size' => [
        'array' => 'La valeur fournie doit contenir  :size éléments.',
        'file' => 'La taille du fichier fourni doit être de :size kilobytes.',
        'numeric' => 'La valeur fournie doit être :size.',
        'string' => 'La valeur fournie doit être composée de :size caractères.',
    ],
    'starts_with' => 'La valeur fournie doit commencer par l’un des éléments suivants : :valeurs.',
    'string' => 'La valeur fournie doit être une chaîne de caractères.',
    'timezone' => 'La valeur fournie doit être un fuseau horaire valide.',
    'unique' => 'La valeur fournie est déjà utilisée.',
    'uploaded' => 'Le téléchargement a échoué.',
    'url' => 'La valeur fournie doit être une URL valide.',
    'uuid' => 'La valeur fournie doit être un UUID valide.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'nom',
        'firstname'=> 'prénom',
        'subject' => 'objet',
        'name_supervisor' => 'superviseur',
        'password' => 'mot de passe'
    ],

];
