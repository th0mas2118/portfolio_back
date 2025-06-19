<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Gérer les requêtes preflight OPTIONS
        if ($request->getMethod() === 'OPTIONS') {
            return $this->corsPreflightResponse();
        }

        // Traiter la requête normale
        $response = $next($request);

        // Ajouter les headers CORS à toutes les réponses
        return $this->addCorsHeaders($response);
    }

    /**
     * Réponse pour les requêtes preflight OPTIONS
     */
    private function corsPreflightResponse(): Response
    {
        return response('', 200)
            ->header('Access-Control-Allow-Origin', $this->getAllowedOrigin())
            ->header('Access-Control-Allow-Methods', implode(', ', config('cors.allowed_methods')))
            ->header('Access-Control-Allow-Headers', implode(', ', config('cors.allowed_headers')))
            ->header('Access-Control-Allow-Credentials', config('cors.supports_credentials') ? 'true' : 'false')
            ->header('Access-Control-Max-Age', config('cors.max_age', 86400));
    }

    /**
     * Ajouter les headers CORS à la réponse
     */
    private function addCorsHeaders(Response $response): Response
    {
        return $response
            ->header('Access-Control-Allow-Origin', $this->getAllowedOrigin())
            ->header('Access-Control-Allow-Methods', implode(', ', config('cors.allowed_methods')))
            ->header('Access-Control-Allow-Headers', implode(', ', config('cors.allowed_headers')))
            ->header('Access-Control-Allow-Credentials', config('cors.supports_credentials') ? 'true' : 'false')
            ->header('Access-Control-Expose-Headers', implode(', ', config('cors.exposed_headers', [])));
    }

    /**
     * Déterminer l'origine autorisée basée sur la configuration CORS
     */
    private function getAllowedOrigin(): string
    {
        $origin = request()->header('Origin');
        $allowedOrigins = explode(',', config('cors.allowed_origins', ''));
        $allowedOrigins = array_map('trim', $allowedOrigins); // Trim des espaces
        
        // Si '*' est autorisé, retourner '*'
        if (in_array('*', $allowedOrigins)) {
            return '*';
        }
        
        // Si l'origine est dans la liste autorisée
        if (in_array($origin, $allowedOrigins)) {
            return $origin;
        }
        
        // Vérifier les patterns si configurés
        $allowedPatterns = config('cors.allowed_origins_patterns', []);
        foreach ($allowedPatterns as $pattern) {
            if (preg_match($pattern, $origin)) {
                return $origin;
            }
        }
        
        // Par défaut, retourner la première origine autorisée ou '*'
        return $allowedOrigins[0] ?? '*';
    }
}
