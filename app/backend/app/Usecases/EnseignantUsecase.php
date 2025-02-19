<?php

use App\Http\Requests\enseignants\CreateEnseignantRequest;
use App\Http\Requests\enseignants\UpdateEnseignantRequest;
use App\Interfaces\EnseignantInterface;
use App\Models\Enseignant;
use Illuminate\Pagination\LengthAwarePaginator;

class EnseignantUsecase implements EnseignantInterface{
    public function getAllEnseignants(): LengthAwarePaginator
    {
        return Enseignant::paginate(10);
    }

    public function getEnseignantByID(Enseignant $enseignant): Enseignant
    {
        return $enseignant;
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

    public function deleteEnseignantByID(Enseignant $enseignant): Enseignant
    {
        $enseignant->delete();
        return $enseignant;
    }
}
