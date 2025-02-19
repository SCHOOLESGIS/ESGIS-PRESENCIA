<?php

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

    public function getEmargementByID(Emargement $emargement): Emargement
    {
        return $emargement;
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

    public function deleteEmargementByID(Emargement $emargement): Emargement
    {
        $emargement->delete();
        return $emargement;
    }
}
