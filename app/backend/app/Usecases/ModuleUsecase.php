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
        $moduleData = $createModuleRequest->validated();
        $module = new Module();
        $module->module_name = $moduleData['module_name'];
        $module->module_code = $moduleData['module_code'];
        $module->description = $moduleData['description'];
        $module->filiere_id = $moduleData['filiere_id'];
        $module->save();

        return $module;
    }

    public function updateModuleByID(UpdateModuleRequest $updateModuleRequest, Module $module): Module
    {
        $moduleData = $updateModuleRequest->validated();
        $module->module_name = $moduleData['module_name']??$module->module_name;
        $module->module_code = $moduleData['module_code']??$module->module_code;
        $module->description = $moduleData['description']??$module->description;
        $module->filiere_id = $moduleData['filiere_id']??$module->filiere_id;
        $module->save();

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
