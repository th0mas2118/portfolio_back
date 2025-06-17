<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Informations de base du profil
     * 
     * Retourne les informations essentielles du profil professionnel :
     * nom, titre, localisation, contact principal.
     * 
     * @return JsonResponse Données de base du profil
     */
    public function basic(): JsonResponse
    {
        return response()->json(config('portfolio.profile.basic'));
    }

    /**
     * Biographie détaillée et présentation personnelle
     * 
     * Contient la biographie courte et longue, les mots-clés
     * et la présentation complète du professionnel.
     * 
     * @return JsonResponse Biographie et présentation
     */
    public function bio(): JsonResponse
    {
        return response()->json(config('portfolio.profile.bio'));
    }

    /**
     * Coordonnées et réseaux sociaux
     * 
     * Informations de contact complètes incluant email, téléphone,
     * site web et liens vers les réseaux sociaux professionnels.
     * 
     * @return JsonResponse Coordonnées de contact
     */
    public function contact(): JsonResponse
    {
        return response()->json(config('portfolio.profile.contact'));
    }

    /**
     * Statut de disponibilité pour missions et emploi
     * 
     * Indique la disponibilité actuelle, les types de missions recherchées,
     * les préférences de localisation et les tarifs.
     * 
     * @return JsonResponse Statut de disponibilité
     */
    public function availability(): JsonResponse
    {
        return response()->json(config('portfolio.profile.availability'));
    }

    /**
     * Langues parlées avec niveaux de maîtrise
     * 
     * Liste des langues maîtrisées avec le niveau de compétence
     * et une description du niveau atteint.
     * 
     * @return JsonResponse Langues et niveaux
     */
    public function languages(): JsonResponse
    {
        return response()->json(config('portfolio.profile.languages'));
    }
}
