<?php

namespace App\Http\Controllers;

use App\Http\Requests\absences\CreateAbsenceRequest;
use App\Http\Requests\absences\UpdateAbsenceRequest;
use App\Models\Absence;
use App\Usecases\AbsenceUsecase;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AbsenceController extends Controller
{
    public function __construct(private readonly AbsenceUsecase $absenceUsecase) {}

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $collection = $this->absenceUsecase->getAllAbsences();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAbsenceRequest $createAbsenceRequest) : JsonResponse
    {
        $absenceToCreate = $this->absenceUsecase->createAbsence($createAbsenceRequest);
        return new JsonResponse(
            $absenceToCreate,
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $absenceId) : JsonResponse
    {
        $absenceToShow = $this->absenceUsecase->getAbsenceByID($absenceId);
        return new JsonResponse(
            $absenceToShow,
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsenceRequest $updateAbsenceRequest, Absence $absence) : JsonResponse
    {
        $absenceToUpdate = $this->absenceUsecase->updateAbsenceByID($updateAbsenceRequest, $absence);
        return new JsonResponse(
            $absenceToUpdate,
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $absenceId) : JsonResponse
    {
        $absenceToDestroy = $this->absenceUsecase->deleteAbsenceByID($absenceId);
        return new JsonResponse(
            $absenceToDestroy,
            Response::HTTP_OK
        );
    }
}
