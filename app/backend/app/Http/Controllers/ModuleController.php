<?php

namespace App\Http\Controllers;

use App\Http\Requests\modules\CreateModuleRequest;
use App\Http\Requests\modules\UpdateModuleRequest;
use App\Models\Module;
use App\Usecases\ModuleUsecase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModuleController extends Controller
{
    public function __construct(private readonly ModuleUsecase $moduleUsecase){}

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $collection = $this->moduleUsecase->getAllModules();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    public function all() : JsonResponse
    {
        $collection = $this->moduleUsecase->getAllModulesWithoutPagination();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    public function archive() : JsonResponse
    {
        $collection = $this->moduleUsecase->getAllModulesArchived();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateModuleRequest $createModuleRequest) : JsonResponse
    {
        $moduleToCreate = $this->moduleUsecase->createModule($createModuleRequest);
        return new JsonResponse(
            $moduleToCreate,
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $moduleId) : JsonResponse
    {
        $moduleToShow = $this->moduleUsecase->getModuleByID($moduleId);
        return new JsonResponse(
            $moduleToShow,
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModuleRequest $updateModuleRequest, Module $module) : JsonResponse
    {
        $moduleToUpdate = $this->moduleUsecase->updateModuleByID($updateModuleRequest, $module);
        return new JsonResponse(
            $moduleToUpdate,
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $moduleId) : JsonResponse
    {
        $moduleToDelete = $this->moduleUsecase->deleteModuleByID($moduleId);
        return new JsonResponse(
            $moduleToDelete,
            Response::HTTP_OK
        );
    }

    public function restore(int $moduleId) : JsonResponse
    {
        $moduleToDelete = $this->moduleUsecase->restoreModuleByID($moduleId);
        return new JsonResponse(
            $moduleToDelete,
            Response::HTTP_OK
        );
    }
}
