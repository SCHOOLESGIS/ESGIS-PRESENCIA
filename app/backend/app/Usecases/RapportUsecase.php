<?php
namespace App\Usecases;

use App\Http\Requests\rapports\CreateRapportRequest;
use App\Http\Requests\rapports\UpdateRapportRequest;
use App\Interfaces\RapportInterface;
use App\Models\Emargement;
use App\Models\Rapport;
use Illuminate\Database\Eloquent\Collection;
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

    public function generateRapport(int $enseignantId): Rapport
    {
        $statsBegin = 0;
        $statsEnd = 0;
        $statsConfirm = 0;
        $statsNotConfirm = 0;

        $allEmargement = Emargement::where('enseignant_id', $enseignantId)->get()->groupBy('module_id');

        foreach ($allEmargement as $module => $emargements) {
            if (isset($emargements[0])) {
                if ($emargements[0]->begin_hour !== null) {
                    $statsBegin++;
                }

                if ($emargements[0]->end_hour !== null) {
                    $statsEnd++;
                }

                if ($emargements[0]->status === "COCHE") {
                    $statsConfirm++;
                } else {
                    $statsNotConfirm++;
                }
            }
        }

        dd($statsBegin);

        $rapport = new Rapport();
        $rapport->enseignant_id = $enseignantId;
        $rapport->emargement_debut = $statsBegin;
        $rapport->emargement_fin = $statsEnd;
        $rapport->emargement_confirm = $statsConfirm;
        $rapport->emargement_not_confirm = $statsNotConfirm;
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
