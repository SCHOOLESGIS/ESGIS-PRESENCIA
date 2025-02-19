<?php

namespace App\Http\Requests\filieres;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFiliereRequest extends FormRequest
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
            'filiere_name' => 'nullable|string|max:255|unique:filieres,filiere_name',
            'filiere_level' => 'nullable|string|in:Licence,Master,Doctorat',
        ];
    }
}
