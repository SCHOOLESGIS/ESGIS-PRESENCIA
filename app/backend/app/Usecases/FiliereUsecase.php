<?php

use App\Http\Requests\filieres\CreateFiliereRequest;
use App\Http\Requests\filieres\UpdateFiliereRequest;
use App\Interfaces\FiliereInterface;
use App\Models\Filiere;
use Illuminate\Pagination\LengthAwarePaginator;

class FiliererUsecase implements FiliereInterface{
    public function getAllFilieres(): LengthAwarePaginator
    {
        return Filiere::paginate(10);
    }

    public function getFiliereByID(Filiere $filiere): Filiere
    {
        return $filiere;
    }

    public function createFiliere(CreateFiliereRequest $createFiliereRequest): Filiere
    {
        return Filiere::create($createFiliereRequest->validated());
    }

    public function updateFiliereByID(UpdateFiliereRequest $updateFiliereRequest, Filiere $filiere): Filiere
    {
        $filiere->update($updateFiliereRequest->validated());
        return $filiere;
    }

    public function deleteFiliereByID(Filiere $filiere): Filiere
    {
        $filiere->delete();
        return $filiere;
    }
}
