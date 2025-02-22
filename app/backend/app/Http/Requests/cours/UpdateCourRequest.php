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
            'module_id' => 'nullable|exists:modules,module_id',
            'enseignant_id' => 'nullable|exists:enseignants,enseignant_id',
            'filiere_id' => 'nullable|exists:filieres,filiere_id',
            'cour_date' => 'nullable|date',
            'begin_hour' => 'nullable|date_format:H:i:s',
            'end_hour' => 'nullable|date_format:H:i:s|after:begin_hour',
            'status' => 'nullable|in:VALIDE,NON_VALIDE'
        ];
    }
}
