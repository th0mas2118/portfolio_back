<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ProjectsController extends Controller
{
    /**
     * Tous les projets du portfolio
     * 
     * Retourne la liste complète de tous les projets réalisés,
     * incluant les projets en vedette et les autres réalisations.
     * Chaque projet contient : technologies, description, liens,
     * captures d'écran et métriques de développement.
     * 
     * @return JsonResponse Liste exhaustive des projets
     */
    public function all(): JsonResponse
    {
        $featured = config('portfolio.projects.featured');
        $others = config('portfolio.projects.all');
        $statistics = config('portfolio.projects.statistics');
        
        // Fusionner tous les projets
        $allProjects = array_merge($featured, $others);
        
        return response()->json([
            'projects' => array_values($allProjects),
            'total' => count($allProjects),
            'statistics' => $statistics
        ]);
    }

    /**
     * Projets mis en avant et réalisations phares
     * 
     * Sélection des meilleurs projets du portfolio, choisis pour
     * démontrer l'étendue des compétences et la qualité du travail.
     * Inclut les projets les plus complexes, innovants ou récents.
     * 
     * @return JsonResponse Projets sélectionnés du portfolio
     */
    public function featured(): JsonResponse
    {
        $featured = config('portfolio.projects.featured');
        
        return response()->json([
            'projects' => array_values($featured),
            'total' => count($featured)
        ]);
    }

    /**
     * Détails complets d'un projet spécifique
     * 
     * Informations détaillées sur un projet : architecture technique,
     * défis rencontrés, solutions apportées, résultats obtenus,
     * technologies utilisées et apprentissages réalisés.
     * 
     * @param int $id Identifiant unique du projet
     * @return JsonResponse Détails complets du projet
     */
    public function show(int $id): JsonResponse
    {
        $featured = config('portfolio.projects.featured');
        $others = config('portfolio.projects.all');
        $allProjects = array_merge($featured, $others);
        
        $project = collect($allProjects)->firstWhere('id', $id);

        if (!$project) {
            return response()->json(['error' => 'Projet non trouvé'], 404);
        }

        return response()->json($project);
    }

    /**
     * Projets filtrés par technologie spécifique
     * 
     * Recherche et retourne tous les projets utilisant une technologie
     * particulière (framework, langage, outil). Utile pour démontrer
     * l'expertise sur une stack technique spécifique.
     * 
     * @param string $tech Nom de la technologie à filtrer
     * @return JsonResponse Projets utilisant cette technologie
     */
    public function byTechnology(string $tech): JsonResponse
    {
        $featured = config('portfolio.projects.featured');
        $others = config('portfolio.projects.all');
        $allProjects = array_merge($featured, $others);
        
        $filtered = array_filter($allProjects, function($project) use ($tech) {
            return in_array($tech, $project['technologies'] ?? []);
        });

        return response()->json([
            'technology' => $tech,
            'projects' => array_values($filtered),
            'total' => count($filtered)
        ]);
    }

    /**
     * Statistiques et métriques du portfolio
     * 
     * Données quantitatives sur l'ensemble des projets :
     * répartition par technologies, durées de développement,
     * types de projets, évolution dans le temps et indicateurs clés.
     * 
     * @return JsonResponse Métriques et analyses du portfolio
     */
    public function statistics(): JsonResponse
    {
        return response()->json(config('portfolio.projects.statistics'));
    }
}
