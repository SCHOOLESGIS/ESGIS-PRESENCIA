<?php

namespace App\Http\Controllers;

use App\Http\Requests\enseignants\CreateEnseignantRequest;
use App\Http\Requests\enseignants\UpdateEnseignantRequest;
use App\Models\Enseignant;
use App\Usecases\EnseignantUsecase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnseignantController extends Controller
{
    public function __construct(private readonly EnseignantUsecase $enseignantUsecase){}

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $collection = $this->enseignantUsecase->getAllEnseignants();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEnseignantRequest $createEnseignantRequest) : JsonResponse
    {
        $enseignantToCreate = $this->enseignantUsecase->createEnseignant($createEnseignantRequest);
        return new JsonResponse(
            $enseignantToCreate,
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $enseignantId) : JsonResponse
    {
        $enseignantToShow = $this->enseignantUsecase->getEnseignantByID($enseignantId);
        return new JsonResponse(
            $enseignantToShow,
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnseignantRequest $updateEnseignantRequest, Enseignant $enseignant)
    {
        $enseignantToUpdate = $this->enseignantUsecase->updateEnseignantByID($updateEnseignantRequest, $enseignant);
        return new JsonResponse(
            $enseignantToUpdate,
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $enseignantId)
    {
        $enseignantToDelete = $this->enseignantUsecase->deleteEnseignantByID($enseignantId);
        return new JsonResponse(
            $enseignantToDelete,
            Response::HTTP_OK
        );
    }
}
