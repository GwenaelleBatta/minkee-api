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

    'accepted' => 'Het :attribute moet worden aanvaard.',
    'accepted_if' => 'Het :attribute moet worden aanvaard wanneer :other :value is.',
    'active_url' => 'Het :attribute is geen geldige URL.',
    'after' => 'Het :attribute moet een datum zijn na :date.',
    'after_or_equal' => 'Het :attribute moet een datum zijn na of gelijk aan :date.',
    'alpha' => 'Het :attribute mag alleen letters bevatten',
    'alpha_dash' => 'Het :attribute mag alleen letters, cijfers, streepjes en underscores bevatten.',
    'alpha_num' => 'Het :attribute mag alleen letters en cijfers bevatten.',
    'array' => 'Het :attribute moet een array zijn.',
    'before' => 'Het :attribute moet een datum zijn vóór :date.',
    'before_or_equal' => 'Het :attribute moet een datum zijn vóór of gelijk aan :date.',
    'between' => [
        'array' => 'Het :attribute moet tussen :min en :max items bevatten.',
        'bestand' => 'Het :attribute moet tussen :min en :max kilobytes liggen.',
        'numeriek' => 'Het :attribute moet tussen :min en :max liggen.',
        'string' => 'Het :attribute moet tussen :min en :max karakters liggen.',
    ],
    'boolean' => 'Het veld :attribute moet waar of onwaar zijn.',
    'confirmed' => 'De :attribute bevestiging komt niet overeen.',
    'current_password' => 'Het wachtwoord is onjuist.',
    'date' => 'Het :attribute is geen geldige datum.',
    'date_equals' => 'Het :attribute moet een datum zijn die gelijk is aan :date.',
    'date_format' => 'Het :attribute komt niet overeen met het formaat :format.',
    'declined' => 'Het :-attribute moet worden geweigerd.',
    'declined_if' => 'Het :attribute moet worden geweigerd wanneer :other :value is.',
    'different' => 'De :attribute en :other moeten verschillend zijn.',
    'digits' => 'Het :attribute moet :digits cijfers zijn.',
    'digits_between' => 'Het :attribute moet liggen tussen :min en :max cijfers.',
    'dimensions' => 'Het :attribute heeft ongeldige afbeeldingsafmetingen.',
    'distinct' => 'Het :attribute veld heeft een dubbele waarde.',
    'doesnt_end_with' => 'Het :attribute mag niet eindigen met een van de volgende: :values.',
    'doesnt_start_with' => 'Het :attribute mag niet beginnen met een van de volgende: :values.',
    'email' => 'Het :attribute moet een geldig e-mailadres zijn.',
    'ends_with' => 'Het :attribute moet eindigen met een van de volgende: :values.',
    'enum' => 'Het geselecteerde :attribute is ongeldig.',
    'exists' => 'Het geselecteerde :attribute is ongeldig.',
    'file' => 'Het :attribute moet een bestand zijn.',
    'filled' => 'Het veld :attribute moet een waarde hebben.',
    'gt' => [
        'array' => 'Het :attribute moet meer dan :value items hebben.',
        'file' => 'Het :attribute moet groter zijn dan :value kilobytes.',
        'numeric' => 'Het :attribute moet groter zijn dan :value.',
        'string' => 'Het :attribute moet groter zijn dan de :value tekens.',
    ],
    'gte' => [
        'array' => 'Het :attribute moet meer dan :value items hebben.',
        'file' => 'Het :attribute moet groter zijn dan :value kilobytes.',
        'numeric' => 'Het :attribute moet groter zijn dan :value.',
        'string' => 'Het :attribute moet groter zijn dan de :value tekens.',
    ],
    'image' => 'Het :attribute moet een afbeelding zijn.',
    'in' => 'Het geselecteerde :attribute is ongeldig.',
    'in_array' => 'Het veld :attribute bestaat niet in :other.',
    'integer' => 'Het :attribute moet een geheel getal zijn.',
    'ip' => 'Het :attribute moet een geldig IP-adres zijn.',
    'ipv4' => 'Het :attribute moet een geldig IPv4-adres zijn.',
    'ipv6' => 'Het :attribute moet een geldig IPv6-adres zijn.',
    'json' => 'Het :attribute moet een geldige JSON-string zijn.',
    'lt' => [
        'array' => 'Het :attribute moet minder dan :value items hebben.',
        'file' => 'Het :attribute moet kleiner zijn dan :value kilobytes.',
        'numeric' => 'Het :attribute moet kleiner zijn dan :value.',
        'string' => 'Het :attribute moet minder dan :value tekens bevatten.',
    ],
    'lte' => [
        'array' => 'Het :attribute mag niet meer dan :value items hebben.',
        'file' => 'Het :attribute moet kleiner zijn dan of gelijk aan :value kilobytes.',
        'numeric' => 'Het :attribute moet kleiner of gelijk zijn aan :value.',
        'string' => 'Het :attribute moet minder dan of gelijk zijn aan de :value -tekens.',
    ],
    'mac_address' => 'Het :attribute moet een geldig MAC-adres zijn.',
    'max' => [
        'array' => 'Het :attribute mag niet meer dan :max items hebben.',
        'file' => 'Het :attribute mag niet groter zijn dan :max kilobytes.',
        'numeric' => 'Het :attribute mag niet groter zijn dan :max.',
        'string' => 'Het :attribute mag niet groter zijn dan :max tekens.',
    ],
    'max_digits' => 'Het :attribute mag niet meer dan :max cijfers bevatten.',
    'mimes' => 'Het :attribute moet een bestand zijn van het type: :values.',
    'mimetypes' => 'Het :attribute moet een bestand zijn van het type: :values.',
    'min' => [
        'array' => 'Het :attribute moet ten minste :min items hebben.',
        'file' => 'Het :attribute moet ten minste :min kilobytes zijn.',
        'numeric' => 'Het :attribute moet ten minste :min zijn.',
        'string' => 'Het :attribute moet ten minste uit :min tekens bestaan.',
    ],
    'min_digits' => 'Het :attribute moet ten minste :min -cijfers bevatten.',
    'multiple_of' => 'Het :attribute moet een veelvoud zijn van :value.',
    'not_in' => 'Het geselecteerde :attribute is ongeldig.',
    'not_regex' => 'Het formaat van het :attribute is ongeldig.',
    'numeric' => 'Het :attribute moet een getal zijn.',
    'password' => [
        'letters' => 'Het :attribute moet ten minste één letter bevatten.',
        'mixed' => 'Het :attribute moet ten minste één hoofdletter en één kleine letter bevatten.',
        'numbers' => 'Het :attribute moet ten minste één getal bevatten.',
        'symbols' => 'Het :attribute moet ten minste één symbool bevatten.',
        'uncompromised' => 'Het opgegeven :attribute is verschenen in een datalek. Kies een ander :attribute.',
    ],
    'present' => 'Het veld :attribute moet aanwezig zijn.',
    'prohibited' => 'Het veld :attribute is verboden.',
    'prohibited_if' => 'Het :attribute veld is verboden wanneer :other :value is.',
    'prohibited_unless' => 'Het veld :attribute is verboden, tenzij :other in :values staat.',
    'prohibits' => 'Het :attribute -veld verbiedt :other.',
    'regex' => 'Het formaat van het :attribute is ongeldig.',
    'required' => 'Het veld :attribute is verplicht.',
    'required_array_keys' => 'Het :attribute -veld moet vermeldingen bevatten voor: :values.',
    'required_if' => 'Het veld :attribute is vereist wanneer :other :value is.',
    'required_if_accepted' => 'Het veld :attribute is vereist wanneer :other is aanvaard.',
    'required_unless' => 'Het veld :attribute is verplicht, tenzij :other in :values staat.',
    'required_with' => 'Het veld :attribute is vereist wanneer :values aanwezig is.',
    'required_with_all' => 'Het veld :attribute is vereist wanneer :values aanwezig zijn.',
    'required_without' => 'Het veld :attribute is vereist wanneer :values niet aanwezig is.',
    'required_without_all' => 'Het veld :attribute is vereist wanneer geen van de :values aanwezig is.',
    'same' => 'De :attribute en :other moeten overeenkomen.',
    'size' => [
        'array' => 'Het :attribute moet :size -items bevatten.',
        'file' => 'Het :attribute moet :size kilobytes zijn.',
        'numeric' => 'Het :attribute moet :size zijn.',
        'string' => 'Het :attribute moet :size tekens zijn.',
    ],
    'starts_with' => 'Het :attribute moet beginnen met een van de volgende: :values.',
    'string' => 'Het :attribute moet een string zijn.',
    'timezone' => 'Het :attribute moet een geldige tijdzone zijn.',
    'unique' => 'Het :attribute is al ingenomen.',
    'uploaded' => 'Het :attribute is niet geupload.',
    'url' => 'Het :attribute moet een geldige URL zijn.',
    'uuid' => 'Het :attribute moet een geldige UUID zijn.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention 'attribute.rule' to name the lines. This makes it quick to
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
    | with something more reader friendly such as 'E-Mail Address' instead
    | of 'email'. This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'naam',
        'firstname'=> 'voornam',
        'subject' => 'onderwerp',
        'name_supervisor' => 'supervisor',
        'password' => 'wachtwoort'
    ],

];
