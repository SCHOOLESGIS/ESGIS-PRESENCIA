<?php

namespace App\Interfaces;

use App\Http\Requests\emargements\CreateEmargementRequest;
use App\Http\Requests\emargements\UpdateEmargementRequest;
use App\Models\Emargement;
use Illuminate\Pagination\LengthAwarePaginator;

interface EmargementInterface
{
    public function getAllEmargements () : LengthAwarePaginator;
    public function getEmargementByID (Emargement $emargement) : Emargement;
    public function createEmargement (CreateEmargementRequest $createEmargementRequest) : Emargement;
    public function updateEmargementByID (UpdateEmargementRequest $updateEmargementRequest, Emargement $absence) : Emargement;
    public function deleteEmargementByID (Emargement $absence) : Emargement;
}
