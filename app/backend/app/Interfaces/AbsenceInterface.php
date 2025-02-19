<?php

namespace App\Interfaces;

use App\Http\Requests\absences\CreateAbsenceRequest;
use App\Http\Requests\absences\UpdateAbsenceRequest;
use App\Models\Absence;
use Illuminate\Pagination\LengthAwarePaginator;

interface AbsenceInterface
{
    public function getAllAbsences () : LengthAwarePaginator;
    public function getAbsenceByID (Absence $absence) : Absence;
    public function createAbsence (CreateAbsenceRequest $createAbsenceRequest) : Absence;
    public function updateAbsenceByID (UpdateAbsenceRequest $updateAbsenceRequest, Absence $absence) : Absence;
    public function deleteAbsenceByID (Absence $absence) : Absence;
}
