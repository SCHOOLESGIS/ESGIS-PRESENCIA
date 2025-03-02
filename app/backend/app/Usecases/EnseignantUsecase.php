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
        return Enseignant::with(['emargements.module.filiere', 'emargements.enseignant.user', 'rapports', 'user'])->join('users', 'users.user_id', '=', 'enseignants.user_id')->where('role', 'enseignant')->paginate(10);
    }

    public function getAllEnseignantsArchived(): LengthAwarePaginator
    {
        return Enseignant::onlyTrashed()->with(['emargements.module.filiere', 'emargements.enseignant.user', 'rapports', 'user'])->join('users', 'users.user_id', '=', 'enseignants.user_id')->where('role', 'enseignant')->paginate(10);
    }

    public function getEnseignantByID(int $enseignantId): Enseignant
    {
        $enseignantToShow = Enseignant::withTrashed()->with(['emargements.module.filiere', 'emargements.enseignant.user', 'rapports', 'user'])->findOrFail($enseignantId);
        return $enseignantToShow;
    }

    public function createEnseignant(CreateEnseignantRequest $createEnseignantRequest): Enseignant
    {
        $enseignantData = $createEnseignantRequest->validated();
        $enseignant = new Enseignant();
        $enseignant->user_id = $enseignantData['user_id'];
        $enseignant->speciality = $enseignantData['speciality'];
        $enseignant->save();

        return $enseignant;
    }

    public function updateEnseignantByID(UpdateEnseignantRequest $updateEnseignantRequest, Enseignant $enseignant): Enseignant
    {
        $enseignantData = $updateEnseignantRequest->validated();
        $enseignant->user_id = $enseignantData['user_id']??$enseignant->user_id;
        $enseignant->speciality = $enseignantData['speciality']??$enseignant->speciality;
        $enseignant->save();

        return $enseignant;
    }

    public function deleteEnseignantByID(int $enseignantId): Enseignant
    {
        $enseignantToDelete = Enseignant::findOrFail($enseignantId);
        $enseignantToReturn = $enseignantToDelete;
        $enseignantToDelete->delete();
        return $enseignantToReturn;
    }

    public function restoreEnseignantByID(int $enseignantId): Enseignant
    {
        $enseignantToDelete = Enseignant::withTrashed()->findOrFail($enseignantId);
        $enseignantToReturn = $enseignantToDelete;
        $enseignantToDelete->restore();
        return $enseignantToReturn;
    }
}
