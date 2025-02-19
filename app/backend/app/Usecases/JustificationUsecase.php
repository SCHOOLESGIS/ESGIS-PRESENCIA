<?php
namespace App\Usecases;

use App\Http\Requests\justifications\CreateJustificationRequest;
use App\Http\Requests\justifications\UpdateJustificationRequest;
use App\Interfaces\JustificationInterface;
use App\Models\Justification;
use Illuminate\Pagination\LengthAwarePaginator;

class JustificationUsecase implements JustificationInterface {
    public function getAllJustifications(): LengthAwarePaginator
    {
        return Justification::paginate(10);
    }

    public function getJustificationByID(int $justificationId): Justification
    {
        $justificationToShow = Justification::with(['absence'])->findOrFail($justificationId);
        return $justificationToShow;
    }

    public function createJustification(CreateJustificationRequest $createJustificationRequest): Justification
    {
        return Justification::create($createJustificationRequest->validated());
    }

    public function updateJustificationByID(UpdateJustificationRequest $updateJustificationRequest, Justification $justification): Justification
    {
        $justification->update($updateJustificationRequest->validated());
        return $justification;
    }

    public function deleteJustificationByID(int $justificationId): Justification
    {
        $justificationToDelete = Justification::findOrFail($justificationId);
        $justificationToReturn = $justificationToDelete;
        $justificationToDelete->delete();
        return $justificationToReturn;
    }
}
