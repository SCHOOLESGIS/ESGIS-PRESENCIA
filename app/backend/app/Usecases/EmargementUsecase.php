<?php
namespace App\Usecases;

use App\Http\Requests\emargements\CreateEmargementRequest;
use App\Http\Requests\emargements\UpdateEmargementRequest;
use App\Interfaces\EmargementInterface;
use App\Models\Emargement;
use Illuminate\Pagination\LengthAwarePaginator;

class EmargementUsecase implements EmargementInterface {
    public function getAllEmargements(): LengthAwarePaginator
    {
        return Emargement::paginate(10);
    }

    public function getEmargementByID(int $emargementId): Emargement
    {
        $emargementToShow = Emargement::with(['cour', 'enseignant'])->findOrFail($emargementId);
        return $emargementToShow;
    }

    public function createEmargement(CreateEmargementRequest $createEmargementRequest): Emargement
    {
        $emargementData = $createEmargementRequest->validated();
        $emargement = new Emargement();
        $emargement->enseignant_id =  $emargementData['enseignant_id'];
        $emargement->cour_id =  $emargementData['cour_id'];
        $emargement->begin_hour =  $emargementData['begin_hour'];
        $emargement->end_hour =  $emargementData['end_hour'];
        $emargement->status =  $emargementData['status'];
        $emargement->save();

        return $emargement;
    }

    public function updateEmargementByID(UpdateEmargementRequest $updateEmargementRequest, Emargement $emargement): Emargement
    {
        $emargementData = $updateEmargementRequest->validated();
        $emargement->enseignant_id =  $emargementData['enseignant_id']??$emargement->enseignant_id;
        $emargement->cour_id =  $emargementData['cour_id']??$emargement->cour_id;
        $emargement->begin_hour =  $emargementData['begin_hour']??$emargement->begin_hour;
        $emargement->end_hour =  $emargementData['end_hour']??$emargement->end_hour;
        $emargement->status =  $emargementData['status']??$emargement->status;
        $emargement->save();

        return $emargement;
    }

    public function deleteEmargementByID(int $emargementId): Emargement
    {
        $emargementToDelete = Emargement::findOrFail($emargementId);
        $emargementToReturn = $emargementToDelete;
        $emargementToDelete->delete();
        return $emargementToReturn;
    }
}
