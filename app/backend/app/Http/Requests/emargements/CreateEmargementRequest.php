<?php

namespace App\Http\Requests\emargements;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmargementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'enseignant_id' => 'required|exists:enseignants,enseignant_id',
            'cour_id' => 'required|exists:cours,cour_id',
            'begin_hour' => 'required|date_format:H:i:s',
            'end_hour' => 'required|date_format:H:i:s|after:begin_hour',
            'status' => 'required|in:COCHE,DECOCHE',
        ];
    }
}
