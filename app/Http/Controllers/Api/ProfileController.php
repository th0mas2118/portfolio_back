<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Informations de base du profil
     */
    public function basic(): JsonResponse
    {
        return response()->json(config('portfolio.profile.basic'));
    }

    /**
     * Biographie détaillée
     */
    public function bio(): JsonResponse
    {
        return response()->json(config('portfolio.profile.bio'));
    }

    /**
     * Informations de contact et réseaux sociaux
     */
    public function contact(): JsonResponse
    {
        return response()->json(config('portfolio.profile.contact'));
    }

    /**
     * Disponibilité pour missions/emploi
     */
    public function availability(): JsonResponse
    {
        return response()->json(config('portfolio.profile.availability'));
    }

    /**
     * Langues parlées avec niveaux
     */
    public function languages(): JsonResponse
    {
        return response()->json(config('portfolio.profile.languages'));
    }
}
