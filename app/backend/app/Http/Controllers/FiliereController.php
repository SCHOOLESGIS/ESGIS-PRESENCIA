<?php

namespace App\Http\Controllers;

use App\Http\Requests\filieres\CreateFiliereRequest;
use App\Http\Requests\filieres\UpdateFiliereRequest;
use App\Models\Filiere;
use App\Usecases\FiliereUsecase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FiliereController extends Controller
{
    public function __construct(private readonly FiliereUsecase $filiereUsecase){}

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $collection = $this->filiereUsecase->getAllFilieres();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    public function archive() : JsonResponse
    {
        $collection = $this->filiereUsecase->getAllFilieresArchived();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    public function all() : JsonResponse
    {
        $collection = $this->filiereUsecase->getAllFilieresWithoutPaginate();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    public function allByEnseignantID(int $enseignantID) : JsonResponse
    {
        $collection = $this->filiereUsecase->getAllFilieresByEnseignantID($enseignantID);
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFiliereRequest $createFiliereRequest) : JsonResponse
    {
        $filiereToCreate = $this->filiereUsecase->createFiliere($createFiliereRequest);
        return new JsonResponse(
            $filiereToCreate,
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $filiereId) : JsonResponse
    {
        $filiereToShow = $this->filiereUsecase->getFiliereByID($filiereId);
        return new JsonResponse(
            $filiereToShow,
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFiliereRequest $updateFiliereRequest, Filiere $filiere) : JsonResponse
    {
        $filiereToUpdate = $this->filiereUsecase->updateFiliereByID($updateFiliereRequest, $filiere);
        return new JsonResponse(
            $filiereToUpdate,
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $filiereId) : JsonResponse
    {
        $filiereToDelete = $this->filiereUsecase->deleteFiliereByID($filiereId);
        return new JsonResponse(
            $filiereToDelete,
            Response::HTTP_OK
        );
    }

    public function restore(int $filiereId) : JsonResponse
    {
        $filiereToDelete = $this->filiereUsecase->restoreFiliereByID($filiereId);
        return new JsonResponse(
            $filiereToDelete,
            Response::HTTP_OK
        );
    }
}
