<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SkillsController;
use App\Http\Controllers\Api\ProjectsController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\MetaController;
use Composer\InstalledVersions;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Portfolio API - CV Interactif
| Toutes les routes sont publiques et ne nécessitent pas d'authentification
|
*/


// Route de base de l'API
Route::get('/', function () {
    return response()->json([
        'message' => 'Portfolio API - CV Interactif',
        'version' => InstalledVersions::getRootPackage()['version'],
        'status' => 'active',
        'documentation' => url('/api/meta/documentation'),
        'endpoints' => url('/api/meta/endpoints'),
        'health' => url('/api/health'),
        'categories' => [
            'profile' => 'Informations personnelles et profil',
            'skills' => 'Compétences techniques et soft skills',
            'projects' => 'Portfolio et réalisations',
            'experience' => 'Expérience professionnelle et formation',
            'meta' => 'Métadonnées de l\'API'
        ]
    ]);
});

// Routes Profil & Identité
Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('basic', [ProfileController::class, 'basic'])->name('basic');
    Route::get('bio', [ProfileController::class, 'bio'])->name('bio');
    Route::get('contact', [ProfileController::class, 'contact'])->name('contact');
    Route::get('availability', [ProfileController::class, 'availability'])->name('availability');
    Route::get('languages', [ProfileController::class, 'languages'])->name('languages');
});

// Routes Compétences & Technologies
Route::prefix('skills')->name('skills.')->group(function () {
    Route::get('technical', [SkillsController::class, 'technical'])->name('technical');
    Route::get('soft', [SkillsController::class, 'soft'])->name('soft');
    Route::get('frameworks', [SkillsController::class, 'frameworks'])->name('frameworks');
    Route::get('databases', [SkillsController::class, 'databases'])->name('databases');
    Route::get('tools', [SkillsController::class, 'tools'])->name('tools');
    Route::get('evolution', [SkillsController::class, 'evolution'])->name('evolution');
});

// Routes Projets & Portfolio
Route::prefix('projects')->name('projects.')->group(function () {
    Route::get('all', [ProjectsController::class, 'all'])->name('all');
    Route::get('featured', [ProjectsController::class, 'featured'])->name('featured');
    Route::get('statistics', [ProjectsController::class, 'statistics'])->name('statistics');
    Route::get('technologies/{tech}', [ProjectsController::class, 'byTechnology'])->name('by-technology');
    Route::get('{id}', [ProjectsController::class, 'show'])->name('show')->where('id', '[0-9]+');
});

// Routes Expérience & CV
Route::prefix('experience')->name('experience.')->group(function () {
    Route::get('professional', [ExperienceController::class, 'professional'])->name('professional');
    Route::get('education', [ExperienceController::class, 'education'])->name('education');
    Route::get('timeline', [ExperienceController::class, 'timeline'])->name('timeline');
});

Route::prefix('cv')->name('cv.')->group(function () {
    Route::get('full', [ExperienceController::class, 'fullCv'])->name('full');
});

// Routes individuelles pour certifications et réalisations
Route::get('certifications', [ExperienceController::class, 'certifications'])->name('certifications');
Route::get('achievements', [ExperienceController::class, 'achievements'])->name('achievements');

// Routes Meta & Documentation
Route::prefix('meta')->name('meta.')->group(function () {
    Route::get('endpoints', [MetaController::class, 'endpoints'])->name('endpoints');
    Route::get('documentation', [MetaController::class, 'documentation'])->name('documentation');
    Route::get('version', [MetaController::class, 'version'])->name('version');
});

// Route de santé de l'API
Route::get('health', [MetaController::class, 'health'])->name('health');

// Route catch-all pour les endpoints non trouvés
Route::fallback(function () {
    return response()->json([
        'error' => 'Endpoint non trouvé',
        'message' => 'L\'endpoint demandé n\'existe pas',
        'available_endpoints' => url('/api/meta/endpoints'),
        'documentation' => url('/api/meta/documentation')
    ], 404);
});
