<?php
namespace App\Usecases;

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

    public function getModuleByID(int $moduleId): Module
    {
        $moduleToShow = Module::with(['filiere', 'cours'])->findOrFail($moduleId);
        return $moduleToShow;
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

    public function deleteModuleByID(int $moduleId): Module
    {
        $moduleToDelete = Module::findOrFail($moduleId);
        $moduleToReturn = $moduleToDelete;
        $moduleToDelete->delete();
        return $moduleToReturn;
    }
}
