<?php

namespace App\Http\Requests\enseignants;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnseignantRequest extends FormRequest
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
            'matricule' => 'nullable|string|unique:enseignants,matricule,' . $this->route('enseignant') . '|max:255',
            'speciality' => 'nullable|string|max:255',
        ];
    }
}
