<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SkillsController extends Controller
{
    /**
     * Compétences techniques avec niveaux de maîtrise
     * 
     * Retourne la liste complète des compétences techniques du développeur
     * avec les niveaux de maîtrise, années d'expérience et nombre de projets.
     * Inclut frontend, backend, langages et outils de développement.
     * 
     * @return JsonResponse Compétences techniques détaillées
     */
    public function technical(): JsonResponse
    {
        return response()->json(config('portfolio.skills.technical'));
    }

    /**
     * Soft skills et compétences transversales
     * 
     * Liste des compétences relationnelles, méthodologiques et humaines.
     * Inclut la gestion d'équipe, communication, résolution de problèmes,
     * adaptabilité et capacités d'apprentissage continu.
     * 
     * @return JsonResponse Soft skills et compétences humaines
     */
    public function soft(): JsonResponse
    {
        return response()->json(config('portfolio.skills.soft_skills'));
    }

    /**
     * Frameworks et librairies maîtrisés
     * 
     * Détail des frameworks frontend et backend utilisés dans les projets.
     * Pour chaque framework : niveau de maîtrise, projets réalisés,
     * versions utilisées et cas d'usage spécifiques.
     * 
     * @return JsonResponse Frameworks avec détails d'usage
     */
    public function frameworks(): JsonResponse
    {
        return response()->json(config('portfolio.skills.frameworks'));
    }

    /**
     * Bases de données et technologies de stockage
     * 
     * Compétences en bases de données relationnelles et NoSQL.
     * Inclut MySQL, PostgreSQL, Redis, avec les niveaux de maîtrise
     * et les contextes d'utilisation dans les projets.
     * 
     * @return JsonResponse Technologies de bases de données
     */
    public function databases(): JsonResponse
    {
        return response()->json(config('portfolio.skills.technical.databases'));
    }

    /**
     * Outils et logiciels de développement
     * 
     * Écosystème d'outils utilisés au quotidien : IDE, versioning,
     * conteneurisation, CI/CD, monitoring et outils de productivité.
     * Avec niveaux de maîtrise et fréquence d'utilisation.
     * 
     * @return JsonResponse Outils de développement
     */
    public function tools(): JsonResponse
    {
        return response()->json(config('portfolio.skills.technical.tools'));
    }

    /**
     * Évolution des compétences dans le temps
     * 
     * Timeline de l'acquisition des compétences avec dates clés,
     * technologies apprises, certifications obtenues et objectifs futurs.
     * Montre la progression continue et la capacité d'adaptation.
     * 
     * @return JsonResponse Historique et évolution des compétences
     */
    public function evolution(): JsonResponse
    {
        return response()->json([
            'timeline' => config('portfolio.skills.evolution'),
            'summary' => 'Évolution continue depuis 2021 avec focus sur Vue.js et Laravel'
        ]);
    }
}
