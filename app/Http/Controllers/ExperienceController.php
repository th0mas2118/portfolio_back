<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ExperienceController extends Controller
{
    /**
     * Expériences professionnelles et parcours de carrière
     * 
     * Détail complet des postes occupés, missions réalisées,
     * responsabilités, technologies utilisées et résultats obtenus.
     * Inclut stages, emplois et missions freelance avec contexte
     * et apprentissages pour chaque expérience.
     * 
     * @return JsonResponse Parcours professionnel détaillé
     */
    public function professional(): JsonResponse
    {
        return response()->json(config('portfolio.experience.professional'));
    }

    /**
     * Formation, éducation et parcours académique
     * 
     * Cursus scolaire et universitaire, diplômes obtenus,
     * formations complémentaires et auto-formation continue.
     * Inclut les projets étudiants significatifs et les
     * compétences développées pendant les études.
     * 
     * @return JsonResponse Formation et cursus académique
     */
    public function education(): JsonResponse
    {
        return response()->json(config('portfolio.experience.education'));
    }

    /**
     * Timeline chronologique complète du parcours
     * 
     * Vue d'ensemble chronologique intégrant formation,
     * expériences professionnelles, projets marquants,
     * certifications et événements clés de carrière.
     * Permet de visualiser l'évolution et la progression.
     * 
     * @return JsonResponse Timeline intégrée du parcours
     */
    public function timeline(): JsonResponse
    {
        return response()->json([
            'timeline' => config('portfolio.experience.timeline'),
            'summary' => 'Parcours de 2018 à 2025 - De la licence aux projets professionnels'
        ]);
    }

    /**
     * CV complet formaté et structuré
     * 
     * Document de synthèse regroupant toutes les informations
     * essentielles : profil, expériences, compétences, formation,
     * langues et réalisations. Format prêt pour téléchargement
     * ou consultation intégrale.
     * 
     * @return JsonResponse CV complet structuré
     */
    public function fullCv(): JsonResponse
    {
        return response()->json([
            'personal_info' => config('portfolio.profile.basic'),
            'professional_summary' => config('portfolio.profile.bio.short'),
            'experience' => config('portfolio.experience.professional'),
            'education' => config('portfolio.experience.education'),
            'skills' => config('portfolio.skills.technical'),
            'languages' => config('portfolio.profile.languages'),
            'achievements' => config('portfolio.experience.achievements')
        ]);
    }

    /**
     * Certifications et qualifications obtenues
     * 
     * Liste des certifications professionnelles, diplômes
     * complémentaires, formations certifiantes et badges
     * numériques obtenus. Inclut dates, organismes certificateurs
     * et niveaux de compétences validés.
     * 
     * @return JsonResponse Certifications et qualifications
     */
    public function certifications(): JsonResponse
    {
        return response()->json(config('portfolio.experience.education.certifications'));
    }

    /**
     * Réalisations marquantes et accomplissements
     * 
     * Projets significatifs, succès professionnels, reconnaissances,
     * contributions open source, publications ou interventions.
     * Met en valeur les moments forts et les impacts créés
     * dans le domaine professionnel.
     * 
     * @return JsonResponse Réalisations et accomplissements
     */
    public function achievements(): JsonResponse
    {
        return response()->json(config('portfolio.experience.achievements'));
    }
}
