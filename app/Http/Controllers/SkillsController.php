<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SkillsController extends Controller
{
    /**
     * Compétences techniques avec niveaux de maîtrise
     */
    public function technical(): JsonResponse
    {
        return response()->json(config('portfolio.skills.technical'));
    }

    /**
     * Soft skills et compétences transversales
     */
    public function soft(): JsonResponse
    {
        return response()->json(config('portfolio.skills.soft_skills'));
    }

    /**
     * Frameworks et librairies maîtrisés
     */
    public function frameworks(): JsonResponse
    {
        return response()->json(config('portfolio.skills.frameworks'));
    }

    /**
     * Bases de données et technologies de stockage
     */
    public function databases(): JsonResponse
    {
        return response()->json(config('portfolio.skills.technical.databases'));
    }

    /**
     * Outils et logiciels de développement
     */
    public function tools(): JsonResponse
    {
        return response()->json(config('portfolio.skills.technical.tools'));
    }

    /**
     * Évolution des compétences dans le temps
     */
    public function evolution(): JsonResponse
    {
        return response()->json([
            'timeline' => config('portfolio.skills.evolution'),
            'summary' => 'Évolution continue depuis 2021 avec focus sur Vue.js et Laravel'
        ]);
    }
}
