<?php

return [
    'professional' => [
        'current_position' => [
            'id' => 'dev-fullstack-2024',
            'company' => 'Entreprise Actuelle',
            'position' => 'Développeur Full Stack',
            'type' => 'cdi', // cdi, freelance, stage, contrat
            'location' => 'Paris, France',
            'remote' => true,
            'start_date' => '2024-01-01',
            'end_date' => null, // null = en cours
            'duration' => '1 an+',
            'description' => 'Développement d\'applications web modernes avec Vue.js et Laravel. Conception d\'APIs REST et interfaces utilisateur intuitives.',
            'achievements' => [
                'Développement de 3 applications web complètes',
                'Amélioration des performances de 40%',
                'Mise en place de l\'architecture CI/CD',
                'Formation de 2 développeurs juniors'
            ],
            'technologies' => ['Vue.js 3', 'Laravel 11', 'MySQL', 'Docker', 'Git'],
            'team_size' => 5,
            'responsibilities' => [
                'Développement frontend avec Vue.js',
                'Conception d\'APIs REST avec Laravel',
                'Optimisation des performances',
                'Code review et mentoring'
            ]
        ],

        'previous_positions' => [
            [
                'id' => 'dev-junior-2023',
                'company' => 'Entreprise Précédente',
                'position' => 'Développeur Web Junior',
                'type' => 'cdi',
                'location' => 'Lyon, France',
                'remote' => false,
                'start_date' => '2023-03-01',
                'end_date' => '2023-12-31',
                'duration' => '10 mois',
                'description' => 'Premier poste en développement web. Apprentissage des bonnes pratiques et contribution aux projets d\'équipe.',
                'achievements' => [
                    'Montée en compétences rapide sur Vue.js',
                    'Contribution à 5 projets client',
                    'Certification Laravel Developer'
                ],
                'technologies' => ['Vue.js 2', 'Laravel 9', 'Bootstrap', 'jQuery'],
                'team_size' => 8
            ],

            [
                'id' => 'stage-2022',
                'company' => 'Startup Tech',
                'position' => 'Stagiaire Développeur',
                'type' => 'stage',
                'location' => 'Paris, France',
                'remote' => false,
                'start_date' => '2022-09-01',
                'end_date' => '2023-02-28',
                'duration' => '6 mois',
                'description' => 'Stage de fin d\'études dans une startup tech. Découverte du développement web moderne.',
                'achievements' => [
                    'Développement d\'un prototype fonctionnel',
                    'Initiation aux méthodes agiles',
                    'Validation du stage avec mention'
                ],
                'technologies' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL'],
                'team_size' => 3
            ]
        ]
    ],

    'education' => [
        'degrees' => [
            [
                'id' => 'master-info',
                'institution' => 'École Supérieure d\'Informatique',
                'degree' => 'Master en Développement Web',
                'field' => 'Informatique et Technologies Web',
                'location' => 'Paris, France',
                'start_date' => '2021-09-01',
                'end_date' => '2023-06-30',
                'duration' => '2 ans',
                'grade' => 'Mention Bien',
                'description' => 'Formation spécialisée en développement web moderne avec focus sur les technologies JavaScript et PHP.',
                'courses' => [
                    'Développement Frontend (React, Vue.js)',
                    'Développement Backend (Laravel, Node.js)',
                    'Bases de données (MySQL, MongoDB)',
                    'DevOps et Déploiement',
                    'Gestion de projet Agile'
                ],
                'projects' => [
                    'Projet de fin d\'études : Plateforme e-learning',
                    'Application mobile de gestion de tâches',
                    'API REST pour système de réservation'
                ]
            ],

            [
                'id' => 'licence-info',
                'institution' => 'Université de Technologie',
                'degree' => 'Licence Informatique',
                'field' => 'Informatique Générale',
                'location' => 'Lyon, France',
                'start_date' => '2018-09-01',
                'end_date' => '2021-06-30',
                'duration' => '3 ans',
                'grade' => 'Mention Assez Bien',
                'description' => 'Formation généraliste en informatique avec bases solides en programmation et mathématiques.',
                'courses' => [
                    'Algorithmique et structures de données',
                    'Programmation orientée objet',
                    'Systèmes et réseaux',
                    'Bases de données relationnelles',
                    'Mathématiques pour l\'informatique'
                ]
            ]
        ],

        'certifications' => [
            [
                'name' => 'Laravel Certified Developer',
                'issuer' => 'Laravel',
                'date' => '2023-11-15',
                'credential_id' => 'LC-2023-1547',
                'verification_url' => 'https://certification.laravel.com/verify/LC-2023-1547',
                'skills' => ['Laravel', 'Eloquent', 'API Development']
            ],
            [
                'name' => 'Vue.js Developer Certification',
                'issuer' => 'Vue School',
                'date' => '2024-03-20',
                'credential_id' => 'VS-2024-0892',
                'verification_url' => 'https://vueschool.io/certificates/VS-2024-0892',
                'skills' => ['Vue.js 3', 'Composition API', 'Pinia']
            ],
            [
                'name' => 'Docker Fundamentals',
                'issuer' => 'Docker',
                'date' => '2024-06-10',
                'credential_id' => 'DF-2024-3341',
                'skills' => ['Docker', 'Container Orchestration']
            ]
        ],

        'online_courses' => [
            [
                'name' => 'Advanced Vue.js Development',
                'platform' => 'Vue Mastery',
                'completion_date' => '2024-02-15',
                'hours' => 40
            ],
            [
                'name' => 'Laravel API Development',
                'platform' => 'Laracasts',
                'completion_date' => '2023-09-20',
                'hours' => 25
            ],
            [
                'name' => 'Modern JavaScript ES6+',
                'platform' => 'Udemy',
                'completion_date' => '2023-05-10',
                'hours' => 30
            ]
        ]
    ],

    'timeline' => [
        2018 => ['Début Licence Informatique'],
        2019 => ['Découverte du développement web', 'Premier projet HTML/CSS'],
        2020 => ['Apprentissage JavaScript', 'Introduction à PHP'],
        2021 => ['Fin de Licence', 'Début Master', 'Premier framework : Vue.js'],
        2022 => ['Apprentissage Laravel', 'Stage en startup', 'Premier projet full-stack'],
        2023 => ['Fin de Master', 'Premier emploi', 'Certification Laravel'],
        2024 => ['Poste actuel', 'Expertise Vue.js 3', 'Certification Vue.js'],
        2025 => ['Projet Portfolio API', 'Évolution vers Senior Developer']
    ],

    'achievements' => [
        [
            'title' => 'Développeur de l\'année 2024',
            'organization' => 'Entreprise Actuelle',
            'date' => '2024-12-15',
            'description' => 'Récompense pour contribution exceptionnelle aux projets de l\'équipe'
        ],
        [
            'title' => 'Meilleur projet étudiant',
            'organization' => 'École Supérieure d\'Informatique',
            'date' => '2023-06-20',
            'description' => 'Prix du meilleur projet de fin d\'études'
        ],
        [
            'title' => 'Hackathon Winner',
            'organization' => 'TechDays 2023',
            'date' => '2023-11-05',
            'description' => '1ère place au hackathon avec une application de gestion écologique'
        ]
    ]
];
