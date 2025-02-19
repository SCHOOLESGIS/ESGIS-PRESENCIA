<?php

namespace App\Http\Controllers;

use App\Http\Requests\cours\CreateCourRequest;
use App\Http\Requests\cours\UpdateCourRequest;
use App\Models\Cour;
use App\Usecases\CourUsecase;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CourController extends Controller
{
    public function __construct(private readonly CourUsecase $courUsecase) {}

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $collection = $this->courUsecase->getAllCours();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCourRequest $createCourRequest) : JsonResponse
    {
        $courToCreate = $this->courUsecase->createCour($createCourRequest);
        return new JsonResponse(
            $courToCreate,
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $courId)
    {
        $courToShow = $this->courUsecase->getCourByID($courId);
        return new JsonResponse(
            $courToShow,
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourRequest $updateCourRequest, Cour $cour)
    {
        $courToUpdate = $this->courUsecase->updateCourByID($updateCourRequest, $cour);
        return new JsonResponse(
            $courToUpdate,
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $courId)
    {
        $courTodelete = $this->courUsecase->deleteCourByID($courId);
        return new JsonResponse(
            $courTodelete,
            Response::HTTP_OK
        );
    }
}
