<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\EmargementController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\JustificationController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/wao', function () {
    return 'WAO';
});

Route::prefix('/v1/')->group(function () {
    return [
        Route::post('/login', [AuthController::class, 'login']),
        Route::middleware('auth:sanctum')->group(function () {
            return [
                Route::apiResource('users', UserController::class),
                Route::apiResource('emargements', EmargementController::class),
                Route::get('/emargements-by-enseignant/{enseignantID}', [EmargementController::class, 'allByEnseignantID']),
                Route::apiResource('enseignants', EnseignantController::class),
                Route::apiResource('filieres', FiliereController::class),
                Route::get('/all-filieres', [FiliereController::class, 'all']),
                Route::get('/modules/all', [ModuleController::class, 'all']),
                Route::apiResource('modules', ModuleController::class),
                Route::apiResource('rapports', RapportController::class),
                Route::get('/rapports/{enseignantId}/all', [RapportController::class, 'showByEnseignantID']),
                Route::get('/filieres/{enseignantId}/all', [FiliereController::class, 'allByEnseignantID']),
                Route::get('/rapports/{enseignantId}/generate', [RapportController::class, 'generate']),
                Route::get('/current-user', [AuthController::class, 'getCurrentUser']),
                Route::delete('/logout', [AuthController::class, 'logout']),

                Route::get('/users-archived', [UserController::class, 'archive']),
                Route::get('/emargements-archived', [EmargementController::class, 'archive']),
                Route::get('/filieres-archived', [FiliereController::class, 'archive']),
                Route::get('/modules-archived', [ModuleController::class, 'archive']),
                Route::get('/rapports-archived', [RapportController::class, 'archive']),
                Route::get('/enseignant-archived', [EnseignantController::class, 'archive']),

                Route::patch('/users-restored/{userId}', [UserController::class, 'restore']),
                Route::patch('/emargements-restored/{emargementId}', [EmargementController::class, 'restore']),
                Route::patch('/filieres-restored/{filiereId}', [FiliereController::class, 'restore']),
                Route::patch('/modules-restored/{moduleId}', [ModuleController::class, 'restore']),
                Route::patch('/rapports-restored/{rapportId}', [RapportController::class, 'restore']),
                Route::patch('/enseignant-restored/{enseignantId}', [EnseignantController::class, 'restore']),

            ];
        })
    ];
});
