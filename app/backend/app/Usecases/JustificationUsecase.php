<?php

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

    public function getJustificationByID(Justification $justification): Justification
    {
        return $justification;
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

    public function deleteJustificationByID(Justification $justification): Justification
    {
        $justification->delete();
        return $justification;
    }
}
