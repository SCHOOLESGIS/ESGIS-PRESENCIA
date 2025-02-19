<?php

use App\Http\Requests\modules\CreateModuleRequest;
use App\Http\Requests\modules\UpdateModuleRequest;
use App\Interfaces\ModuleInterface;
use App\Models\Module;
use Illuminate\Pagination\LengthAwarePaginator;

class ModuleUsecase implements ModuleInterface {
    public function getAllModules(): LengthAwarePaginator
    {
        return Module::paginate(10);
    }

    public function getModuleByID(Module $module): Module
    {
        return $module;
    }

    public function createModule(CreateModuleRequest $createModuleRequest): Module
    {
        return Module::create($createModuleRequest->validated());
    }

    public function updateModuleByID(UpdateModuleRequest $updateModuleRequest, Module $module): Module
    {
        $module->update($updateModuleRequest->validated());
        return $module;
    }

    public function deleteModuleByID(Module $module): Module
    {
        $module->delete();
        return $module;
    }
}
