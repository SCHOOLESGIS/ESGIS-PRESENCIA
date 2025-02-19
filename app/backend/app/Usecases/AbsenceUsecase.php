<?php
namespace App\Usecases;

use App\Http\Requests\absences\CreateAbsenceRequest;
use App\Http\Requests\absences\UpdateAbsenceRequest;
use App\Interfaces\AbsenceInterface;
use App\Models\Absence;
use Illuminate\Pagination\LengthAwarePaginator;

class AbsenceUsecase implements AbsenceInterface {
    public function getAllAbsences(): LengthAwarePaginator
    {
        return Absence::with(['justification', 'enseignant', 'cour'])->paginate(10);
    }

    public function getAbsenceByID(int $absenceId): Absence
    {
        $absenceToShow = Absence::with(['justification', 'enseignant', 'cour'])->findOrFail($absenceId);
        return $absenceToShow;
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

    public function deleteAbsenceByID(int $absenceId): Absence
    {
        $absenceToDelete = Absence::findOrFail($absenceId);
        $absenceToReturn = $absenceToDelete;
        $absenceToDelete->delete();
        return $absenceToReturn;
    }
}
