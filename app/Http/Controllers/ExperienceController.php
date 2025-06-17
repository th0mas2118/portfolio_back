<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ExperienceController extends Controller
{
    /**
     * Expériences professionnelles
     */
    public function professional(): JsonResponse
    {
        return response()->json(config('portfolio.experience.professional'));
    }

    /**
     * Formation et éducation
     */
    public function education(): JsonResponse
    {
        return response()->json(config('portfolio.experience.education'));
    }

    /**
     * Timeline chronologique
     */
    public function timeline(): JsonResponse
    {
        return response()->json([
            'timeline' => config('portfolio.experience.timeline'),
            'summary' => 'Parcours de 2018 à 2025 - De la licence aux projets professionnels'
        ]);
    }

    /**
     * CV complet
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
     * Certifications
     */
    public function certifications(): JsonResponse
    {
        return response()->json(config('portfolio.experience.education.certifications'));
    }

    /**
     * Réalisations
     */
    public function achievements(): JsonResponse
    {
        return response()->json(config('portfolio.experience.achievements'));
    }
}
