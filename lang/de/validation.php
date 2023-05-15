<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Das following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Das :attribute muss akzeptiert werden.',
    'accepted_if' => 'Das :attribute muss akzeptiert werden, wenn  :other ist :value.',
    'active_url' => 'Das :attribute ist keine gültige URL.',
    'after' => 'Das :attribute muss ein Datum sein, das nach  :date.',
    'after_or_equal' => 'Das :attribute muss ein Datum sein, das nach oder gleich  :date.',
    'alpha' => 'Das :attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => 'Das :attribute darf nur Buchstaben, Zahlen, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => 'Das :attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => 'Das :attribute muss ein Array sein.',
    'before' => 'Das :attribute muss ein Datum sein, das vor :date.',
    'before_or_equal' => 'Das :attribute muss ein Datum sein, das vor oder gleich dem :date.',
    'between' => [
        'array' => 'Das :attribute muss zwischen :min und :max Elemente enthalten.',
        'file' => 'Das :attribute muss zwischen :min und :max Kilobytes liegen.',
        'numeric' => 'Das :attribute muss zwischen :min und :max liegen.',
        'string' => 'Das :attribute muss zwischen den Zeichen :min und :max liegen.',
    ],
    'boolean' => 'Das :attribute feld muss true oder false sein.',
    'confirmed' => 'Das :attribute bestätigung stimmt nicht überein.',
    'current_password' => 'Das Passwort ist falsch.',
    'date' => 'Das :attribute ist kein gültiges Datum.',
    'date_equals' => 'Das :attribute muss ein Datum sein, das gleich :date.',
    'date_format' => 'Das :attribute entspricht nicht dem Format :format.',
    'declined' => 'Das :attribute muss abgelehnt werden.',
    'declined_if' => 'Das :attribute abgelehnt werden muss, wenn :other ist :value.',
    'different' => 'Das :attribute und :other müssen unterschiedlich sein.',
    'digits' => 'Das :attribute muss :digits Ziffern sein.',
    'digits_between' => 'Das :attribute muss zwischen den Ziffern :min und :max liegen.',
    'dimensions' => 'Das :attribute hat ungültige Bildabmessungen.',
    'distinct' => 'Das :attribute Feld hat einen doppelten Wert.',
    'doesnt_end_with' => 'Das :attribute darf nicht mit einer der folgenden Angaben enden: :values.',
    'doesnt_start_with' => 'Das :attribute darf nicht mit einer der folgenden Angaben beginnen: :values.',
    'email' => 'Das :attribute muss eine gültige E-Mail Adresse sein.',
    'ends_with' => 'Das :attribute muss mit einer der folgenden Angaben enden: :values.',
    'enum' => 'Das ausgewählt :attribute ist ungültig.',
    'exists' => 'Das ausgewählt :attribute ist ungültig',
    'file' => 'Das :attribute muss eine Datei sein.',
    'filled' => 'Das :attribute Feld muss einen Wert haben.',
    'gt' => [
        'array' => 'Das :attribute  muss mehr als :value haben.',
        'file' => 'Das :attribute muss größer sein als :value kilobytes.',
        'numeric' => 'Das :attribute muss größer sein als :value.',
        'string' => 'Das :attribute muss größer sein als :value.',
    ],
    'gte' => [
        'array' => 'Das :attribute muss mindestens :value items haben.',
        'file' => 'Das :attribute muss größer oder gleich :value kilobytes sein.',
        'numeric' => 'Das :attribute muss größer als oder gleich :value sein.',
        'string' => 'Das :attribute muss größer oder gleich den Zeichen :value sein.',
    ],
    'image' => 'Das :attribute muss ein Bild sein.',
    'in' => 'Das ausgewählt :attribute ist ungültig',
    'in_array' => 'Das :attribute feld ist nicht vorhanden in :other.',
    'integer' => 'Das :attribute muss eine ganze Zahl sein.',
    'ip' => 'Das :attribute muss eine gültige IP-Adresse sein.',
    'ipv4' => 'Das :attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6' => 'Das :attribute muss eine gültige IPv6-Adresse sein.',
    'json' => 'Das :attribute muss eine gültige JSON-Zeichenkette sein.',
    'lt' => [
        'array' => 'Das :attribute muss weniger als :value haben.',
        'file' => 'Das :attribute muss kleiner sein als :value kilobytes.',
        'numeric' => 'Das :attribute muss kleiner sein als :value.',
        'string' => 'Das :attribute muss kleiner sein als :value Zeichen.',
    ],
    'lte' => [
        'array' => 'Das :attribute muss weniger als :value haben.',
        'file' => 'Das :attribute muss kleiner sein als :value kilobytes.',
        'numeric' => 'Das :attribute muss kleiner sein als :value.',
        'string' => 'Das :attribute muss kleiner sein als :value Zeichen.',
    ],
    'mac_address' => 'Das :attribute muss eine gültige MAC-Adresse sein.',
    'max' => [
        'array' => 'Das :attribute darf nicht mehr als :max Elemente haben.',
        'file' => 'Das :attribute darf nicht größer sein als :max kilobytes.',
        'numeric' => 'Das :attribute darf nicht größer sein als :max.',
        'string' => 'Das :attribute darf nicht größer sein als :max Zeichen.',
    ],
    'max_digits' => 'Das :attribute darf nicht mehr als :max Ziffern haben.',
    'mimes' => 'Das :attribute muss eine Datei vom Typ: :values sein.',
    'mimetypes' => 'Das :attribute muss eine Datei vom Typ: :values sein.',
    'min' => [
        'array' => 'Das :attribute muss mindestens :min Artikel haben.',
        'file' => 'Das :attribute muss mindestens :min Kilobytes betragen.',
        'numeric' => 'Das :attribute muss mindestens :min sein.',
        'string' => 'Das :attribute muss mindestens :min Zeichen betragen.',
    ],
    'min_digits' => 'Das :attribute muss mindestens :min Ziffern haben.',
    'multiple_of' => 'Das :attribute muss ein Vielfaches von :value sein.',
    'not_in' => 'Das ausgewählte :attribut ist ungültig.',
    'not_regex' => 'Das :attribut format ist ungültig.',
    'numeric' => 'Das :attribute muss eine Zahl sein.',
    'password' => [
        'letters' => 'Das :attribute muss mindestens einen Buchstaben enthalten.',
        'mixed' => 'Das :attribute muss mindestens einen Großbuchstaben und einen Kleinbuchstaben enthalten.',
        'numbers' => 'Das :attribute muss mindestens eine Zahl enthalten.',
        'symbols' => 'Das :attribute muss mindestens ein Symbol enthalten.',
        'uncompromised' => 'Das angegebene :attribut ist in einem Datenleck aufgetaucht. Bitte wählen Sie ein anderes :attribut.',
    ],
    'present' => 'Das :attribute feld muss vorhanden sein.',
    'prohibited' => 'Das :attribute feld ist verboten.',
    'prohibited_if' => 'Das :attribute Feld ist verboten, wenn :other :value ist.',
    'prohibited_unless' => 'Das :attribute ist verboten, es sei denn, :other ist in :values enthalten.',
    'prohibits' => 'Das :attribute feld verbietet die Anwesenheit von :other.',
    'regex' => 'Das :attribute format ist ungültig.',
    'required' => 'Das :attribute ist ein Pflichtfeld.',
    'required_array_keys' => 'Das :attribute feld muss Einträge für enthalten: :values.',
    'required_if' => 'Das :attribute feld ist erforderlich, wenn :other :value ist.',
    'required_if_accepted' => 'Das :attribute ist erforderlich, wenn das Feld :other akzeptiert wird.',
    'required_unless' => 'Das :attribute ist erforderlich, es sei denn, :other ist in :values enthalten.',
    'required_with' => 'Das :attribute ist erforderlich, wenn das Feld :values vorhanden ist.',
    'required_with_all' => 'Das :attribute feld ist erforderlich, wenn :Werte vorhanden sind.',
    'required_without' => 'Das :attribute ist erforderlich, wenn das Feld :values nicht vorhanden ist.',
    'required_without_all' => 'Das :attribute ist erforderlich, wenn keiner der :Werte vorhanden ist.',
    'same' => 'Das :attribute und :other müssen übereinstimmen.',
    'size' => [
        'array' => 'Das :attribute muss :size enthalten.',
        'file' => 'Das :attribute muss :size kilobytes sein.',
        'numeric' => 'Das :attribute muss :size sein.',
        'string' => 'Das :attribute müssen :size Zeichen sein.',
    ],
    'starts_with' => 'Das :attribute muss mit einer der folgenden Angaben beginnen: :values.',
    'string' => 'Das :attribute muss eine Zeichenkette sein.',
    'timezone' => 'Das :attribute muss eine gültige Zeitzone sein.',
    'unique' => 'Das :attribute wurde bereits eingenommen.',
    'uploaded' => 'Das :attribute Upload fehlgeschlagen.',
    'url' => 'Das :attribute muss eine gültige URL sein.',
    'uuid' => 'Das :attribute muss eine gültige UUID sein.',

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
    | Das following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'name',
        'firstname'=> 'vorname',
        'subject' => 'betreff',
        'name_supervisor' => 'vorgesetzter',
        'password' => 'kennwort'
    ],

];
