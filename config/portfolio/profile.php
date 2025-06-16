<?php

return [
    'basic' => [
        'name' => 'Thomas Pierson',
        'first_name' => 'Prénom',
        'last_name' => 'Nom',
        'title' => 'Développeur Full Stack',
        'subtitle' => 'Spécialisé Vue.js & Laravel',
        'location' => [
            'city' => 'Paris',
            'country' => 'France',
            'timezone' => 'Europe/Paris'
        ],
        'avatar' => '/images/avatar.jpg',
        'status' => 'available', // available, busy, unavailable
    ],

    'bio' => [
        'short' => 'Développeur passionné par la création d\'applications web modernes avec Vue.js et Laravel. Spécialisé dans le développement d\'APIs robustes et d\'interfaces utilisateur intuitives.',
        'long' => 'Développeur full stack avec une expertise approfondie en Vue.js et Laravel. J\'aime créer des applications web performantes et élégantes qui résolvent des problèmes concrets. Mon approche combine rigueur technique et créativité pour livrer des solutions de qualité.',
        'keywords' => ['Vue.js', 'Laravel', 'API REST', 'JavaScript', 'PHP', 'Full Stack']
    ],

    'contact' => [
        'email' => 'contact@exemple.com',
        'phone' => '+33 1 23 45 67 89',
        'website' => 'https://votre-portfolio.com',
        'linkedin' => 'https://linkedin.com/in/votre-profil',
        'github' => 'https://github.com/votre-username',
        'twitter' => 'https://twitter.com/votre-username'
    ],

    'availability' => [
        'status' => 'open_to_opportunities', // open_to_opportunities, employed, freelance_only
        'type' => ['freelance', 'full_time', 'part_time'],
        'location_preference' => ['remote', 'paris', 'ile_de_france'],
        'notice_period' => '2 weeks',
        'hourly_rate' => [
            'min' => 400,
            'max' => 600,
            'currency' => 'EUR'
        ]
    ],

    'languages' => [
        'french' => [
            'name' => 'Français',
            'level' => 'native',
            'description' => 'Langue maternelle'
        ],
        'english' => [
            'name' => 'Anglais',
            'level' => 'fluent',
            'description' => 'Courant professionnel'
        ]
    ]
];
