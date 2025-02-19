<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenceController;
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
        Route::apiResource('users', UserController::class),
        Route::apiResource('absences', AbsenceController::class),
        Route::apiResource('cours', CourController::class),
        Route::apiResource('emargements', EmargementController::class),
        Route::apiResource('enseignants', EnseignantController::class),
        Route::apiResource('filieres', FiliereController::class),
        Route::apiResource('justifications', JustificationController::class),
        Route::apiResource('modules', ModuleController::class),
        Route::apiResource('rapports', RapportController::class)
    ];
});
