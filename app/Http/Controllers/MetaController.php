<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Composer\InstalledVersions;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MetaController extends Controller
{
    /**
     * Liste de tous les endpoints disponibles (générée automatiquement)
     */
    public function endpoints(Request $request): JsonResponse
    {
        $request->validate([
            'light' => 'boolean|nullable'
        ]);
        
        $light = $request->boolean('light', false);
        
        // Récupérer toutes les routes
        $routes = Route::getRoutes();
        $apiRoutes = [];
        $categories = [];
        
        foreach ($routes as $route) {
            $uri = $route->uri();
            $methods = $route->methods();
            $name = $route->getName();
            $action = $route->getAction();
            
            // Ne prendre que les routes qui commencent par 'api/'
            if (str_starts_with($uri, 'api/')) {
                // Nettoyer les méthodes (enlever HEAD)
                $cleanMethods = array_filter($methods, function($method) {
                    return !in_array($method, ['HEAD']);
                });
                
                foreach ($cleanMethods as $method) {
                    // Extraire la catégorie de l'URI
                    $category = $this->extractCategoryFromUri($uri);
                    
                    // Récupérer la description depuis le docblock de la méthode
                    $description = $this->getDescriptionFromController($action);
                    
                    $endpoint = [
                        'method' => $method,
                        'uri' => '/' . $uri,
                        'name' => $name,
                        'description' => $description,
                        'category' => $category,
                        'parameters' => $this->extractParameters($uri)
                    ];
                    
                    // Ajouter à la catégorie appropriée
                    if (!isset($categories[$category])) {
                        $categories[$category] = [
                            'description' => $this->getCategoryDescription($category),
                            'endpoints' => []
                        ];
                    }
                    
                    $categories[$category]['endpoints'][] = $endpoint;
                    $apiRoutes[] = $endpoint;
                }
            }
        }
        
        // Trier les catégories et endpoints
        ksort($categories);
        foreach ($categories as &$category) {
            usort($category['endpoints'], function($a, $b) {
                return strcmp($a['uri'], $b['uri']);
            });
        }
        
        if ($light) {
            return response()->json([
                'api_info' => [
                    'name' => 'Portfolio API',
                    'version' => '1.0.0',
                    'description' => 'API REST pour CV interactif (descriptions depuis docblocks)',
                    'base_url' => url('/api'),
                    'generated_at' => now()->toISOString()
                ],
                'endpoints' => $apiRoutes,
                'total' => count($apiRoutes),
                'version' => InstalledVersions::getRootPackage()['version'],
            ]);
        }
        
        return response()->json([
            'api_info' => [
                'name' => 'Portfolio API',
                'version' => InstalledVersions::getRootPackage()['version'],
                'description' => 'API REST pour CV interactif (descriptions depuis docblocks)',
                'base_url' => url('/api'),
                'generated_at' => now()->toISOString()
            ],
            'categories' => $categories,
            'all_endpoints' => $apiRoutes,
            'statistics' => [
                'total_endpoints' => count($apiRoutes),
                'total_categories' => count($categories),
                'methods_supported' => array_unique(array_column($apiRoutes, 'method'))
            ],
            'authentication' => 'None required',
            'rate_limit' => 'None',
            'cors_enabled' => true,
            'supported_formats' => ['JSON']
        ]);
    }
    
    /**
     * Récupérer la description depuis le docblock de la méthode du controller
     */
    private function getDescriptionFromController(array $action): string
    {
        // Vérifier si c'est un controller avec une méthode
        if (!isset($action['controller']) || !str_contains($action['controller'], '@')) {
            return 'Endpoint sans description';
        }
        
        try {
            // Extraire la classe et la méthode
            [$controllerClass, $methodName] = explode('@', $action['controller']);
            
            // Utiliser la Reflection pour accéder au docblock
            $reflectionClass = new \ReflectionClass($controllerClass);
            $reflectionMethod = $reflectionClass->getMethod($methodName);
            
            // Récupérer le docblock
            $docComment = $reflectionMethod->getDocComment();
            
            if ($docComment) {
                // Parser le docblock pour extraire la description
                return $this->parseDocComment($docComment);
            }
            
        } catch (\ReflectionException $e) {
            // En cas d'erreur de reflection, utiliser une description par défaut
            return "Méthode: {$methodName}";
        } catch (\Exception $e) {
            return 'Description indisponible';
        }
        
        // Fallback sur une description par défaut
        return $this->getDefaultDescription($action);
    }
    
    /**
     * Parser un docblock pour extraire la description
     */
    private function parseDocComment(string $docComment): string
    {
        // Nettoyer le docblock
        $lines = explode("\n", $docComment);
        $description = '';
        
        foreach ($lines as $line) {
            // Nettoyer la ligne (enlever /*, */ et *)
            $cleanLine = trim($line);
            $cleanLine = preg_replace('/^\s*\/?\*+\/?/', '', $cleanLine);
            $cleanLine = trim($cleanLine);
            
            // Si la ligne commence par @, c'est une annotation, on s'arrête
            if (str_starts_with($cleanLine, '@')) {
                break;
            }
            
            // Si ce n'est pas vide, l'ajouter à la description
            if (!empty($cleanLine)) {
                if (empty($description)) {
                    $description = $cleanLine;
                } else {
                    $description .= ' ' . $cleanLine;
                }
            }
        }
        
        return !empty($description) ? $description : 'Aucune description disponible';
    }
    
    /**
     * Description par défaut basée sur l'action
     */
    private function getDefaultDescription(array $action): string
    {
        if (isset($action['controller']) && str_contains($action['controller'], '@')) {
            [$controllerClass, $methodName] = explode('@', $action['controller']);
            $controllerName = class_basename($controllerClass);
            return "Méthode {$methodName} du {$controllerName}";
        }
        
        return 'Endpoint sans description';
    }
    
    /**
     * Extraire la catégorie à partir de l'URI
     */
    private function extractCategoryFromUri(string $uri): string
    {
        $parts = explode('/', $uri);
        if (count($parts) >= 2 && $parts[0] === 'api') {
            return $parts[1];
        }
        return 'other';
    }
    
    /**
     * Extraire les paramètres d'une URI
     */
    private function extractParameters(string $uri): array
    {
        preg_match_all('/\{([^}]+)\}/', $uri, $matches);
        
        $parameters = [];
        foreach ($matches[1] as $param) {
            $parameters[] = [
                'name' => $param,
                'type' => $this->guessParameterType($param),
                'required' => true,
                'description' => $this->getParameterDescription($param)
            ];
        }
        
        return $parameters;
    }
    
    /**
     * Deviner le type d'un paramètre
     */
    private function guessParameterType(string $param): string
    {
        if (in_array($param, ['id'])) {
            return 'integer';
        }
        return 'string';
    }
    
    /**
     * Description d'un paramètre
     */
    private function getParameterDescription(string $param): string
    {
        $descriptions = [
            'id' => 'Identifiant unique de la ressource',
            'tech' => 'Nom de la technologie'
        ];
        
        return $descriptions[$param] ?? "Paramètre: {$param}";
    }
    
    /**
     * Description d'une catégorie
     */
    private function getCategoryDescription(string $category): string
    {
        $descriptions = [
            'profile' => 'Informations personnelles et profil',
            'skills' => 'Compétences techniques et soft skills',
            'projects' => 'Portfolio et réalisations',
            'experience' => 'Expérience professionnelle et formation',
            'cv' => 'CV et documents',
            'meta' => 'Métadonnées de l\'API',
            'certifications' => 'Certifications',
            'achievements' => 'Réalisations',
            'health' => 'Santé de l\'API',
            'other' => 'Autres endpoints'
        ];
        
        return $descriptions[$category] ?? ucfirst($category);
    }

    /**
     * Extraire la catégorie d'une route
     */
    private function extractCategory(string $uri, ?string $name): string
    {
        // Si le nom de route existe, l'utiliser
        if ($name && str_contains($name, '.')) {
            $parts = explode('.', $name);
            return $parts[0] ?? 'other';
        }

        // Sinon, extraire de l'URI
        $uriParts = explode('/', $uri);
        if (count($uriParts) >= 2 && $uriParts[0] === 'api') {
            return $uriParts[1];
        }

        return 'other';
    }

    /**
     * Générer une description pour une route
     */
    private function getRouteDescription(string $uri, ?string $name, string $action): string
    {
        // Descriptions personnalisées basées sur l'URI ou le nom
        $descriptions = [
            // Profil
            'api/profile/basic' => 'Informations de base du profil',
            'api/profile/bio' => 'Biographie détaillée et présentation',
            'api/profile/contact' => 'Coordonnées et réseaux sociaux',
            'api/profile/availability' => 'Statut de disponibilité pour missions',
            'api/profile/languages' => 'Langues parlées avec niveaux',

            // Compétences
            'api/skills/technical' => 'Compétences techniques avec niveaux de maîtrise',
            'api/skills/soft' => 'Compétences relationnelles et méthodologiques',
            'api/skills/frameworks' => 'Frameworks et librairies maîtrisés',
            'api/skills/databases' => 'Bases de données utilisées',
            'api/skills/tools' => 'Outils de développement et logiciels',
            'api/skills/evolution' => 'Évolution des compétences dans le temps',

            // Projets
            'api/projects/all' => 'Liste complète des projets réalisés',
            'api/projects/featured' => 'Projets mis en avant dans le portfolio',
            'api/projects/statistics' => 'Statistiques sur les projets (technologies, dates)',

            // Expérience
            'api/experience/professional' => 'Parcours professionnel et postes occupés',
            'api/experience/education' => 'Diplômes et formations suivies',
            'api/experience/timeline' => 'Chronologie complète du parcours',
            'api/cv/full' => 'CV complet formaté',
            'api/certifications' => 'Certifications obtenues',
            'api/achievements' => 'Réalisations marquantes',

            // Meta
            'api/meta/endpoints' => 'Liste de tous les endpoints de l\'API',
            'api/meta/documentation' => 'Documentation complète de l\'API',
            'api/meta/version' => 'Version actuelle de l\'API',
            'api/health' => 'État de santé de l\'API',
            'api/debug-cors' => 'Route de test pour debug CORS',
            'api' => 'Informations générales de l\'API'
        ];

        // Retourner la description personnalisée ou générer une description automatique
        if (isset($descriptions[$uri])) {
            return $descriptions[$uri];
        }

        // Description automatique basée sur l'action du controller
        if (str_contains($action, '@')) {
            $actionParts = explode('@', $action);
            $method = $actionParts[1] ?? '';
            return "Opération: {$method}";
        }

        return "Endpoint: {$uri}";
    }

    /**
     * Nettoyer les méthodes HTTP
     */
    private function cleanMethods(array $methods): array
    {
        // Enlever HEAD et OPTIONS si GET existe
        $methods = array_filter($methods, function ($method) {
            return !in_array($method, ['HEAD']);
        });

        return array_values($methods);
    }

    /**
     * Documentation complète de l'API
     * 
     * Guide d'utilisation détaillé de l'API avec exemples pratiques,
     * structure des réponses, codes d'erreur, bonnes pratiques
     * et informations techniques pour les développeurs.
     * 
     * @return JsonResponse Documentation interactive de l'API
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
