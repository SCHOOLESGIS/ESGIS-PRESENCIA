<?php

namespace App\Http\Requests\cours;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourRequest extends FormRequest
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
            'module_id' => 'nullable|exists:modules,id',
            'enseignant_id' => 'nullable|exists:users,id',
            'filiere_id' => 'nullable|exists:filieres,id',
            'cour_date' => 'nullable|date',
            'begin_hour' => 'nullable|date_format:H:i:s',
            'end_hour' => 'nullable|date_format:H:i:s|after:begin_hour',
            'status' => 'nullable|in:VALIDE,NON_VALIDE'
        ];
    }
}
