<?php

namespace App\Http\Controllers;

use App\Http\Requests\justifications\CreateJustificationRequest;
use App\Http\Requests\justifications\UpdateJustificationRequest;
use App\Models\Justification;
use App\Usecases\JustificationUsecase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JustificationController extends Controller
{
    public function __construct(private readonly JustificationUsecase $justificationUsecase){}

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $collection = $this->justificationUsecase->getAllJustifications();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateJustificationRequest $createJustificationRequest) : JsonResponse
    {
        $justificationToCreate = $this->justificationUsecase->createJustification($createJustificationRequest);
        return new JsonResponse(
            $justificationToCreate,
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $justificationId) : JsonResponse
    {
        $justificationToShow = $this->justificationUsecase->getJustificationByID($justificationId);
        return new JsonResponse(
            $justificationToShow,
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJustificationRequest $updateJustificationRequest, Justification $justification) : JsonResponse
    {
        $justificationToUpdate = $this->justificationUsecase->updateJustificationByID($updateJustificationRequest, $justification);
        return new JsonResponse(
            $justificationToUpdate,
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $justificationId) : JsonResponse
    {
        $justificationToDelete = $this->justificationUsecase->deleteJustificationByID($justificationId);
        return new JsonResponse(
            $justificationToDelete,
            Response::HTTP_OK
        );
    }
}
