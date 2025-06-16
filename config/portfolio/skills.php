<?php

return [
    'technical' => [
        'frontend' => [
            'vue_js' => [
                'name' => 'Vue.js',
                'level' => 9,
                'years' => 3,
                'projects' => 15,
                'versions' => ['Vue 2', 'Vue 3'],
                'ecosystem' => ['Vuex', 'Pinia', 'Vue Router', 'Nuxt.js']
            ],
            'javascript' => [
                'name' => 'JavaScript',
                'level' => 8,
                'years' => 4,
                'projects' => 25,
                'versions' => ['ES6+', 'TypeScript'],
                'ecosystem' => ['Node.js', 'Webpack', 'Vite']
            ],
            'html_css' => [
                'name' => 'HTML/CSS',
                'level' => 8,
                'years' => 5,
                'projects' => 30,
                'versions' => ['HTML5', 'CSS3'],
                'ecosystem' => ['Sass', 'Tailwind CSS', 'Bootstrap']
            ],
            'typescript' => [
                'name' => 'TypeScript',
                'level' => 7,
                'years' => 2,
                'projects' => 8,
                'versions' => ['4.x', '5.x'],
                'ecosystem' => ['Vue + TS', 'Node + TS']
            ]
        ],

        'backend' => [
            'laravel' => [
                'name' => 'Laravel',
                'level' => 8,
                'years' => 3,
                'projects' => 12,
                'versions' => ['Laravel 8', 'Laravel 9', 'Laravel 10', 'Laravel 11'],
                'ecosystem' => ['Eloquent', 'Sanctum', 'Horizon', 'Nova']
            ],
            'php' => [
                'name' => 'PHP',
                'level' => 8,
                'years' => 4,
                'projects' => 15,
                'versions' => ['PHP 7.4', 'PHP 8.0', 'PHP 8.1', 'PHP 8.2', 'PHP 8.3'],
                'ecosystem' => ['Composer', 'PHPUnit', 'Psalm']
            ],
            'api_rest' => [
                'name' => 'API REST',
                'level' => 9,
                'years' => 3,
                'projects' => 18,
                'versions' => ['OpenAPI 3.0'],
                'ecosystem' => ['Postman', 'Swagger', 'GraphQL']
            ]
        ],

        'databases' => [
            'mysql' => [
                'name' => 'MySQL',
                'level' => 7,
                'years' => 3,
                'projects' => 12,
                'versions' => ['5.7', '8.0']
            ],
            'sqlite' => [
                'name' => 'SQLite',
                'level' => 6,
                'years' => 2,
                'projects' => 5,
                'versions' => ['3.x']
            ],
            'redis' => [
                'name' => 'Redis',
                'level' => 6,
                'years' => 2,
                'projects' => 8,
                'versions' => ['6.x', '7.x']
            ]
        ],

        'tools' => [
            'git' => [
                'name' => 'Git',
                'level' => 8,
                'years' => 4,
                'projects' => 30,
                'ecosystem' => ['GitHub', 'GitLab', 'Bitbucket']
            ],
            'docker' => [
                'name' => 'Docker',
                'level' => 7,
                'years' => 2,
                'projects' => 10,
                'ecosystem' => ['Docker Compose', 'Kubernetes basics']
            ],
            'vscode' => [
                'name' => 'VS Code',
                'level' => 9,
                'years' => 4,
                'projects' => 50,
                'ecosystem' => ['Extensions', 'Debugging', 'Git integration']
            ],
            'postman' => [
                'name' => 'Postman',
                'level' => 8,
                'years' => 3,
                'projects' => 20,
                'ecosystem' => ['API Testing', 'Collections', 'Environments']
            ]
        ]
    ],

    'soft_skills' => [
        'communication' => [
            'name' => 'Communication',
            'level' => 8,
            'description' => 'Capacité à expliquer des concepts techniques de manière claire'
        ],
        'problem_solving' => [
            'name' => 'Résolution de problèmes',
            'level' => 9,
            'description' => 'Approche méthodique pour analyser et résoudre les défis techniques'
        ],
        'teamwork' => [
            'name' => 'Travail en équipe',
            'level' => 8,
            'description' => 'Collaboration efficace avec les équipes multidisciplinaires'
        ],
        'learning' => [
            'name' => 'Apprentissage continu',
            'level' => 9,
            'description' => 'Passion pour découvrir et maîtriser de nouvelles technologies'
        ],
        'autonomy' => [
            'name' => 'Autonomie',
            'level' => 8,
            'description' => 'Capacité à prendre des initiatives et gérer ses projets'
        ]
    ],

    'frameworks' => [
        'vue_ecosystem' => [
            'name' => 'Écosystème Vue.js',
            'items' => ['Vue 3', 'Vuex', 'Pinia', 'Vue Router', 'Nuxt.js', 'Quasar'],
            'level' => 9
        ],
        'laravel_ecosystem' => [
            'name' => 'Écosystème Laravel',
            'items' => ['Laravel', 'Eloquent', 'Sanctum', 'Horizon', 'Nova', 'Sail'],
            'level' => 8
        ],
        'css_frameworks' => [
            'name' => 'Frameworks CSS',
            'items' => ['Tailwind CSS', 'Bootstrap', 'Bulma', 'Sass'],
            'level' => 8
        ],
        'build_tools' => [
            'name' => 'Outils de build',
            'items' => ['Vite', 'Webpack', 'Laravel Mix', 'Rollup'],
            'level' => 7
        ]
    ],

    'evolution' => [
        2021 => ['Vue.js basics', 'PHP basics', 'HTML/CSS'],
        2022 => ['Laravel', 'MySQL', 'Git workflow', 'API REST'],
        2023 => ['Vue 3 Composition API', 'TypeScript', 'Docker', 'Advanced Laravel'],
        2024 => ['Nuxt.js', 'Performance optimization', 'Testing', 'DevOps basics'],
        2025 => ['Advanced TypeScript', 'Microservices', 'Cloud deployment']
    ]
];
