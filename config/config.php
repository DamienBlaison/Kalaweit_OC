<?php
include( __DIR__ ."/config_server.php");

return  $config = [

    'host' => [
        'host' => $host
    ]

    ,

    "Connexion" => $connexion

    ,

    'type_paiement' =>[

        '1' => 'Cheque',
        '2' => 'Virement',
        '3' => 'CB',
        '4' => 'Espece',
        '5' => 'Inconnu',
        '6' => 'Prélevement'
    ],


    'islands' => [
        'S'     => 'Sumatra',
        'B'     => 'Bornéo'
    ],

    'sexe'    => [
        'M'     => 'Male',
        'F'     => 'Femelle'
    ],

    'captivity' => [

        'oui'        => 'oui',
        'non'        => 'non'
    ],

    'adoption' => [

        'oui'     => 'oui',
        'non'     => 'non'
    ],

    'visibility' => [

        '0'       => 'non',
        '1'       => 'oui'
    ],

    'cli_lang'   => [
        'FR' => 'Français',
        'ES' => 'Espagnol',
        'EN' => 'Anglais'

    ],

    'clit_id' => '1',

    'especes'  => [

        ['id_espece' => 1,  'nom_francais'=>	'Gibbon agile',            'nom_latin'=>'Hylobates agilis agilis',     'espece_genre'=>'Gibbon'],
        ['id_espece' => 2,  'nom_francais'=>	'Gibbon agile',            'nom_latin'=>'Hylobates agilis albibarbis', 'espece_genre'=>'Gibbon'],
        ['id_espece' => 3,  'nom_francais'=>	'Gibbon agile',            'nom_latin'=>'Hylobates agilis ungko',      'espece_genre'=>'Gibbon'],
        ['id_espece' => 4,  'nom_francais'=>	'Gibbon à mains blanches', 'nom_latin'=>'Hylobates lar vestitus',      'espece_genre'=>'Gibbon'],
        ['id_espece' => 5,  'nom_francais'=>	'Gibbon de Muller',        'nom_latin'=>'Hylobates muelleri abotti',   'espece_genre'=>'Gibbon'],
        ['id_espece' => 6,  'nom_francais'=>	'Gibbon de Muller',        'nom_latin'=>'Hylobates muelleri funereus', 'espece_genre'=>'Gibbon'],
        ['id_espece' => 7,  'nom_francais'=>	'Gibbon de Muller',        'nom_latin'=>'Hylobates muelleri muelleri', 'espece_genre'=>'Gibbon'],
        ['id_espece' => 11, 'nom_francais'=>	'Gibbon de Muller',        'nom_latin'=>'Hylobates muelleri ssp.',     'espece_genre'=>'Gibbon'],
        ['id_espece' => 12, 'nom_francais'=>	'Gibbon agile',            'nom_latin'=>'Hylobates agilis ssp.',       'espece_genre'=>'Gibbon'],
        ['id_espece' => 25, 'nom_francais'=>	'Gibbon de Kloss',         'nom_latin'=>'Hylobates klossii',           'espece_genre'=>'Gibbon'],
        ['id_espece' => 88, 'nom_francais'=>	'Siamang',                 'nom_latin'=>'Symphalangus syndactylus',    'espece_genre'=>'Siamang'],
        ['id_espece' => 99, 'nom_francais'=>	'Ours malais',             'nom_latin'=>'Helarctos malayanus',         'espece_genre'=>'ours']

    ],

    'media' => [
        'acm_1' => ['caum_code'=>'PHOTO1','caum_type'=>'PHOTO','caum_lang'=>'__'],
        'acm_2' => ['caum_code'=>'PHOTO2','caum_type'=>'PHOTO','caum_lang'=>'__'],
        'acm_3' => ['caum_code'=>'DETAIL','caum_type'=>'HTML','caum_lang'=>'FR'],
        'acm_4' => ['caum_code'=>'DETAIL','caum_type'=>'HTML','caum_lang'=>'EN'],
        'acm_5' => ['caum_code'=>'DETAIL','caum_type'=>'HTML','caum_lang'=>'ES']
    ],

    'year' => [
        '2021' => '2021',
        '2020' => '2020',
        '2019' => '2019',
        '2018' => '2018',
        '2017' => '2017',
        '2016' => '2016',
        '2015' => '2015'

    ],

    'gender' => [

        'MISTER' => 'Monsieur',
        'MADAM'  => 'Madame',
        'MISS'   => 'Mademoiselle',
        'OTHER'  => 'Autre'
    ],

    'status' => [
        'WAIT' => 'WAIT',
        'OK'   => 'OK'
    ]
    ,
    'role' => [
        '0' => 'User',
        '1' => 'Admin'
    ],

    'donation_type' =>[
        'Gibonn' => 'Gibbon',
        'Dulan' => 'Dulan',
        'Forest' => 'Forêt',
        'Asso' => 'Asso'
    ]
];
