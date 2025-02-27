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
        return Absence::with(['justification', 'enseignant.user', 'cour'])->latest()->paginate(10);
    }

    public function getAbsenceByID(int $absenceId): Absence
    {
        $absenceToShow = Absence::with(['justification', 'enseignant', 'cour'])->findOrFail($absenceId);
        return $absenceToShow;
    }

    public function createAbsence(CreateAbsenceRequest $createAbsenceRequest): Absence
    {
        $absenceData = $createAbsenceRequest->validated();
        $absence = new Absence();
        $absence->cour_id = $absenceData['cour_id'];
        $absence->absence_date = $absenceData['absence_date'];
        $absence->save();

        return $absence;
    }

    public function updateAbsenceByID(UpdateAbsenceRequest $updateAbsenceRequest, Absence $absence): Absence
    {
        $absenceData = $updateAbsenceRequest->validated();
        $absence->enseignant_id = $absenceData['cour_id']??$absence->cour_id;
        $absence->module_id = $absenceData['module_id']??$absence->module_id;
        $absence->status = $absenceData['status']??$absence->status;
        $absence->save();

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
