<?php

namespace App\Interfaces;

use App\Http\Requests\justifications\CreateJustificationRequest;
use App\Http\Requests\justifications\UpdateJustificationRequest;
use App\Models\Justification;
use Illuminate\Pagination\LengthAwarePaginator;

interface JustificationInterface
{
    public function getAllJustifications () : LengthAwarePaginator;
    public function getJustificationByID (int $justificationId) : Justification;
    public function createJustification (CreateJustificationRequest $createJustificationRequest) : Justification;
    public function updateJustificationByID (UpdateJustificationRequest $updateJustificationRequest, Justification $justification) : Justification;
    public function deleteJustificationByID (int $justificationId) : Justification;
}
