<?php

return [
    'featured' => [
        'portfolio_api' => [
            'id' => 'portfolio-api',
            'title' => 'Portfolio API - CV Interactif',
            'subtitle' => 'API REST moderne pour portfolio dynamique',
            'description' => 'API REST complète développée avec Laravel 12 pour créer un CV interactif nouvelle génération. Interface de test intégrée pour explorer les endpoints en temps réel.',
            'image' => '/images/projects/portfolio-api.jpg',
            'status' => 'in_progress', // completed, in_progress, planned
            'featured' => true,
            'technologies' => ['Laravel 12', 'PHP 8.3', 'API REST', 'Docker', 'Vue.js'],
            'category' => 'api',
            'year' => 2025,
            'links' => [
                'github' => 'https://github.com/username/portfolio-api',
                'demo' => 'http://localhost:8000/api',
                'frontend' => 'http://localhost:5173'
            ],
            'features' => [
                'Plus de 60 endpoints API',
                'Documentation interactive',
                'Interface de test en temps réel',
                'Architecture hybride (config + DB)',
                'CORS configuré pour Vue.js'
            ],
            'challenges' => [
                'Architecture API optimisée',
                'Gestion des données statiques',
                'Interface de test intuitive'
            ]
        ],

        'ecommerce_api' => [
            'id' => 'ecommerce-api',
            'title' => 'E-commerce API',
            'subtitle' => 'API complète pour boutique en ligne',
            'description' => 'API REST robuste pour une boutique en ligne avec gestion des produits, commandes, paiements et authentification.',
            'image' => '/images/projects/ecommerce-api.jpg',
            'status' => 'completed',
            'featured' => true,
            'technologies' => ['Laravel 11', 'MySQL', 'Stripe', 'JWT', 'Redis'],
            'category' => 'api',
            'year' => 2024,
            'links' => [
                'github' => 'https://github.com/username/ecommerce-api'
            ],
            'features' => [
                'Gestion complète des produits',
                'Système de commandes',
                'Intégration paiement Stripe',
                'Authentification JWT',
                'Cache Redis'
            ]
        ],

        'dashboard_analytics' => [
            'id' => 'dashboard-analytics',
            'title' => 'Dashboard Analytics',
            'subtitle' => 'Interface d\'administration temps réel',
            'description' => 'Dashboard d\'administration avec graphiques interactifs et statistiques en temps réel. Développé avec Vue.js 3 et Chart.js.',
            'image' => '/images/projects/dashboard.jpg',
            'status' => 'completed',
            'featured' => true,
            'technologies' => ['Vue.js 3', 'Chart.js', 'Tailwind CSS', 'WebSockets'],
            'category' => 'frontend',
            'year' => 2024,
            'links' => [
                'github' => 'https://github.com/username/dashboard-analytics',
                'demo' => 'https://dashboard-demo.com'
            ],
            'features' => [
                'Graphiques interactifs',
                'Données temps réel',
                'Interface responsive',
                'Filtres avancés',
                'Export des données'
            ]
        ]
    ],

    'all' => [
        // Reprendre les featured + ajouter d'autres
        'blog_cms' => [
            'id' => 'blog-cms',
            'title' => 'CMS Blog Personnel',
            'subtitle' => 'Système de gestion de contenu',
            'description' => 'CMS personnalisé avec éditeur de contenu riche et système de commentaires.',
            'image' => '/images/projects/blog-cms.jpg',
            'status' => 'completed',
            'featured' => false,
            'technologies' => ['Laravel', 'Vue.js', 'TinyMCE', 'MySQL'],
            'category' => 'fullstack',
            'year' => 2023,
            'links' => [
                'github' => 'https://github.com/username/blog-cms'
            ]
        ],

        'mobile_app' => [
            'id' => 'task-manager-app',
            'title' => 'Task Manager Mobile',
            'subtitle' => 'Application mobile de gestion de tâches',
            'description' => 'App hybride de gestion de tâches avec synchronisation cloud et notifications push.',
            'image' => '/images/projects/mobile-app.jpg',
            'status' => 'completed',
            'featured' => false,
            'technologies' => ['Vue.js', 'Capacitor', 'Laravel API', 'PWA'],
            'category' => 'mobile',
            'year' => 2023,
            'links' => [
                'github' => 'https://github.com/username/task-manager-app',
                'demo' => 'https://task-app-demo.com'
            ]
        ],

        'booking_system' => [
            'id' => 'booking-system',
            'title' => 'Système de Réservation',
            'subtitle' => 'Plateforme de réservation en ligne',
            'description' => 'Plateforme de réservation avec calendrier interactif et intégration de paiement.',
            'image' => '/images/projects/booking.jpg',
            'status' => 'completed',
            'featured' => false,
            'technologies' => ['Vue.js', 'Laravel', 'FullCalendar', 'PayPal'],
            'category' => 'fullstack',
            'year' => 2023
        ],

        'chat_app' => [
            'id' => 'realtime-chat',
            'title' => 'Chat Temps Réel',
            'subtitle' => 'Application de messagerie instantanée',
            'description' => 'Application de chat avec notifications push et partage de fichiers.',
            'image' => '/images/projects/chat.jpg',
            'status' => 'completed',
            'featured' => false,
            'technologies' => ['Vue.js', 'Socket.io', 'Laravel', 'Redis'],
            'category' => 'realtime',
            'year' => 2024
        ]
    ],

    'statistics' => [
        'total_projects' => 15,
        'completed_projects' => 12,
        'in_progress' => 2,
        'planned' => 1,
        'technologies_used' => [
            'Vue.js' => 10,
            'Laravel' => 8,
            'JavaScript' => 12,
            'PHP' => 8,
            'MySQL' => 6,
            'Docker' => 5
        ],
        'categories' => [
            'api' => 4,
            'frontend' => 5,
            'fullstack' => 4,
            'mobile' => 1,
            'realtime' => 1
        ],
        'years' => [
            2023 => 6,
            2024 => 7,
            2025 => 2
        ]
    ]
];
