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
        return Emargement::create($createEmargementRequest->validated());
    }

    public function updateEmargementByID(UpdateEmargementRequest $updateEmargementRequest, Emargement $emargement): Emargement
    {
        $emargement->update($updateEmargementRequest->validated());
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
