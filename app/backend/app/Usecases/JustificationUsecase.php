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
        return Justification::latest()->paginate(10);
    }

    public function getJustificationByID(int $justificationId): Justification
    {
        $justificationToShow = Justification::with(['absence'])->findOrFail($justificationId);
        return $justificationToShow;
    }

    public function createJustification(CreateJustificationRequest $createJustificationRequest): Justification
    {
        $justificationData = $createJustificationRequest->validated();
        $justification = new Justification();
        $justification->absence_id = $justificationData['absence_id'];
        $justification->type = $justificationData['type'];
        $justification->doc = $justificationData['doc'];
        $justification->save();

        return $justification;
    }

    public function updateJustificationByID(UpdateJustificationRequest $updateJustificationRequest, Justification $justification): Justification
    {
        $justificationData = $updateJustificationRequest->validated();
        $justification->absence_id = $justificationData['absence_id']??$justification->absence_id;
        $justification->type = $justificationData['type']??$justification->type;
        $justification->doc = $justificationData['doc']??$justification->doc;
        $justification->save();

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
