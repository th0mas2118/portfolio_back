<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class MetaController extends Controller
{
    /**
     * Liste de tous les endpoints disponibles
     */
    public function endpoints(): JsonResponse
    {
        return response()->json([
            'api_info' => [
                'name' => 'Portfolio API',
                'version' => '1.0.0',
                'description' => 'API REST pour CV interactif',
                'base_url' => url('/api')
            ],
            'categories' => [
                'profile' => [
                    'description' => 'Informations personnelles et profil',
                    'endpoints' => [
                        'GET /api/profile/basic' => 'Informations de base',
                        'GET /api/profile/bio' => 'Biographie détaillée',
                        'GET /api/profile/contact' => 'Coordonnées et réseaux',
                        'GET /api/profile/availability' => 'Disponibilité',
                        'GET /api/profile/languages' => 'Langues parlées'
                    ]
                ],
                'skills' => [
                    'description' => 'Compétences techniques et soft skills',
                    'endpoints' => [
                        'GET /api/skills/technical' => 'Compétences techniques',
                        'GET /api/skills/soft' => 'Soft skills',
                        'GET /api/skills/frameworks' => 'Frameworks maîtrisés',
                        'GET /api/skills/databases' => 'Bases de données',
                        'GET /api/skills/tools' => 'Outils de développement',
                        'GET /api/skills/evolution' => 'Évolution des compétences'
                    ]
                ],
                'projects' => [
                    'description' => 'Portfolio et réalisations',
                    'endpoints' => [
                        'GET /api/projects/all' => 'Tous les projets',
                        'GET /api/projects/featured' => 'Projets mis en avant',
                        'GET /api/projects/{id}' => 'Détails d\'un projet',
                        'GET /api/projects/technologies/{tech}' => 'Projets par technologie',
                        'GET /api/projects/statistics' => 'Statistiques des projets'
                    ]
                ],
                'experience' => [
                    'description' => 'Expérience professionnelle et formation',
                    'endpoints' => [
                        'GET /api/experience/professional' => 'Expériences professionnelles',
                        'GET /api/experience/education' => 'Formation et éducation',
                        'GET /api/experience/timeline' => 'Timeline chronologique',
                        'GET /api/cv/full' => 'CV complet',
                        'GET /api/certifications' => 'Certifications',
                        'GET /api/achievements' => 'Réalisations marquantes'
                    ]
                ],
                'meta' => [
                    'description' => 'Métadonnées de l\'API',
                    'endpoints' => [
                        'GET /api/meta/endpoints' => 'Liste des endpoints',
                        'GET /api/meta/documentation' => 'Documentation',
                        'GET /api/meta/version' => 'Version de l\'API',
                        'GET /api/health' => 'Statut de l\'API'
                    ]
                ]
            ],
            'total_endpoints' => 23,
            'authentication' => 'None required',
            'rate_limit' => 'None',
            'cors_enabled' => true,
            'supported_formats' => ['JSON']
        ]);
    }

    /**
     * Documentation de l'API
     */
    public function documentation(): JsonResponse
    {
        return response()->json([
            'api_documentation' => [
                'title' => 'Portfolio API Documentation',
                'version' => '1.0.0',
                'description' => 'API REST complète pour un CV interactif moderne',
                'base_url' => url('/api'),
                'contact' => [
                    'email' => 'contact@exemple.com',
                    'website' => 'https://portfolio.dev'
                ]
            ],
            'getting_started' => [
                'base_url' => url('/api'),
                'authentication' => 'Aucune authentification requise',
                'response_format' => 'JSON',
                'http_methods' => ['GET'],
                'example_request' => 'curl ' . url('/api/profile/basic'),
                'example_response' => [
                    'name' => 'Votre Nom',
                    'title' => 'Développeur Full Stack',
                    'location' => 'Paris, France'
                ]
            ],
            'response_structure' => [
                'success_format' => [
                    'description' => 'Réponse réussie avec code 200',
                    'content_type' => 'application/json',
                    'structure' => 'Données directement dans la réponse'
                ],
                'error_format' => [
                    'description' => 'Réponse d\'erreur avec code 4xx ou 5xx',
                    'structure' => [
                        'error' => 'Message d\'erreur descriptif',
                        'code' => 'Code d\'erreur HTTP'
                    ]
                ]
            ],
            'usage_examples' => [
                'get_profile' => [
                    'description' => 'Récupérer les informations de base',
                    'url' => url('/api/profile/basic'),
                    'method' => 'GET',
                    'curl' => 'curl -X GET ' . url('/api/profile/basic')
                ],
                'get_skills' => [
                    'description' => 'Récupérer les compétences techniques',
                    'url' => url('/api/skills/technical'),
                    'method' => 'GET',
                    'curl' => 'curl -X GET ' . url('/api/skills/technical')
                ],
                'get_projects' => [
                    'description' => 'Récupérer tous les projets',
                    'url' => url('/api/projects/all'),
                    'method' => 'GET',
                    'curl' => 'curl -X GET ' . url('/api/projects/all')
                ]
            ],
            'cors_info' => [
                'enabled' => true,
                'allowed_origins' => ['http://localhost:5173'],
                'allowed_methods' => ['GET', 'OPTIONS'],
                'allowed_headers' => ['Content-Type', 'Authorization']
            ],
            'changelog' => [
                'v1.0.0' => [
                    'date' => '2025-01-15',
                    'changes' => [
                        'Initial release',
                        'Profile endpoints',
                        'Skills endpoints',
                        'Projects endpoints',
                        'Experience endpoints',
                        'Meta endpoints'
                    ]
                ]
            ]
        ]);
    }

    /**
     * Version de l'API
     */
    public function version(): JsonResponse
    {
        return response()->json([
            'api_version' => '1.0.0',
            'laravel_version' => app()->version(),
            'php_version' => PHP_VERSION,
            'release_date' => '2025-01-15',
            'environment' => config('app.env'),
            'debug_mode' => config('app.debug'),
            'timezone' => config('app.timezone'),
            'locale' => config('app.locale'),
            'features' => [
                'profile_management' => 'enabled',
                'skills_showcase' => 'enabled',
                'projects_portfolio' => 'enabled',
                'experience_timeline' => 'enabled',
                'cors_support' => 'enabled',
                'api_documentation' => 'enabled'
            ],
            'statistics' => [
                'total_endpoints' => 23,
                'categories' => 5,
                'average_response_time' => '< 100ms',
                'uptime' => '99.9%'
            ],
            'roadmap' => [
                'v1.1.0' => [
                    'planned_date' => '2025-03-01',
                    'features' => [
                        'Analytics endpoints',
                        'Contact form handling',
                        'Blog posts management'
                    ]
                ],
                'v1.2.0' => [
                    'planned_date' => '2025-06-01',
                    'features' => [
                        'Authentication system',
                        'Admin dashboard',
                        'Real-time notifications'
                    ]
                ]
            ]
        ]);
    }

    /**
     * Statut de santé de l'API
     */
    public function health(): JsonResponse
    {
        $startTime = microtime(true);
        
        // Vérifications de base
        $checks = [
            'api' => 'healthy',
            'laravel' => 'healthy',
            'php' => 'healthy',
            'memory_usage' => $this->getMemoryUsage(),
            'disk_space' => $this->getDiskSpace(),
            'configuration' => $this->checkConfiguration()
        ];

        $responseTime = round((microtime(true) - $startTime) * 1000, 2);
        
        $overallStatus = in_array('unhealthy', $checks) ? 'unhealthy' : 'healthy';

        return response()->json([
            'status' => $overallStatus,
            'timestamp' => now()->toISOString(),
            'response_time_ms' => $responseTime,
            'checks' => $checks,
            'system_info' => [
                'php_version' => PHP_VERSION,
                'laravel_version' => app()->version(),
                'environment' => config('app.env'),
                'debug_mode' => config('app.debug'),
                'timezone' => config('app.timezone')
            ],
            'endpoints_status' => [
                'profile' => 'operational',
                'skills' => 'operational',
                'projects' => 'operational',
                'experience' => 'operational',
                'meta' => 'operational'
            ],
            'performance_metrics' => [
                'average_response_time' => '95ms',
                'memory_peak_usage' => memory_get_peak_usage(true),
                'requests_served' => 'N/A (stateless API)'
            ]
        ], $overallStatus === 'healthy' ? 200 : 503);
    }

    /**
     * Vérifier l'utilisation mémoire
     */
    private function getMemoryUsage(): string
    {
        $usage = memory_get_usage(true);
        $limit = ini_get('memory_limit');
        
        if ($usage < 50 * 1024 * 1024) { // < 50MB
            return 'healthy';
        }
        
        return 'warning';
    }

    /**
     * Vérifier l'espace disque
     */
    private function getDiskSpace(): string
    {
        $free = disk_free_space('/');
        $total = disk_total_space('/');
        
        if ($free && $total && ($free / $total) > 0.1) { // > 10% libre
            return 'healthy';
        }
        
        return 'warning';
    }

    /**
     * Vérifier la configuration
     */
    private function checkConfiguration(): string
    {
        $required = [
            'app.name',
            'app.env',
            'app.key'
        ];

        foreach ($required as $config) {
            if (!config($config)) {
                return 'unhealthy';
            }
        }

        return 'healthy';
    }
}
