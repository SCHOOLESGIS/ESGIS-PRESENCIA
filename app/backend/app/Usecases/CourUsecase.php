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
        return Cour::withTrashed()->with(['emargement', 'enseignant', 'module', 'filiere'])->latest()->paginate(10);
    }

    public function getCourByID(int $courId): Cour
    {
        $courToShow = Cour::withTrashed()->with(['emargement', 'enseignant', 'module'])->findOrFail($courId);
        return $courToShow;
    }

    public function createCour(CreateCourRequest $createCourRequest): Cour
    {
        $courData = $createCourRequest->validated();
        $cour = new Cour();
        $cour->module_id = $courData['module_id'];
        $cour->enseignant_id = $courData['enseignant_id'];
        $cour->filiere_id = $courData['filiere_id'];
        $cour->cour_date = $courData['cour_date'];
        $cour->begin_hour = $courData['begin_hour'];
        $cour->end_hour = $courData['end_hour'];
        $cour->save();

        return $cour;
    }

    public function updateCourByID(UpdateCourRequest $updateCourRequest, Cour $cour): Cour
    {
        $courData = $updateCourRequest->validated();
        $cour->module_id = $courData['module_id'];
        $cour->enseignant_id = $courData['enseignant_id'];
        $cour->filiere_id = $courData['filiere_id'];
        $cour->cour_date = $courData['cour_date'];
        $cour->begin_hour = $courData['begin_hour'];
        $cour->end_hour = $courData['end_hour'];
        $cour->status = $courData['status'];
        $cour->save();

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
