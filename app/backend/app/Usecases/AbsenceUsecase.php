<?php

use App\Http\Requests\absences\CreateAbsenceRequest;
use App\Http\Requests\absences\UpdateAbsenceRequest;
use App\Interfaces\AbsenceInterface;
use App\Models\Absence;
use Illuminate\Pagination\LengthAwarePaginator;

class AbsenceUsecase implements AbsenceInterface {
    public function getAllAbsences(): LengthAwarePaginator
    {
        return Absence::paginate(10);
    }

    public function getAbsenceByID(Absence $absence): Absence
    {
        return $absence;
    }

    public function createAbsence(CreateAbsenceRequest $createAbsenceRequest): Absence
    {
        return Absence::create($createAbsenceRequest->validated());
    }

    public function updateAbsenceByID(UpdateAbsenceRequest $updateAbsenceRequest, Absence $absence): Absence
    {
        $absence->update($updateAbsenceRequest->validated());
        return $absence;
    }

    public function deleteAbsenceByID(Absence $absence): Absence
    {
        $absence->delete();
        return $absence;
    }
}
