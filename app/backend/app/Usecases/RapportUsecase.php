<?php

use App\Http\Requests\rapports\CreateRapportRequest;
use App\Http\Requests\rapports\UpdateRapportRequest;
use App\Interfaces\RapportInterface;
use App\Models\Rapport;
use Illuminate\Pagination\LengthAwarePaginator;

class RapportUsecase implements RapportInterface{
    public function getAllRapports(): LengthAwarePaginator
    {
        return Rapport::paginate(10);
    }

    public function getRapportByID(Rapport $rapport): Rapport
    {
        return $rapport;
    }

    public function createRapport(CreateRapportRequest $createRapportRequest): Rapport
    {
        return Rapport::create($createRapportRequest->validated());
    }

    public function updateRapportByID(UpdateRapportRequest $updateRapportRequest, Rapport $rapport): Rapport
    {
        $rapport->update($updateRapportRequest->validated());
        return $rapport;
    }

    public function deleteRapportByID(Rapport $rapport): Rapport
    {
        $rapport->delete();
        return $rapport;
    }
}
