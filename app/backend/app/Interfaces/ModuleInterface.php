<?php

namespace App\Interfaces;

use App\Http\Requests\modules\CreateModuleRequest;
use App\Http\Requests\modules\UpdateModuleRequest;
use App\Models\Module;
use Illuminate\Pagination\LengthAwarePaginator;

interface ModuleInterface
{
    public function getAllModules () : LengthAwarePaginator;
    public function getModuleByID (int $moduleId) : Module;
    public function createModule (CreateModuleRequest $createModuleRequest) : Module;
    public function updateModuleByID (UpdateModuleRequest $updateModuleRequest, Module $module) : Module;
    public function deleteModuleByID (int $moduleId) : Module;
}
