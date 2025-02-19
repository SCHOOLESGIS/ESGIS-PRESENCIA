<?php
namespace App\Usecases;

use App\Http\Requests\cours\CreateCourRequest;
use App\Http\Requests\cours\UpdateCourRequest;
use App\Interfaces\CourInterface;
use App\Models\Cour;
use Illuminate\Pagination\LengthAwarePaginator;

class CourUsecase implements CourInterface {
    public function getAllCours(): LengthAwarePaginator
    {
        return Cour::paginate(10);
    }

    public function getCourByID(int $courId): Cour
    {
        $courToShow = Cour::with(['emargement', 'enseignant', 'module'])->findOrFail($courId);
        return $courToShow;
    }

    public function createCour(CreateCourRequest $createCourRequest): Cour
    {
        return Cour::create($createCourRequest->validated());
    }

    public function updateCourByID(UpdateCourRequest $updateCourRequest, Cour $cour): Cour
    {
        $cour->update($updateCourRequest->validated());
        return $cour;
    }

    public function deleteCourByID(int $courId): Cour
    {
        $courToDelete = Cour::findOrFail($courId);
        $courToReturn = $courToDelete;
        $courToDelete->delete();
        return $courToReturn;
    }
}
