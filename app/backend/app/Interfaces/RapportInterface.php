<?php

namespace App\Interfaces;

use App\Http\Requests\rapports\CreateRapportRequest;
use App\Http\Requests\rapports\UpdateRapportRequest;
use App\Models\Rapport;
use Illuminate\Pagination\LengthAwarePaginator;

interface RapportInterface
{
    public function getAllRapports () : LengthAwarePaginator;
    public function getRapportByID (Rapport $rapport) : Rapport;
    public function createRapport (CreateRapportRequest $createRapportRequest) : Rapport;
    public function updateRapportByID (UpdateRapportRequest $updateRapportRequest, Rapport $rapport) : Rapport;
    public function deleteRapportByID (Rapport $rapport) : Rapport;
}
