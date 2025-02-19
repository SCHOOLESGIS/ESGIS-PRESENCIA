<?php

namespace App\Http\Requests\enseignants;

use Illuminate\Foundation\Http\FormRequest;

class CreateEnseignantRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'matricule' => 'required|string|unique:enseignants,matricule|max:255',
            'speciality' => 'required|string|max:255',
        ];
    }
}
