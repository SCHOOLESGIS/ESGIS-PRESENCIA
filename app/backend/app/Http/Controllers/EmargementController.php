<?php

namespace App\Http\Controllers;

use App\Http\Requests\emargements\CreateEmargementRequest;
use App\Http\Requests\emargements\UpdateEmargementRequest;
use App\Models\Emargement;
use App\Usecases\EmargementUsecase;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class EmargementController extends Controller
{
    public function __construct(private readonly EmargementUsecase $emargementUsecase){}

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $collection = $this->emargementUsecase->getAllEmargements();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmargementRequest $createEmargementRequest) : JsonResponse
    {
        $emargementToCreate = $this->emargementUsecase->createEmargement($createEmargementRequest);
        return new JsonResponse(
            $emargementToCreate,
            Response::HTTP_OK
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $emargementId)
    {
        $emargementToShow = $this->emargementUsecase->getEmargementByID($emargementId);
        return new JsonResponse(
            $emargementToShow,
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmargementRequest $updateEmargementRequest, Emargement $emargement)
    {
        $emargementToUpdate = $this->emargementUsecase->updateEmargementByID($updateEmargementRequest, $emargement);
        return new JsonResponse(
            $emargementToUpdate,
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $emargementId)
    {
        $emargementToDelete = $this->emargementUsecase->deleteEmargementByID($emargementId);
        return new JsonResponse(
            $emargementToDelete,
            Response::HTTP_OK
        );
    }
}
