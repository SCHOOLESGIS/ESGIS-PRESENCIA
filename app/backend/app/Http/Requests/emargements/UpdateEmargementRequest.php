<?php

namespace App\Http\Requests\emargements;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmargementRequest extends FormRequest
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
            'cour_id' => 'nullable|exists:cours,id',
            'enseignant_id' => 'nullable|exists:users,id',
            'begin_hour' => 'nullable|date_format:H:i:s',
            'end_hour' => 'nullable|date_format:H:i:s|after:begin_hour',
            'status' => 'nullable|in:COCHE,DECOCHE',
        ];
    }
}
