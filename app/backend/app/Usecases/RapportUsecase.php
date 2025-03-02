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
        return Rapport::with(['enseignant.user'])->latest()->paginate(10);
    }

    public function getAllRapportsArchived(): LengthAwarePaginator
    {
        return Rapport::onlyTrashed()->with(['enseignant.user'])->latest()->paginate(10);
    }

    public function getRapportByID(int $rapportId): Rapport
    {
        $rapportToShow = Rapport::withTrashed()->with(['enseignant.user'])->findOrFail($rapportId);
        return $rapportToShow;
    }

    public function getRapportByEnseignantID(int $enseignantId): LengthAwarePaginator
    {
        $rapportToShow = Rapport::with(['enseignant.user'])->where('enseignant_id', $enseignantId)->latest()->paginate(10);
        return $rapportToShow;
    }

    public function createRapport(CreateRapportRequest $createRapportRequest): Rapport
    {
        $rapportData = $createRapportRequest->validated();
        $rapport = new Rapport();
        $rapport->enseignant_id = $rapportData['enseignant_id'];
        $rapport->hour_number = $rapportData['hour_number'];
        $rapport->absence_number = $rapportData['absence_number'];
        $rapport->justification_number = $rapportData['justification_number'];
        $rapport->save();

        return $rapport;
    }

    public function updateRapportByID(UpdateRapportRequest $updateRapportRequest, Rapport $rapport): Rapport
    {
        $rapportData = $updateRapportRequest->validated();
        $rapport->enseignant_id = $rapportData['enseignant_id']??$rapport->enseignant_id;
        $rapport->hour_number = $rapportData['hour_number']??$rapport->hour_number;
        $rapport->absence_number = $rapportData['absence_number']??$rapport->absence_number;
        $rapport->justification_number = $rapportData['justification_number']??$rapport->justification_number;
        $rapport->save();

        return $rapport;
    }

    public function deleteRapportByID(int $rapportId): Rapport
    {
        $rapportToDelete = Rapport::findOrFail($rapportId);
        $rapportToReturn = $rapportToDelete;
        $rapportToDelete->delete();
        return $rapportToReturn;
    }

    public function restoreRapportByID(int $rapportId): Rapport
    {
        $rapportToDelete = Rapport::withTrashed()->findOrFail($rapportId);
        $rapportToReturn = $rapportToDelete;
        $rapportToDelete->restore();
        return $rapportToReturn;
    }
}
