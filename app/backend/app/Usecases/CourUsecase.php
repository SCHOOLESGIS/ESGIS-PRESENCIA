<?php

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

    public function getCourByID(Cour $cour): Cour
    {
        return $cour;
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

    public function deleteCourByID(Cour $cour): Cour
    {
        $cour->delete();
        return $cour;
    }
}
