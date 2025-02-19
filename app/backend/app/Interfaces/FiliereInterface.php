<?php

namespace App\Interfaces;

use App\Http\Requests\filieres\CreateFiliereRequest;
use App\Http\Requests\filieres\UpdateFiliereRequest;
use App\Models\Filiere;
use Illuminate\Pagination\LengthAwarePaginator;

interface FiliereInterface
{
    public function getAllFilieres () : LengthAwarePaginator;
    public function getFiliereByID (int $filiereId) : Filiere;
    public function createFiliere (CreateFiliereRequest $createFiliereRequest) : Filiere;
    public function updateFiliereByID (UpdateFiliereRequest $updateFiliereRequest, Filiere $filiere) : Filiere;
    public function deleteFiliereByID (int $filiereId) : Filiere;
}
