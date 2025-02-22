<?php

namespace App\Http\Requests\cours;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourRequest extends FormRequest
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
            'module_id' => 'required|exists:modules,module_id',
            'enseignant_id' => 'required|exists:enseignants,enseignant_id',
            'filiere_id' => 'required|exists:filieres,filiere_id',
            'cour_date' => 'required|date',
            'begin_hour' => 'required|date_format:H:i:s',
            'end_hour' => 'required|date_format:H:i:s|after:begin_hour',
            'status' => 'required|in:VALIDE,NON_VALIDE',
        ];
    }
}
