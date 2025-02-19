<?php

namespace App\Http\Controllers;

use App\Http\Requests\rapports\CreateRapportRequest;
use App\Http\Requests\rapports\UpdateRapportRequest;
use App\Models\Rapport;
use App\Usecases\RapportUsecase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RapportController extends Controller
{
    public function __construct(private readonly RapportUsecase $rapportUsecase){}

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $collection = $this->rapportUsecase->getAllRapports();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRapportRequest $createRapportRequest) : JsonResponse
    {
        $rapportToCreate = $this->rapportUsecase->createRapport($createRapportRequest);
        return new JsonResponse(
            $rapportToCreate,
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $rapportId) : JsonResponse
    {
        $rapportToShow = $this->rapportUsecase->getRapportByID($rapportId);
        return new JsonResponse(
            $rapportToShow,
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRapportRequest $updateRapportRequest, Rapport $rapport) : JsonResponse
    {
        $rapportToUpdate = $this->rapportUsecase->updateRapportByID($updateRapportRequest, $rapport);
        return new JsonResponse(
            $rapportToUpdate,
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $rapportId) : JsonResponse
    {
        $rapportToDelete = $this->rapportUsecase->deleteRapportByID($rapportId);
        return new JsonResponse(
            $rapportToDelete,
            Response::HTTP_OK
        );
    }
}
