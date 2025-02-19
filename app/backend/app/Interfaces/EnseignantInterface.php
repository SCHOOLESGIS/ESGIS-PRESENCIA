<?php

namespace App\Interfaces;

use App\Http\Requests\enseignants\CreateEnseignantRequest;
use App\Http\Requests\enseignants\UpdateEnseignantRequest;
use App\Models\Enseignant;
use Illuminate\Pagination\LengthAwarePaginator;

interface EnseignantInterface
{
    public function getAllEnseignants () : LengthAwarePaginator;
    public function getEnseignantByID (int $enseignantId) : Enseignant;
    public function createEnseignant (CreateEnseignantRequest $createEnseignantRequest) : Enseignant;
    public function updateEnseignantByID (UpdateEnseignantRequest $updateEnseignantRequest, Enseignant $enseignant) : Enseignant;
    public function deleteEnseignantByID (int $enseignantId) : Enseignant;
}
