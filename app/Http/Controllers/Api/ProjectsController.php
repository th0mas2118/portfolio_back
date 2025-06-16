<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ProjectsController extends Controller
{
    /**
     * Tous les projets
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
     * Projets mis en avant
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
     * Détails d'un projet spécifique
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
     * Projets par technologie
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
     * Statistiques des projets
     */
    public function statistics(): JsonResponse
    {
        return response()->json(config('portfolio.projects.statistics'));
    }
}
