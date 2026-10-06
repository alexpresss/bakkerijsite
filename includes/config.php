<?php
if (!defined('APP')) { http_response_code(404); exit; }

// Alle gegevens die op meerdere pagina's terugkomen. Pas ze hier aan en ze
// veranderen overal: header, footer, contactpagina en de info voor Google.
return [
    'name'  => 'Bakkerij Muylaert',
    'url'   => 'https://bakkerij-muylaert.be',

    'phone'      => '+32 54 33 49 50',
    'phone_link' => '+3254334950',
    'phone_nav'  => '054 33 49 50',
    'email'      => 'info@bakkerij-muylaert.be',
    'street'     => 'Weggevoerdenstraat 100',
    'postal'     => '9400',
    'city'       => 'Ninove',
    'vat'        => 'BE 0898 559 597',
    'maps'       => 'https://goo.gl/maps/UsNjnL2GjDTNEZEV6',

    'social' => [
        ['label' => 'Facebook',  'icon' => 'fab fa-facebook-f', 'url' => 'https://www.facebook.com/Bakkerij.Muylaert.Ninove/'],
        ['label' => 'Instagram', 'icon' => 'fab fa-instagram',  'url' => 'https://www.instagram.com/bakkerijmuylaert/'],
        ['label' => 'YouTube',   'icon' => 'fab fa-youtube',    'url' => 'https://www.youtube.com/channel/UC2hKSpDhMnHTTnuFBzVUXDQ'],
    ],

    // days: 0 = zondag, 1 = maandag, ... 6 = zaterdag. open/close op null = gesloten.
    'hours' => [
        ['label' => 'Maandag & dinsdag',    'days' => [1, 2], 'open' => null,    'close' => null],
        ['label' => 'Woensdag & donderdag', 'days' => [3, 4], 'open' => '08:00', 'close' => '18:00'],
        ['label' => 'Vrijdag',              'days' => [5],    'open' => '08:00', 'close' => '17:00'],
        ['label' => 'Zaterdag',             'days' => [6],    'open' => '07:00', 'close' => '17:00'],
        ['label' => 'Zondag',               'days' => [0],    'open' => '07:00', 'close' => '12:00'],
    ],

    // De kerstfolder verschijnt vanzelf in het menu tijdens de kerstperiode, op voorwaarde dat
    // de pdf van dat jaar in assets/ staat als kerstfolder<jaar>.pdf (bv. kerstfolder2026.pdf).
    // mode: 'auto' = volgens de periode, 'on' = altijd tonen (nieuwste pdf), 'off' = nooit tonen.
    // from/until: maand-dag, beide inbegrepen. De periode mag over nieuwjaar lopen.
    'kerstfolder' => [
        'mode'  => 'auto',
        'from'  => '12-01',
        'until' => '01-01',
    ],

    // URL => pagina. 'nav' is de naam in het menu; zonder 'nav' staat de pagina niet in het menu.
    'pages' => [
        '' => [
            'file'        => 'home',
            'nav'         => 'Home',
            'title'       => 'Bakkerij Muylaert - Brood & gebak in Ninove',
            'description' => "Ambachtelijke bakkerij in Ninove sinds 1970. Gespecialiseerd in fototaarten, American cake's, chocolade- en marsepeinbewerking, ambachtelijk brood en ovenverse koeken.",
        ],
        'assortiment' => [
            'file'        => 'assortiment',
            'nav'         => 'Assortiment',
            'title'       => 'Assortiment - Bakkerij Muylaert',
            'description' => "Ontdek het assortiment van Bakkerij Muylaert in Ninove: brood, koeken, taarten, gebak, seizoensartikelen, American cake's en fototaarten.",
            'scripts'     => ['/js/assortiment.js'],
        ],
        'eindejaar' => [
            'file'        => 'eindejaar',
            'nav'         => 'Kerstfolder',
            'title'       => 'Eindejaarsfolder - Bakkerij Muylaert',
            'description' => 'Bekijk of download de kerstfolder van Bakkerij Muylaert met alle kerstspecialiteiten voor de feestdagen.',
        ],
        'historiek' => [
            'file'        => 'historiek',
            'nav'         => 'Historiek',
            'title'       => 'Historiek - Bakkerij Muylaert',
            'description' => 'De geschiedenis van Bakkerij Muylaert: een familiebakkerij in Ninove, opgericht in 1970 en vandaag in handen van Peter en Ilse.',
        ],
        'contact' => [
            'file'        => 'contact',
            'nav'         => 'Contact',
            'title'       => 'Contact - Bakkerij Muylaert',
            'description' => 'Contactgegevens en openingsuren van Bakkerij Muylaert, Weggevoerdenstraat 100, 9400 Ninove. Bestellen kan telefonisch of in de winkel.',
        ],
        'policy' => [
            'file'        => 'policy',
            'title'       => 'Privacy Policy - Bakkerij Muylaert',
            'description' => 'Privacy policy van Bakkerij Muylaert.',
        ],
    ],

    'not_found' => [
        'file'        => '404',
        'title'       => 'Error 404 - Bakkerij Muylaert',
        'description' => 'Deze pagina bestaat niet.',
    ],
];
