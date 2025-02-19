<?php
namespace App\Usecases;

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

    public function getRapportByID(int $rapportId): Rapport
    {
        $rapportToShow = Rapport::with(['enseignant'])->findOrFail($rapportId);
        return $rapportToShow;
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

    public function deleteRapportByID(int $rapportId): Rapport
    {
        $rapportToDelete = Rapport::findOrFail($rapportId);
        $rapportToReturn = $rapportToDelete;
        $rapportToDelete->delete();
        return $rapportToReturn;
    }
}
