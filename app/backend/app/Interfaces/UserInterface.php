<?php

namespace App\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface UserInterface
{
    public function getAllUsers () : LengthAwarePaginator;
    public function getUserByID (int $absenceId) : Absence;
    public function createUser (CreateAbsenceRequest $createAbsenceRequest) : Absence;
    public function updateAbsenceByID (UpdateAbsenceRequest $updateAbsenceRequest, Absence $absence) : Absence;
    public function deleteAbsenceByID (int $absenceId) : Absence;
}
