<?php
namespace App\Usecases;

use App\Http\Requests\filieres\CreateFiliereRequest;
use App\Http\Requests\filieres\UpdateFiliereRequest;
use App\Interfaces\FiliereInterface;
use App\Models\Filiere;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class FiliereUsecase implements FiliereInterface{
    public function getAllFilieres(): LengthAwarePaginator
    {
        return Filiere::with(['modules'])->latest()->paginate(10);
    }

    public function getAllFilieresByEnseignantID(int $enseignantID): LengthAwarePaginator
    {
        return Filiere::join("modules", "filieres.filiere_id", "modules.module_id")->join("emargements", "emargements.module_id", "modules.module_id")->join("enseignants", "enseignants.enseignant_id", "emargements.enseignant_id")->where("enseignants.enseignant_id", $enseignantID)->select("filieres.filiere_id", "filieres.filiere_name", "filieres.filiere_level", "filieres.created_at")->groupBy("filieres.filiere_id", "filieres.filiere_name", "filieres.filiere_level", "filieres.created_at")->paginate(10);
    }

    public function getAllFilieresArchived(): LengthAwarePaginator
    {
        return Filiere::onlyTrashed()->with(['modules'])->latest()->paginate(10);
    }

    public function getAllFilieresWithoutPaginate(): Collection
    {
        return Filiere::all();
    }

    public function getFiliereByID(int $filiereId): Filiere
    {
        $filiereToShow = Filiere::withTrashed()->with(['modules'])->findOrFail($filiereId);
        return $filiereToShow;
    }

    public function createFiliere(CreateFiliereRequest $createFiliereRequest): Filiere
    {
        $filiereData = $createFiliereRequest->validated();
        $filiere = new Filiere();
        $filiere->filiere_name = $filiereData['filiere_name'];
        $filiere->filiere_level = $filiereData['filiere_level'];
        $filiere->save();

        return $filiere;
    }

    public function updateFiliereByID(UpdateFiliereRequest $updateFiliereRequest, Filiere $filiere): Filiere
    {
        $filiereData = $updateFiliereRequest->validated();
        $filiere->filiere_name = $filiereData['filiere_name']??$filiere->filiere_name;
        $filiere->filiere_level = $filiereData['filiere_level']??$filiere->filiere_level;
        $filiere->save();

        return $filiere;
    }

    public function deleteFiliereByID(int $filiereId): Filiere
    {
        $filiereToDelete = Filiere::findOrFail($filiereId);
        $filiereToReturn = $filiereToDelete;
        $filiereToDelete->delete();
        return $filiereToReturn;
    }

    public function restoreFiliereByID(int $filiereId): Filiere
    {
        $filiereToDelete = Filiere::withTrashed()->findOrFail($filiereId);
        $filiereToReturn = $filiereToDelete;
        $filiereToDelete->restore();
        return $filiereToReturn;
    }
}
