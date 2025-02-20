<?php
namespace App\Usecases;

use App\Http\Requests\enseignants\CreateEnseignantRequest;
use App\Http\Requests\enseignants\UpdateEnseignantRequest;
use App\Interfaces\EnseignantInterface;
use App\Models\Enseignant;
use Illuminate\Pagination\LengthAwarePaginator;

class EnseignantUsecase implements EnseignantInterface{
    public function getAllEnseignants(): LengthAwarePaginator
    {
        return Enseignant::with(['emargements', 'absences', 'cours', 'rapports', 'user'])->paginate(10);
    }

    public function getEnseignantByID(int $enseignantId): Enseignant
    {
        $enseignantToShow = Enseignant::with(['emargements', 'absences', 'cours.module', 'rapports'])->findOrFail($enseignantId);
        return $enseignantToShow;
    }

    public function createEnseignant(CreateEnseignantRequest $createEnseignantRequest): Enseignant
    {
        return Enseignant::create($createEnseignantRequest->validated());
    }

    public function updateEnseignantByID(UpdateEnseignantRequest $updateEnseignantRequest, Enseignant $enseignant): Enseignant
    {
        $enseignant->update($updateEnseignantRequest->validated());
        return $enseignant;
    }

    public function deleteEnseignantByID(int $enseignantId): Enseignant
    {
        $enseignantToDelete = Enseignant::findOrFail($enseignantId);
        $enseignantToReturn = $enseignantToDelete;
        $enseignantToDelete->delete();
        return $enseignantToReturn;
    }
}
