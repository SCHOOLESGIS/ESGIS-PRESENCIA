<?php

namespace App\Interfaces;

use App\Http\Requests\cours\CreateCourRequest;
use App\Http\Requests\cours\UpdateCourRequest;
use App\Models\Cour;
use Illuminate\Pagination\LengthAwarePaginator;

interface CourInterface
{
    public function getAllCours () : LengthAwarePaginator;
    public function getCourByID (int $courId) : Cour;
    public function createCour (CreateCourRequest $createCourRequest) : Cour;
    public function updateCourByID (UpdateCourRequest $updateCourRequest, COur $Cour) : Cour;
    public function deleteCourByID (int $courId) : Cour;
}
